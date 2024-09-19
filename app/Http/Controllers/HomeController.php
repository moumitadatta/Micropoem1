<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{  
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     */

    public function admindashboard()
    {
        return view('admin.dashboard.dashboard');
    }
    
    public function managerdashboard()
    {
        return view('admin.dashboard.managerdashboard'); 
    }
   
}
