<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistroUserController extends Controller
{
    public function __construct(){ //protection Controller
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('auth.register');
    }
}
