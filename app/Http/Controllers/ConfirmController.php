<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ConfirmRequest;
use App\Http\Controllers\Controller;

class ConfirmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('not_confirmed');
    }
    protected function getConfirm(){
        return view('confirm');
    }

    protected function postConfirm(ConfirmRequest $request){
        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('password')]))
        {
            session(['confirmed'=>true]);
            return redirect()->intended('/');
        }
        else{
            return redirect('/confirm')
                ->withErrors([
                    'password' => 'Wrong password',
                ]);
        }
    }
}
