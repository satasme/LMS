<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('contact-form', 'ContactController@create');
Route::post('contact-form', 'ContactController@store');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','HomeController@index');
Route::resource('courses','CourseController');
Route::resource('coursemodes','CourseModeController');
Route::resource('papercategories','PaperCategoryController');
Route::resource('quizes','QuizController');
Route::get('admin/home/quizes','QuizController@index');
Route::get('admin/home/coursemodes','CourseModeController@index');

Route::get('searchbox','searchController@search')->name('searchfilter');
Route::get('fillbox','managefillingblanksController@search')->name('fillboxfilter');
//Route::get('search','searchController@search');

Route::resource('mcqoptions','mcqoptionsController');
Route::resource('search','searchController');


Route::resource('blankoptions','BlankOptionsController');

Route::resource('coursetests','CoursetestController');
Route::get('admin/home/coursetests','CoursetestController@index');

Route::resource('managemcq','managemcqController');
Route::get('admin/home/managemcq','managemcqController@index');


Route::resource('headingoptions','headingoptionsController');

Route::resource('exams','examController');
Route::get('admin/home/exams','examController@index');

Route::post('admin/home/managefilling','managefillingblanksController@destroy');
Route::resource('managefillingblanks','managefillingblanksController');
Route::get('admin/home/managefillingblanks','managefillingblanksController@index');

Route::resource('matchingoptions','matchoptionsController');


Route::resource('mcqquizes','mcqquizeController');
Route::get('admin/home/mcqquizes','mcqquizeController@index');


Route::resource('matchingquestions','MatchingquestionsController');


// Route::resource('diagramquizes','DiagramquestionsController');
Route::get('admin/home/diagramquizes','DiagramquestionsController@index');
Route::post('admin/home/diagramquizes','DiagramquestionsController@store');
Route::post('diagramquizes/updatediagram','DiagramquestionsController@updatediagram');


Route::resource('matchingquizes','headingmatchController');
Route::get('admin/home/matchingquizes','headingmatchController@index');

Route::get('exam/listeningpaper','McqFrontendController@index');

Route::resource('fillingblanks','FillingBlanksController');
Route::get('admin/home/fillingblanks','FillingBlanksController@index');

Route::post('admin/home/managemcq', 'managemcqController@destroy');
Route::post('admin/home/mcqmanage','managemcqController@remove')->name('mcqmanage');
 Route::get('admin/home/editmcqmodel', 'managemcqController@update')->name('editmcqmodel');
 Route::get('admin/home/showmcqdata/{id}', 'managemcqController@test');
 Route::get('admin/home/showmcqdata/addopt/{id}', 'managemcqController@addopt');
// Route::get('admin/home/editmcqmode/{id}', 'managemcqController@update')->name('editmcqmodel');






Route::get('admin/home','AdminController@index');
Route::get('admin/home/courses','CourseController@index');
Route::get('admin/home/paper-categories','PaperCategoryController@index');
//Route::get('admin/home/coursemodes','AdminController@coursemodes');

Route::get('admin/home/add-quizes','AdminController@addQuizes');


Route::get('instructor/home','InstructorController@index');


Route::GET('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');

Route::POST('admin','Admin\LoginController@login');

Route::GET('login','Admin\LoginController@showLoginForm');

Route::POST('login','Admin\LoginController@login');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');


Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');

Route::POST('admin-password/reset/{token}','Admin\ForgotPasswordController@showResetForm')->name('admin.password.reset');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//////////modified By Chamil//////////////////////////


Route::get('Admin/short_answer_model','ShortAnswerController@index');
Route::post('/dynamic_field','ShortAnswerController@insert');


Route::get('get_quizzes_of_course_course_set_exam_paper_cat_id/{course_id}/{course_set_id}/{exam_id}/{paper_cat_id}','QuizController@get_quizzes_of_course_course_set_exam_paper_cat_id');
Route::get('exam/get_exam_of_course_course_set_id/{course_id}/{course_set_id}','examController@get_exam_of_course_course_set_id');

Route::get('/student-exam','ListeningQuestionsAnswersController@index');
//Route::get('exam_index','ListeningQuestionsAnswersController@test');
//Route::get('exams','ListeningQuestionsAnswersController@exam_index')->name('student.mcq_question');
//Route::get('mcq_question/{course_id}/{course_test_id}/{exam_id}/{papercat_id}','ListeningQuestionsAnswersController@getPaperUi')->name('student.mcq_question');
Route::get('mcq_question','ListeningQuestionsAnswersController@getPaperUi')->name('student.mcq_question');

Route::post('mcq-submit','ListeningQuestionsAnswersController@create');
Route::post('writing-submit','ListeningQuestionsAnswersController@createWriting');
Route::post('listening-submit','ListeningQuestionsAnswersController@createListening');
Route::post('speaking-submit','ListeningQuestionsAnswersController@createSpeaking');
