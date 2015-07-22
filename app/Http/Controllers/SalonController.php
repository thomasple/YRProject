<?php
namespace App\Http\Controllers;

use App\Repositories\SalonRepository;
use App\Repositories\PhotoRepository;
use App\Http\Requests\SalonCreationRequest;
use App\Http\Requests\SalonUpdateRequest;
use Illuminate\Http\Request;

class SalonController extends Controller
{

    protected $salonRepository;
    protected $numberPerPage = 4;

    public function __construct(SalonRepository $salonRepository)

    {
        $this->middleware('auth');
        $this->middleware('admin');
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
        $salons = $this->salonRepository->getPaginate($this->numberPerPage);

        $links = str_replace('/?', '?', $salons->render());

        return view('administration/salonIndex', compact('salons', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('administration/salonCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SalonCreationRequest $request, PhotoRepository $photoRepository)
    {
        $input = $request->all();
        $main_photo = $photoRepository->create_photo(null);

        if ($main_photo) {
            $inputs = array_merge($input, ['main_photo' => $main_photo]);
            $salon = $this->salonRepository->store($inputs);
            return redirect('administrator')->withMessage("The salon " . $salon->name . "was successfully added to the database.");
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
        $input = $request->all();
        $main_photo = $photoRepository->update_photo($request->file('main_photo'), $input);

        if ($main_photo) {
            $inputs = array_merge($input, ['main_photo' => $main_photo]);
            $this->salonRepository->update($photoRepository, $id, $inputs);
            return redirect('administrator')->withMessage("The salon " . $request->input('name') . " was successfully modified.");
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
        $this->salonRepository->destroy($photoRepository, $id);
        return redirect('administrator')->withMessage("The salon was successfully deleted from the database");
    }

}

?>