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
use App\Http\Requests\AdminUpdateRequest;
use App\User;
use Session;
use Auth;
use Illuminate\Routing\Redirector ;

class AdminController extends Controller
{
    protected $nbrPerPage=10;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('confirmed');
    }
    public function mainPage()
    {
        return view('administration/administratorMain');
    }
    public function getForm()
    {
        return redirect()->action('SalonController@index');
    }

    public function index()
    {
        $users=User::all();
        return view('administration/indexuser', compact('users'));
    }


    public function updateAdmin(AdminUpdateRequest $request,$id)
    {
        $user =User::find($id);
        $user->admin=$request['admin'];
        $user->save();
        Session::forget('main_admin');
        return redirect('administrators');
    }
}