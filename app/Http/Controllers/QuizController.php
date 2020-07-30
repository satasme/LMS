<?php

namespace App\Http\Controllers;
Use App\CourseMode;
Use App\Course;
use App\PaperCategory;
use App\quiz;
use App\exam;
use App\coursetest;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exams = exam::all();
        $courses = Course::all();
        $papercategories= PaperCategory::all();
        $quizes=quiz::all();
        $coursetests = coursetest::all();
        return view("admin.quiz",compact('exams','courses','papercategories','quizes','coursetests'));
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
            'quizname' => 'required',
            'coursename' => 'required',
            'coursetest' => 'required',
            'exam' => 'required',
            'papercat' => 'required',
            'courseid' => 'required',
            'coursetestid' => 'required',
            'examid' => 'required',
            'time'  => 'required',
            'papercatid' => 'required',

        ]);
  
        quiz::create($request->all());
   
        return redirect('admin/home/quizes');
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
    public function update(Request $request, quiz $quize)
    {
        //
        $request->validate([
            'quizid' => 'required',
            'quizname' => 'required',
            'coursename' => 'required',
            'coursetest' => 'required',
            'exam' => 'required',
            'papercat' => 'required',
            'courseid' => 'required',
            'coursetestid' => 'required',
            'examid' => 'required',
            'time'  => 'required',
            'papercatid' => 'required',
        ]);
  
        $quize->update($request->all());
        return redirect('admin/home/quizes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(quiz $quize)
    {
        //
        $quize->delete();
        return redirect('admin/home/quizes');
    }
}
