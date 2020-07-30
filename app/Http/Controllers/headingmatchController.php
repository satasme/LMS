<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quiz;
use App\headingmatch;

class headingmatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizes=quiz::all();
        return view("admin.paragraphadd",compact('quizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $quizid=$request->quizid;
        $request->session()->put('paragraphs',$request->input('paragraphs'));
       // $request->session()->put('options',$request->input('options'));
        //$name=$request->session()->get('name');
        $options=$request->session()->get('paragraphs');
        $i=0;
        $form_data=array(
            'paragraphname' => '',
            'content' => '',
            'quizid' => $quizid,
            'headingid' => 0,
        );
  
       // CourseMode::create($form_data);
      while($i<$options){
        headingmatch::create($form_data);
       $i++;
      }
      $orders = headingmatch::where('quizid', $quizid)->get();
     
      
        
        return view("admin.paragraphs",compact('orders','quizid'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
