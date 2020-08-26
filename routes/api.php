<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('quizzes/get_quizzes_of_course_course_set_exam_paper_cat_id/{course_id}/{course_set_id}/{exam_id}/{paper_cat_id}','QuizController@get_quizzes_of_course_course_set_exam_paper_cat_id');
Route::get('exam/get_exam_of_course_course_set_id/{course_id}/{course_set_id}','examController@get_exam_of_course_course_set_id');


Route::get('listening-questions/listening-questions-answers-save','ListeningQuestionsAnswersController@save');
Route::get('speaking-questions-answers/speaking-questions-answers-save','SpeakingQuestionsAnswersController@save');


Route::get('/getPaperUi','ListeningQuestionsAnswersController@getPaperUi');
