<?php namespace App\Http\Controllers;
use App\Http\Requests\ReservationCreateRequest;
use App\Http\Requests\ReservationUpdateRequest;

use App\Repositories\ReservationRepository;

use Illuminate\Http\Request;
class ReservationController extends Controller {
  protected $reservationRepository;
  protected $nbrPerPage=10;
  public function __construct(ReservationRepository $reservationRepository)
  {
    $this->middleware('auth');
    $this->middleware('owner');
    $this->middleware('confirmed');

    $this->reservationRepository = $reservationRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $reservations = $this->reservationRepository->getPaginate($this->nbrPerPage);
    $links = str_replace('/?', '?', $reservations->render());

    return view('timetable/reservations/index', compact('reservations', 'links'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($artisan_service_id)
  {
    return view('timetable/reservations/create')->with(['artisan_service_id' => $artisan_service_id]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ReservationCreateRequest $request)
  {
    if($this->reservationRepository->checkdates($request->start,$request->end))
    {
      $input = $request->all();
      $artisan = $this->reservationRepository->store($input);
      return redirect('reservation');
    }
    else{
      return redirect()->back()->withErrors(['error_date'=>'The timeslot you chose either does not exist or is no longer available.']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $reservation = $this->reservationRepository->getById($id);

    return view('timetable/reservations/show', compact('reservation'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $reservation = $this->reservationRepository->getById($id);

    return view('timetable/reservations/edit', compact('reservation'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ReservationCreateRequest $request, $id)
  {
    if($this->reservationRepository->checkdates($request->start,$request->end))
    {
      $input = $request->all();
      $this->reservationRepository->update($id, $input);
      return redirect('reservation');
    }
    else{
      return redirect()->back()->withErrors(['error_date'=>'The timeslot you chose either does not exist or is no longer available.']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $this->reservationRepository->destroy($id);

    return redirect()->back();
  }
  
}

?>