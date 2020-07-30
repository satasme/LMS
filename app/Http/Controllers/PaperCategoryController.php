<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaperCategory;

class PaperCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $papercategories = PaperCategory::all();
       return view("admin.papercat",compact('papercategories'));
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

        $request->validate([
            'categoryid' => 'required',
            'categoryname' => 'required',
            'description' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $image = $request->file('icon');
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        $new_name = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move(public_path('/images/'), $new_name);
        $form_data=array(
            'categoryid' => $request->categoryid,
            'categoryname' => $request->categoryname,
            'description' => $request->description,
            'icon' => $new_name
            

        );
  
        PaperCategory::create($form_data);
   
        return redirect('admin/home/coursemodes');
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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'categoryid' => 'required',
            'categoryname' => 'required',
            'description' => 'required',
            
        ]);

        $update = ['categoryid' => $request->categoryid,'categoryname' => $request->categoryname, 'description' => $request->description];
 
        $files = $request->file('icon');

        if ($files != '') {
           //$destinationPath = 'public/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move(public_path('/images/'), $profileImage);
           $update['icon'] = "$profileImage";
          
        }
       // $update['icon'] = "20200622112713.png";
        $update['categoryid'] = $request->get('categoryid');
        $update['categoryname'] = $request->get('categoryname');
       $update['description'] = $request->get('description');

       PaperCategory::where('id',$id)->update($update);
         
        
        
     

        

        
        
        
   
     return redirect('admin/home/paper-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperCategory $papercategory)
    {
        //
        $papercategory->delete();
        return redirect('admin/home/paper-categories');
    }
}
