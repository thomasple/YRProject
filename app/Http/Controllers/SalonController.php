<?php
namespace App\Http\Controllers;
use App\Repositories\SalonRepository;
use App\Http\Requests\SalonCreationRequest;
use App\Http\Requests\SalonUpdateRequest;
use Illuminate\Http\Request;

class SalonController extends Controller
{

  protected $salonRepository;
  protected $numberPerPage=4;

  public function __construct(SalonRepository $salonRepository)

  {

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

    return view('administration\salonIndex', compact('salons', 'links'));
    //return response("ok",200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('administration\salonCreate');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(SalonCreationRequest $request)
  {
    //return response("OK",200);
    $salon = $this->salonRepository->store($request->all());
    return redirect('administrator')->withMessage("The salon ".$salon->name."was successfully added to the database.");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $salon=$this->salonRepository->getByID($id);
    return view('administration\salonShow',compact('salon'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $salon=$this->salonRepository->getById($id);
    return view('administration\salonEdit', compact('salon'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(SalonUpdateRequest $request,$id)
  {
      //return response("Ok update",200);
    $this->salonRepository->update($id,$request->all());
    return redirect('administrator')->withMessage("The salon ".$request->input('name')." was successfully modified.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $this->salonRepository->destroy($id);
    return redirect('administrator')->withMessage("The salon was successfully deleted from the database");
  }
  
}

?>