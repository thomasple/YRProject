<?php
/**
 * Created by PhpStorm.
 * User: François
 * Date: 17/07/2015
 * Time: 09:52
 */
namespace App\Http\Controllers;
use App\Http\Requests\SalonCreationRequest;
use App\Repositories\AdminCreationSalonRepositoryInterface;
use Illuminate\Routing\Redirector ;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('confirmed');
    }
    public function mainPage()
    {
        return redirect()->action('SalonController@index');
        //return response("Debut ok",200);
    }
    public function getForm()
    {
        return redirect()->action('SalonController@index');
        //return response("Debut ok",200);
    }
    public function postForm(SalonCreationRequest $request,AdminCreationSalonRepositoryInterface $creation)
    {
        $sname=$request->input('salonName');
        $creation->createSalon($sname);
        return view('administration/administrationConfirmCreation')->with('name',$sname);
    }
}