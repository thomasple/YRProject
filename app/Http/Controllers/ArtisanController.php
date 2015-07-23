<?php namespace App\Http\Controllers;

use App\Http\Requests\ArtisanCreateRequest;

use App\Repositories\ArtisanRepository;
use App\Repositories\PhotoRepository;

use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    protected $artisanRepository;

    protected $nbrPerPage = 10;

    public function __construct(ArtisanRepository $artisanRepository)
    {
        $this->middleware('auth');
        $this->middleware('owner', ['except' => 'show']);
        $this->middleware('admin', ['only' => 'index']);
        $this->middleware('confirmed', ['except' => 'show']);

        $this->artisanRepository = $artisanRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $artisans = $this->artisanRepository->getPaginate($this->nbrPerPage);
        $links = str_replace('/?', '?', $artisans->render());

        return view('salon_configuration/artisans/index', compact('artisans', 'links'));
    }

    public function indexForOwnerSalons()
    {
        $artisans = $this->artisanRepository->getArtisansForOwnerSalons();
        return view('salon_configuration/artisans/index', compact('artisans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($salon_id)
    {
        return view('salon_configuration/artisans/create')->with(['salon_id' => $salon_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArtisanCreateRequest $request, PhotoRepository $photoRepository)
    {
        $input = $request->all();
        $main_photo = $photoRepository->create_photo($request->file('main_photo'));
        if ($main_photo) {
            $inputs = array_merge($input, ['main_photo' => $main_photo]);
            $artisan = $this->artisanRepository->store($inputs);
            return redirect('artisan');
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
        $artisan = $this->artisanRepository->getById($id);

        return view('salon_configuration/artisans/show', compact('artisan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $artisan = $this->artisanRepository->getById($id);

        return view('salon_configuration/artisans/edit', compact('artisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArtisanCreateRequest $request, PhotoRepository $photoRepository, $id)
    {
        $input = $request->all();
        $artisan = $this->artisanRepository->getById($id);
        $main_photo = $photoRepository->update_photo($request->file('main_photo'), $input, $artisan);
        if ($main_photo) {
            $inputs = array_merge($input, ['main_photo' => $main_photo]);
            $this->artisanRepository->update($artisan, $inputs);
            return redirect('artisan');
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
        $this->artisanRepository->destroy($photoRepository, $id);

        return redirect()->back();
    }

}

?>