<?php

namespace App\Http\Controllers;
Use App\CourseMode;
Use App\Course;
use App\PaperCategory;
use App\quiz;
use App\exam;
use App\coursetest;
use App\mcqquiz;
use App\mcqoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mcqquizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = exam::all();
        $courses = Course::all();
        $papercategories= PaperCategory::all();
        $quizes=quiz::all();
        $coursetests = coursetest::all();
        return view("admin.mcqquizes",compact('exams','courses','papercategories','quizes','coursetests'));
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
        $request->validate([
            'Question' => 'required',
            'marks' => 'required',
            'options' => 'required',
            'quizid' => 'required',

        ]);
  
       // mcqquiz::create($request->all());
        $last = mcqquiz::insertGetId(["Question"=>$request->input('Question'),"marks" => $request->input('marks'),"options" => $request->input('options'),"quizid" => $request->input('quizid'),"correctoptionid" =>0]);
        $request->session()->put('name',$request->input('Question'));
        $request->session()->put('options',$request->input('options'));
        $name=$request->session()->get('name');
        $options=$request->session()->get('options');
         $i=0;
        $form_data=array(
            'question_id' => $last,
            'option_value' => '',
        );
  
       // CourseMode::create($form_data);
      while($i<$options){
        mcqoption::create($form_data);
       $i++;
      }

      $orders = mcqoption::where('question_id', $last)->get();
       // $last = DB::table('mcqquizes')->orderBy('id', 'DESC')->first();
        

        return view("admin.mcqoptions",compact('name','options','last','orders'));
 
      // return view('admin.options')->with('name',$request->session()->get('name'));
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
        $opt=$request->correctoptionid;
        $count = mcqquiz::where('id', $id)->where('correctoptionid', $opt)->get()->count();
        if($count == 0){
            $message="";
        }
        else{
            $message="Add a new option for this question";
        }
        DB::table('mcqoptions')->where('id', $opt)->delete();
        return redirect("/admin/home/showmcqdata/$id")->with( ['message' => $message] );;

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
