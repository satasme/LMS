<?php

namespace App\Http\Controllers;
Use App\CourseMode;

use Illuminate\Http\Request;

class CourseModeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coursemodes = CourseMode::all();
       return view("admin.coursemodes",compact('coursemodes'));
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
            'modeid' => 'required',
            'mode_title' => 'required',
            'description' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $image = $request->file('icon');
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        $new_name = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move(public_path('/images/'), $new_name);
        $form_data=array(
            'modeid' => $request->modeid,
            'mode_title' => $request->mode_title,
            'description' => $request->description,
            'icon' => $new_name
            

        );
  
        CourseMode::create($form_data);
   
        return redirect('admin/home/coursemodes');
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
    public function update(Request $request,$id)
    {
        
        $request->validate([
            'modeid' => 'required',
            'mode_title' => 'required',
            'description' => 'required',
            
        ]);

        $update = ['modeid' => $request->title,'mode_title' => $request->mode_title, 'description' => $request->description];
 
        $files = $request->file('icon');

        if ($files != '') {
           //$destinationPath = 'public/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move(public_path('/images/'), $profileImage);
           $update['icon'] = "$profileImage";
          
        }
       // $update['icon'] = "20200622112713.png";
        $update['modeid'] = $request->get('modeid');
        $update['mode_title'] = $request->get('mode_title');
       $update['description'] = $request->get('description');

       CourseMode::where('id',$id)->update($update);
         
        
        
     

        

        
        
        
   
     return redirect('admin/home/coursemodes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseMode $coursemode)
    {
        //
        $coursemode->delete();
        return redirect('admin/home/coursemodes');
    }
}
