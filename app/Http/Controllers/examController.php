<?php

namespace App\Http\Controllers;
Use App\Course;
use App\coursetest;
use App\exam;

use Illuminate\Http\Request;

class examController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        $coursetests = coursetest::all();
        $exams = exam::all();
        //$papercategories= PaperCategory::all();
       // $quizes=quiz::all();
        return view("admin.exam",compact('courses','coursetests','exams'));
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
            'examcode' => 'required',
            'Exam_title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'courseid' => 'required',
            'coursetestid' => 'required',

        ]);
        $image = $request->file('icon');
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        $new_name = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move(public_path('/images/'), $new_name);
        $form_data=array(
            'examcode' => $request->examcode,
            'Exam_title' => $request->Exam_title,
            'description' => $request->description,
            'icon' => $new_name,
            'courseid' => $request->courseid,
            'coursename' => $request->coursename,
            'coursetestid' => $request->coursetestid,
            'coursetestname' => $request->coursetestname,


            

        );
  
       // CourseMode::create($form_data);
  
        exam::create($form_data);
   
        return redirect('admin/home/exams');
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
