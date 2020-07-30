<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quiz;
use App\fillingblank;
use App\blankoptions;

class FillingBlanksController extends Controller
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
        return view("admin.fillingblanks",compact('quizes'));
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
        //

        $request->validate([
            'quizid' => 'required',
            'Question' => 'required',
            'questiontype' => 'required',
            'marks' => 'required',
            'blankoptions' => 'required',

        ]);
       // $role = $request->input('questiontype');
        //return $role;
  
       // fillingblank::create($request->all());
        //$last = fillingblank::insertGetId($request->all());

        
        $last = fillingblank::insertGetId(["Question"=>$request->input('Question'),"questiontype"=>$request->input('questiontype'),"marks" => $request->input('marks'),"blankoptions" => $request->input('blankoptions'),"quizid" => $request->input('quizid')]);
        $i=0;
        $blanks = $request->input('blankoptions');
        $form_data=array(
            'question_id' => $last,
            'answer' => '',
        );
  
       // CourseMode::create($form_data);
      while($i<$blanks){
        blankoptions::create($form_data);
       $i++;
      }

      $orders = blankoptions::where('question_id', $last)->get();
       // $last = DB::table('mcqquizes')->orderBy('id', 'DESC')->first();
        

        return view("admin.blankopts",compact('last','orders'));
       
        //return $last;
   
       // return redirect('admin/home/fillingblanks');
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
