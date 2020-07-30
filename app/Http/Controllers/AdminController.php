<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    
  public function coursemodes(){
      return view('admin.coursemodes');
  }

    public function papercategoriesrse(){
        return view('admin.papercat');

    }
    
    public function addQuizes(){
        return view('admin.AddQuize');
    }
    
}