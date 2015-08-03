<?php
namespace App\Http\Controllers;

use App\Repositories\SalonRepository;
use App\Repositories\PhotoRepository;
use App\Http\Requests\SalonCreationRequest;
use App\Http\Requests\SalonUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Salon;
use Session;

class SalonController extends Controller
{

    protected $salonRepository;
    protected $numberPerPage = 4;

    public function __construct(SalonRepository $salonRepository)

    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index']]);
        if (!Auth::user()->admin) {
            $this->middleware('chose_salon', ['only' => ['edit', 'update', 'destroy']]);
        }
        $this->middleware('confirmed');
        $this->salonRepository = $salonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*$salons = $this->salonRepository->getPaginate($this->numberPerPage);

        $links = str_replace('/?', '?', $salons->render());*/
        $salons = Salon::all();

        return view('administration/salonIndex', compact('salons', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('administration/salonCreate')->with(['user_id' => Auth::user()->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SalonCreationRequest $request, PhotoRepository $photoRepository)
    {
        $input = $request->all();
        if (!Auth::user()->admin AND $input['user_id'] != Auth::user()->id) {
            return redirect('/');
        }
        $main_photo = $photoRepository->create_photo(null);
        if ($main_photo) {
            $inputs = array_merge($input, ['main_photo' => $main_photo]);
            $salon = $this->salonRepository->store($inputs);
            if (Auth::user()->admin) {
                return redirect('administrator')->withMessage("The salon " . $salon->name . "was successfully added to the database.");
            }
            $this->salonRepository->updateSession($salon);
            return redirect('salon/' . $salon->id . '/edit');
        }
        return redirect()->back()->withErrors(['error_photo' => 'Your photo cannot be sent']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $salon = $this->salonRepository->getByID($id);
        return view('administration/salonShow', compact('salon'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        if (!Auth::user()->admin) {
            if (session('salon_chosen') != $id) {
                return redirect('/');
            }
        }
        $salon = $this->salonRepository->getById($id);
        return view('administration/salonEdit', compact('salon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(SalonUpdateRequest $request, PhotoRepository $photoRepository, $id)
    {
        if (!Auth::user()->admin) {
            if (session('salon_chosen') != $id) {
                return redirect('/');
            }
        }
        $input = $request->all();
        $salon = $this->salonRepository->getById($id);
        $main_photo = $photoRepository->update_photo($request->file('main_photo'), $input, $salon);
        if ($main_photo) {
            $inputs = array_merge($input, ['main_photo' => $main_photo]);
            $this->salonRepository->update($salon, $inputs);
            if (Auth::user()->admin) {
                return redirect('salon/index');
            }
            return redirect('owner/salon-configuration');
        }
        return redirect()->back()->withErrors(['error_photo' => 'Your photo cannot be sent']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(PhotoRepository $photoRepository, $id)
    {
        if (!Auth::user()->admin) {
            if (session('salon_chosen') != $id) {
                return redirect('/');
            }
            $this->salonRepository->destroy($photoRepository, $id);
            Session::forget('salon_chosen');
            Session::forget('salon_chosen_name');
            session(['nb_salons'=>session('nb_salons')-1]);
            return redirect('owner/salon-configuration');
        }
        $this->salonRepository->destroy($photoRepository, $id);
        return redirect('salon')->withMessage("The salon was successfully deleted from the database");
    }

}

?>