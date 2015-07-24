<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Salon;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Requests\ConfirmRequest;
use App\Http\Controllers\Controller;

class ConfirmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getConfirm()
    {
        return view('confirm');
    }

    protected function postConfirm(ConfirmRequest $request)
    {
        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('password')])) {
            session(['confirmed' => true]);
            return redirect()->intended('/');
        } else {
            return redirect('/confirm')
                ->withErrors([
                    'password' => 'Wrong password',
                ]);
        }
    }

    protected function getChoseSalon()
    {
        $salons = User::find(Auth::user()->id)->salons->all();
        $nb_salons=User::find(Auth::user()->id)->salons->count();
        session(['nb_salons'=>$nb_salons]);
        if($nb_salons>1) {
            return view('salon_configuration/choose_salon')->with(['salons' => $salons]);
        }
        session(['salon_chosen'=>$salons[0]->id, 'salon_chosen_name'=>$salons[0]->name]);
        return redirect()->intended('/');
    }

    protected function getConfirmSalon($salon_id)
    {
        $salon = Salon::find($salon_id);
        if ($salon->user_id == Auth::user()->id) {
            session(['salon_chosen' => $salon->id, 'salon_chosen_name'=>$salon->name]);
            return redirect()->intended('/');
        } else {
            return redirect('/');
        }
    }
    protected function changeSalon()
    {
        Session::forget('salon_chosen');
        Session::forget('salon_chosen_name');
        return redirect('owner/salon-configuration');
    }

}
