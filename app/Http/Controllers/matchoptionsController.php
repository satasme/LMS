<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\heading;

class matchoptionsController extends Controller
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
//$opts = $request->input('opt');
$quizid = $request->input('questionid');
$paragraphname = $request->input('paragraphname');
$content=$request->input('content');
$options= $request->matchingoptions;



//print_r($request->all());


foreach($ids as $k => $id){

  $values = array(
                    'paragraphname' => $paragraphname[$k],
                    'content' => $content[$k]
                    
                );

  DB::table('headingmatch')->where('hmid','=',$id)->update($values);

}

        $i=0;
        $form_data=array(
            'heading' => '',
        );
  
       // CourseMode::create($form_data);
      while($i<$options){
        heading::create($form_data);
       $i++;
      }
        $orders = heading::all();
     
         return view("admin.matchingoptions",compact('orders','quizid'));
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
