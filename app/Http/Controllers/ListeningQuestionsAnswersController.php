<?php

namespace App\Http\Controllers;

use App\exam;
use App\ListeningQuestionsAnswers;
use App\mcqquiz;
use App\McqResult;
use App\McqResultsAnsers;
use App\SpeakingQuestionsAnswers;
use App\WritingQuestionsAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ListeningQuestionsAnswersController extends Controller
{

//    public function test()
//    {
//        $exams = exam::all()->toArray();
//        return view('student.student_exams', compact('exams'));
//    }

    public function index()
    {
        $exam = exam::all()->toArray();
        return view('student.studenexam', compact('exam'));
    }

//    public function getPaperUi($course_id,$course_test_id,$exam_id,$papercat_id)
    public function getPaperUi()
    {

        $mcq_option_list = [];

        $mcq_list = DB::table('mcqquizes')
            ->select('*')
            ->get();

        foreach ($mcq_list as $mcq) {
            $mcq_option = DB::table('mcqoptions')
                ->select('*')
                ->where('question_id', '=', $mcq->id)
                ->get();


            $mcq_and_option = [
                "id" => $mcq->id,
                "Question" => $mcq->Question,
                "marks" => $mcq->Question,
                "options_list" => json_decode($mcq_option, true)
            ];
            array_push($mcq_option_list, $mcq_and_option);
        }


        $Listening_list_e = DB::table('quizes')
            ->select('*')
            ->where('courseid', '=', 3)
            ->where('coursetestid', '=', 2)
            ->where('examid', '=', 2)
            ->where('papercatid', '=', 4)
            ->get();
        $Listening_list = json_decode($Listening_list_e, true);

        $Reading_list_e = DB::table('quizes')
            ->select('*')
            ->where('courseid', '=', 3)
            ->where('coursetestid', '=', 2)
            ->where('examid', '=', 2)
            ->where('papercatid', '=', 5)
            ->get();
        $Reading_list = json_decode($Reading_list_e, true);

        $Writing_list_e = DB::table('quizes')
            ->select('*')
            ->where('courseid', '=', 3)
            ->where('coursetestid', '=', 2)
            ->where('examid', '=', 2)
            ->where('papercatid', '=', 3)
            ->get();
        $Writing_list = json_decode($Writing_list_e, true);

        $Speaking_list_e = DB::table('quizes')
            ->select('*')
            ->where('courseid', '=', 3)
            ->where('coursetestid', '=', 2)
            ->where('examid', '=', 2)
            ->where('papercatid', '=', 1)
            ->get();
        $Speaking_list = json_decode($Speaking_list_e, true);


        return view('student.mcq_question', compact('mcq_option_list', 'Listening_list', 'Reading_list', 'Writing_list', 'Speaking_list'));
//        return $mcq_option_list;
    }

    public function create(Request $request)
    {
        $y = array_keys($request->input());
        array_shift($y);
        foreach ($y as $re) {
            $quizid = $re;
            $Result = $request->input()[$re];
            $mcqresults = new McqResult();
            $mcqresults->quizid = $quizid;
            $mcqresults->userid = 1;
            $mcqresults->Results = $Result;
            $mcqresults->save();
        }
        return redirect()->back()->with('success');

    }

    public function createWriting(Request $request)
    {
        $writing_list = array_keys($request->input());
        array_shift($writing_list);

        foreach ($writing_list as $writing_q) {
            $quizid = $writing_q;
            $answer = $request->input()[$writing_q];
            $writing_questions_answers = new WritingQuestionsAnswers();
            $writing_questions_answers->quizzesid = $quizid;
            $writing_questions_answers->userid = 1;
            $writing_questions_answers->answer = $answer;
            $writing_questions_answers->save();
        }

        return redirect()->back();

    }

    public function createListening(Request $request)
    {
        $listening_list = array_keys($request->input());
        array_shift($listening_list);

        foreach ($listening_list as $listening_q) {
            $quizid = $listening_q;
            $answer = $request->input()[$listening_q];
            $listening_questions_answers = new ListeningQuestionsAnswers();
            $listening_questions_answers->quizzesid = $quizid;
            $listening_questions_answers->userid = 1;
            $listening_questions_answers->answer = $answer;
            $listening_questions_answers->save();
        }

        return redirect()->back();

    }

    public function createSpeaking(Request $request)
    {
        $quizzesid=$request->input('speaking_id');
        $answer_path = $request->file('file')->store('public/upload');

        $speaking_questions_answers = new SpeakingQuestionsAnswers();
        $speaking_questions_answers->answer_path = $answer_path;
        $speaking_questions_answers->userid = 1;
        $speaking_questions_answers->quizzesid = $quizzesid;
        $speaking_questions_answers->save();

        return redirect()->back();

    }

    public function save(Request $request)
    {
        $listeningQuestionsAnswers = new ListeningQuestionsAnswers();
        $listeningQuestionsAnswers->answer = $request->input('answer');
        $listeningQuestionsAnswers->userid = $request->input('userid');
        $listeningQuestionsAnswers->quizzesid = $request->input('quizzesid');
        $listeningQuestionsAnswers->save();
        return response()->json($listeningQuestionsAnswers);
    }
}
