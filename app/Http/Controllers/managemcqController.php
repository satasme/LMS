<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quiz;
use App\mcqquiz;
use App\mcqoption;
use Illuminate\Support\Facades\DB;



class managemcqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function remove(Request $request)
    {
        //
       
    }


    public function index()
    {
        //
        $quizes=quiz::all();
        return view("admin.managemcqquizes",compact('quizes'));
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
        $ids = $request->input('id');
        $opts = $request->input('opt');
        $qid = $request->input('questionid');
        $coptid=$request->input('correctoptionid');
        
        //print_r($request->all());
        
        
        foreach($ids as $k => $id){
        
          $values = array(
                            'option_value' => $opts[$k],
                            
                        );
        
          DB::table('mcqoptions')->where('id','=',$id)->update($values);
        
        }
        
        $valuesq = array(
            'correctoptionid' => $coptid,
            
        );
        
        DB::table('mcqquizes')->where('id','=',$qid)->update($valuesq);
        return redirect('admin/home/managemcq');
        //
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
    public function update(Request $request)
    {
        
        //
        if($request->ajax()){
            return  $request->all();
            
            }
           
            // return $request->all();
            // $id=$_GET['id'];
            //$id=1;
            // return view("admin.updatemcqmodel",compact('id'));
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     
         
     


    public function destroy(Request $request)
    {
        //
        if($request->ajax()){
        $qsns = mcqoption::where('question_id', $request->id)->get();
        foreach ($qsns as $qsn){
            DB::table('mcqoptions')->where('id', $qsn->id)->delete();
        }
        
        
        mcqquiz::destroy($request->id);
        return response(['message'=>'Record deleted Succesfully']);
        }

    }

    

    public function search(Request $request){
        if( $request->ajax() ){
            $output="";
           // $questions=DB::table('mcqquizes')->where('quizid','=',$request->search)->get();
            $questions=DB::table('mcqquizes')->where('quizid','LIKE','%'.$request->search."%")->get();

            if($questions){
                foreach($questions as  $question){
                    $output ='<tr>'.
                    '<td style="display:none">'.$question->id.'</td>'.
                    '<td>'.$question->Question.'</td>'.
                    '<td>'.$question->marks.'</td>'.
                    '<td>'.$question->options.'</td>'.
                    '<td>
                    <a id="edit-item" class="btn btn-primary edit" >Edit</a>
                    
                   <form style="float:right;" method="post" action="">
                      @csrf
                      @method("DELETE")
                       <button type="submit" class="btn btn-danger delete-btn" >Delete</button>
                    </form>
                    <td>'.
                    '</tr>';

                    
                }
                return response($output);
            }
        }
    }
    public function test($id){
        //$data=new M
        // $qsns = mcqquiz::where('id',$id)->get();

        $qid=$id;
        $qsns = DB::table('mcqquizes')
                    ->select('*')
                    ->join('mcqoptions', 'mcqquizes.id', '=', 'mcqoptions.question_id')
                    ->where('mcqquizes.id', $id)
                    ->orderBy('mcqoptions.id', 'ASC')
                    ->get();

        
        return view('admin.updatemcqmodel',compact("qsns",'qid'));
    }


    public function addopt($id){

        $nooption =  mcqquiz::find($id);
        $updatedopts= $nooption->options;
        $updatedopts++;
        $valuesq = array(
            'options' => $updatedopts,
            
        );
        
        DB::table('mcqquizes')->where('id','=',$id)->update($valuesq);
        $form_data=array(
            'question_id' => $id,
            'option_value' => '',
        );
  
       // CourseMode::create($form_data);
      
        mcqoption::create($form_data);
      
        return  redirect("/admin/home/showmcqdata/$id");

      /*
        $form_data=array(
            'question_id' => $id,
            'option_value' => '',
        );
  
       // CourseMode::create($form_data);
       $options =  mcqoption::create($form_data);
      

        return redirect('admin/home/managemcq');
        */
    }
}
