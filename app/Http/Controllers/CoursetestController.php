<?php

namespace App\Http\Controllers;
Use App\Course;
use App\coursetest;

use Illuminate\Http\Request;

class CoursetestController extends Controller
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
        //$papercategories= PaperCategory::all();
       // $quizes=quiz::all();
        return view("admin.coursetests",compact('courses','coursetests'));
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
            'testid' => 'required',
            'test_title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'courseid' => 'required',

        ]);
        $image = $request->file('icon');
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        $new_name = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move(public_path('/images/'), $new_name);
        $form_data=array(
            'testid' => $request->testid,
            'test_title' => $request->test_title,
            'description' => $request->description,
            'icon' => $new_name,
            'courseid' => $request->courseid,
            'coursename' => $request->coursename,


            

        );
  
       // CourseMode::create($form_data);
  
        coursetest::create($form_data);
   
        return redirect('admin/home/coursetests');
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
