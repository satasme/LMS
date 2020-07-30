<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\quiz;
use App\Diagram;
use Validator;
use App\diagramquizes;

class DiagramquestionsController extends Controller
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
        return view("admin.diagramquizes",compact('quizes'));
        
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
        
        // $request->validate([
        //     'diagram' => 'required',
        //     'nooflables' => 'required',
        //     'noofquestions' => 'required',
        //     'quizid' => 'required',

        // ]);
         
         $k=0;    
        $validation = Validator::make($request->all(), [
            'diagram' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nooflables' => 'required',
            'noofquestions' => 'required',
            'marks' => 'required',
            'quizid' => 'required',

           ]);
           if($validation->passes())
           {
            $image = $request->file('diagram');
            $new_name = date('YmdHis') . "." . $image->getClientOriginalExtension();;
            $image->move(public_path('/images/'), $new_name);
            $form_data=array(
                'diagram' => $new_name,
                'nooflables' => $request->nooflables ,
                'noofquestions' => $request->noofquestions,
                'marks' => $request->marks,
                'quizid' => $request->quizid,   
    
            );
      
           // CourseMode::create($form_data);
           $labels= $request->nooflables ;
           $questions = $request->noofquestions;
      
          // $mid=Diagram::create($form_data)->Mid;
           $last = Diagram::insertGetId($form_data);

           $form_data_diagram=array(

            'blank' => '',
            'correctlabel' => '', 
            'diagramid' => $last,
            
        );
  
       // CourseMode::create($form_data);
          while($k < $questions){
            diagramquizes::create($form_data_diagram);
               $k++;
             }

           $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
           $i=0;

          $orders = diagramquizes::where('diagramid', $last)->get();

           $output ='';
           

           foreach($orders as $order){

            // $output .="success";

            //    return $orders;
               
            $output .= '<div class="">
                 <input type="hidden" class="form-control" name="id[]" value="'.$order->dqid.'">

          <div class="form-group">
     
            <input type="text" name="opt[]" class="form-control" id="exampleFormControlInput1" placeholder="Enter Question text" >
            </div>';

           $output .= '<div class="form-group">
                   <select class="form-control papercatdropdown" name="label[]"  id="paper-drop" >
                      <option value=""></option>';
                       $x=0;
                      while( $x < $labels){

                        $output .= '<option value="'. $alphabet[$x] .'">'. $alphabet[$x] .'</option>';
                         $x++; 
                      }
            $output .= '</select>           
            </div>
              </div>';
              $i++;
           }
           $output .=' <button class="btn btn-success" id="submit">Submit</button>';
           return response()->json(['success'=>$output]);
           //return $mid;


           }
           else
           {
            
            //dd($validation);
            return "error";

           }

        

        /*
        
        $image = $request->file('diagram');
        

       
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        $new_name = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move(public_path('/images/'), $new_name);
        $form_data=array(
            'diagram' => $new_name,
            'nooflables' => $request->nooflables ,
            'noofquestions' => $request->noofquestions,
            'quizid' => $request->quizid,
            


            

        );
  
       // CourseMode::create($form_data);
  
       Diagram::create($form_data);

       */
    
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

    public function updatediagram(Request $request){

       

        $ids = $request->input('id');
          $qstext = $request->input('opt');
         $label=$request->input('label');


//print_r($request->all());


          foreach($ids as $k => $id){

                    $values = array(
                    'blank' => $qstext[$k],
                    'correctlabel' =>$label[$k],
                    
                        );

                    DB::table('diagramquizes')->where('dqid','=',$id)->update($values);

                }

                $output = '<p>Record Added Succesfully</p>';
                return response()->json(['success'=>$output]);

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
