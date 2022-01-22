<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->guest()) {
            return redirect('/login');
        }else {
            $page_title = "Sales Representative Management | Home";
            return view('index', compact('page_title'));
        }
    }

    public function login()
    {
        if(!auth()->guest()) {
            return redirect('/');
        }else {
            $page_title = "Sales Representative Management | Login";
            return view('login', compact('page_title'));
        }
    }

}
