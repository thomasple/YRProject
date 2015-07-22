<?php namespace App\Http\Controllers;
use App\Http\Requests\TimeSlotCreateRequest;
use App\Http\Requests\timeSlotUpdateRequest;

use App\Repositories\TimeSlotRepository;

use Illuminate\Http\Request;
class TimeSlotController extends Controller {
  protected $timeSlotRepository;

  protected $nbrPerPage = 10;

  public function __construct(TimeSlotRepository $timeSlotRepository)
  {
    $this->middleware('auth');
    $this->middleware('owner');
    $this->middleware('confirmed');

    $this->timeSlotRepository = $timeSlotRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $timeslots = $this->timeSlotRepository->getPaginate($this->nbrPerPage);
    $links = str_replace('/?', '?', $timeslots->render());

    return view('timeTable/timeslots/index', compact('timeslots', 'links'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($service_id,$artisan_id)
  {
    return view('timeTable/timeSlots/create')->with(['service_id' => $service_id,'artisan_id'=>$artisan_id]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(TimeSlotCreateRequest $request)
  {
    $input = $request->all();
    if ($this->timeSlotRepository->checkdates($input['from_hour'],$input['to_hour'])) {
      $timeslot = $this->timeSlotRepository->store($input);
      return redirect('timeslot');
    }
    return redirect()->back()->withErrors(['error_date'=>'The timeslot you chose either does not exist or is no longer available']);

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $timeslot = $this->timeSlotRepository->getById($id);

    return view('timeTable/timeSlots/show', compact('timeslot'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $timeslot = $this->timeSlotRepository->getById($id);

    return view('timeTable/timeSlots/edit', compact('timeslot'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(TimeSlotCreateRequest $request, $id)
  {
    $input=$request->all();
    if ($this->timeSlotRepository->checkdates($input['from_hour'],$input['to_hour'])) {
      $this->timeSlotRepository->update($id, $input);
      return redirect('timeslot');
    }
    return redirect()->back()->withErrors(['error_date'=>'The timeslot you chose either does not exist or is no longer available']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */


  //avec tous les problèmes que ça pose à gèrer
  public function destroy($id)
  {
    $this->timeSlotRepository->destroy($id);

    return redirect()->back();
  }
  
}

?>