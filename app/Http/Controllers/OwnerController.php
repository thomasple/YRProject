<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
        $this->middleware('confirmed');
        $this->middleware('chose_salon');
    }

    public function getSalonConfiguration(){
        return view('salon_configuration/index');
    }
}
