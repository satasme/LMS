<?php

namespace App\Http\Controllers;

use App\quiz;
use App\ShortAnsOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ShortAnsQuiz;

class ShortAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizes = quiz::all();
//        return $quizes;
        return view("admin.short_answer_question_model", compact('quizes'));
        //
    }

    public function insert(Request $request)
    {

        $member = new ShortAnsOption();
        $result = [];

        $ShortAnsQuiz=new ShortAnsQuiz();


        foreach ($request->input('shortanswer_value') as $key => $value) {
            $result["shortanswer_value.{$key}"] = 'required';

        }
        $validator = Validator::make($request->all(), $result);

    
        $ShortAnsQuiz->question = $request->question;
        $ShortAnsQuiz->quizid = $request->quizid;
        $ShortAnsQuiz->correctanswerid = $request->correct;
        $ShortAnsQuiz->save();
        $last_id = $ShortAnsQuiz->id;

        if ($validator->passes()) {

            foreach ($request->input('shortanswer_value') as $key => $value) {

                ShortAnsOption::create(['shortanswer_value' => $value, 'shortquiz_id' =>$last_id]);
            }

            return response()->json(['success' => 'done']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }



        // return  $request->shortanswer_value;

        // if ($request->ajax()) {
           

        //     $shortanswer_value = $request->shortanswer_value;
        //     $shortquiz_id = 1;
        //     for ($count = 0; $count < count($shortanswer_value); $count++) {
        //         $data = array(
        //             'shortanswer_value' => $shortanswer_value[$count],
        //             'shortquiz_id' => $shortquiz_id
        //         );
        //         $insert_data[]=$data;
        //     }
        //     ShortAnsOption::insert($insert_data);
        //     return response()->json([
        //         'success'=>'data added success'
        //     ]);
        // }

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
