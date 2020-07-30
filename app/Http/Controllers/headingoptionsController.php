<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ParagraphQuestion;
use App\heading;

class headingoptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $ids = $request->input('id');
        $quizid=$request->input('questionid');
$opts = $request->input('opt');
$questions=$request->input('questions');


//print_r($request->all());


foreach($ids as $k => $id){

  $values = array(
                    'heading' => $opts[$k]
                    
                    
                );

  DB::table('headings')->where('hid','=',$id)->update($values);

}

$i=0;
$form_data=array(
    'Question' => '',
    'Answerid' => 0,
    'quizid' => $quizid,
    
);

// CourseMode::create($form_data);
while($i<$questions){
    ParagraphQuestion::create($form_data);
$i++;
}
$orders = ParagraphQuestion::where('quizid', $quizid)->get();
$headings= heading::all();

return view("admin.matchingQuestions",compact('orders','quizid','headings'));

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
