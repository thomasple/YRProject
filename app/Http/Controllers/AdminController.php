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

class AdminController extends Controller
{
    public function _construct()
    {
        $this->middleware('admin');
        $this->middleware('loggedAsAdmin');
    }
    public function getForm()
    {
        return view('administration/administratorMain');
    }
    public function postForm(SalonCreationRequest $request,AdminCreationSalonRepositoryInterface $creation)
    {
        $sname=$request->input('salonName');
        $creation->createSalon($sname);
        return view('administration/administrationConfirmCreation')->with('name',$sname);
    }
}