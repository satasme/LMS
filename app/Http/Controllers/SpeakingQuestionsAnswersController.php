<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\SpeakingQuestionsAnswers;
use Illuminate\Support\Facades\Storage;

class SpeakingQuestionsAnswersController extends Controller
{
    public function save(Request $request)
    {
        $speakingQuestionsAnswers = new SpeakingQuestionsAnswers();
        $speakingQuestionsAnswers->answer_path = $this->decodeBase64Data($request->input('answer_path'));
        $speakingQuestionsAnswers->userid = $request->input('userid');
        $speakingQuestionsAnswers->quizzesid = $request->input('quizzesid');
        $speakingQuestionsAnswers->save();
        return response()->json($speakingQuestionsAnswers);
    }

    public function decodeBase64Data($base64data)
    {
        $base64_str = substr($base64data, strpos($base64data, ",") + 1);
        $path = null;
        if ($base64_str === base64_encode(base64_decode($base64_str, true))) {
            $decode_data = null;
            $decoded = base64_decode($base64_str, true);
            if ($base64_str == base64_encode($decoded)) {
                $decode_data = $decoded;
            }
            $safeName = Carbon::now()->format('Y-M-d') . '_' . random_int(100000, 3000000) . '.' . 'WAV';
            Storage::disk('public')->put('/upload/secure/' . $safeName, $decode_data);
            $path = '/upload/secure/' . $safeName;
        }
        return $path;
    }

}
