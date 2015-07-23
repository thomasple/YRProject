<?php namespace App\Http\Controllers;

use App\Http\Requests\HolidayCreateRequest;
use App\Http\Requests\HolidayUpdateRequest;

use App\Repositories\HolidayRepository;

use Illuminate\Http\Request;
class HolidayController extends Controller {

  protected $holidayRepository;

  protected $nbrPerPage = 10;

  public function __construct(HolidayRepository $holidayRepository)
  {
    $this->middleware('auth');
    $this->middleware('owner', ['except' => 'show']);
    $this->middleware('confirmed');

    $this->holidayRepository = $holidayRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $holidays = $this->holidayRepository->getPaginate($this->nbrPerPage);
    $links = str_replace('/?', '?', $holidays->render());

    return view('timetable/holidays/index', compact('holidays', 'links'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($artisan_id)
  {
    return view('timetable/holidays/create')->with(['artisan_id' => $artisan_id]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(HolidayCreateRequest $request)
  {
    $input = $request->all();
    if ($this->holidayRepository->checkDates($request['start'],$request['end'])) {
      $holiday = $this->holidayRepository->store($input);
      return redirect('holiday');
    }
    return redirect()->back()->withErrors(['error_date'=>'Dates are not coherent.']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $holiday = $this->holidayRepository->getById($id);

    return view('timetable/holidays/show', compact('holiday'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $holiday = $this->holidayRepository->getById($id);

    return view('timetable/holidays/edit', compact('holiday'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(HolidayCreateRequest $request, $id)
  {
    if($this->holidayRepository->checkdates($request->start,$request->end))
    {
      $input = $request->all();
      $this->holidayRepository->update($id, $input);
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
    $this->holidayRepository->destroy($id);

    return redirect()->back();
  }
  
}

?>