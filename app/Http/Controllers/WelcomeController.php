<?php

namespace App\Http\Controllers;

use Auth;

class WelcomeController extends Controller {
    
    public function index() {
        return view('welcome');
    }
}