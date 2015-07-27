<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Requests\MainAdminRequest;
use App\Http\Controllers\Controller;
use App\Configuration;
class MainAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('confirmed');
    }

    protected function getMainAdmin($admin,$id)
    {
        return view('main_admin')->withAdmin($admin)->withId($id);
    }

    protected function postMainAdmin(MainAdminRequest $request)
    {
        if (password_verify($request['password'],Configuration::find(1)->key)) {
            $user =User::find($request['id']);
            $user->admin=$request['admin'];
            $user->save();
            return redirect('administrators');
        } else {
            return redirect('/main_admin/'.$request['admin'].'/'.$request['id'])
                ->withErrors([
                    'password' => 'Wrong password',
                ]);
        }
    }

}