<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\QuizAttemptAnswer;
use App\QuizAttempt;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class QuizAttemptsController extends Controller
{
    public function run($attempt_id, Request $request){
        $perPage = 5;
        $attempt = QuizAttempt::findOrFail($attempt_id);
        if(!$this->check_user($attempt)){
            return redirect('/dashboard');
        }
        $now = Carbon::now();
        $finish = Carbon::parse($attempt->finish);
        if((($attempt->activity->duration>0) && ($now > $finish)) or $attempt->is_finished){
            $attempt->finish();
            return redirect("quiz_attempt/{$attempt->id}/result");
        }
        $questions = QuizAttemptAnswer::whereQuizAttemptId($attempt_id)->orderBy('squence')->paginate($perPage);
        $answered = QuizAttemptAnswer::whereQuizAttemptId($attempt_id)->whereNotNull('answer')->pluck('squence')->toArray();
        return view('quiz-attempts.questions.list')
                ->with(array('questions'=>$questions,'attempt'=>$attempt,'answered'=>$answered));
    }
    
    private function check_user($attempt){
        $user = Auth::user();
        if($user->user_level == 3){
            if($attempt->user_id != $user->id){
                return false;
            }
        }
        return true;
    }
    
    public function answer($attempt_id, $answer_id, Request $request){
        $attempt = QuizAttempt::findOrFail($attempt_id);
        if(!$this->check_user($attempt)){
            return redirect('/dashboard');
        }
        $answer = QuizAttemptAnswer::findOrFail($answer_id);
        $question = Question::findOrFail($answer->question_id);
        $answer->answer = $request->input('answer');
        $answer_key = [];
        $answer->answer_key = $question->answer;
        if($question->type == 'multiple'){
            foreach ($question->question_answer_options as $key => $answer_option) {
                if($answer->answer == $answer_option->id ){
                    $answer->point = $answer_option->point;
                }
                if($answer_option->point > 0){
                    $answer->answer_key = $answer_option->id;
                    array_push($answer_key, $answer_option->id);
                }
            }
        }else{
            array_push($answer_key,$question->answer);
            if($answer->answer == $question->answer){
                $answer->point = 10;
            }else{
                $answer->point = 0;
            }
        }
        $answer->save();
        return response()->json(array(
            'correct'=> ($answer->point > 0),
            'answer_key'=>$answer_key,
            'answer' => $answer->answer,
            'type'=>$question->type,
            'id'=>$answer_id,
            'sequence'=> $answer->squence
        ));
    }
    
    public function finish_attempt($attempt_id){
        $attempt = QuizAttempt::findOrFail($attempt_id);
        if(!$this->check_user($attempt)){
            return redirect('/dashboard');
        }
 
        $attempt->finish();
        return redirect("/quiz_attempt/$attempt_id/result");
    }
    
    public function attempt_result($attempt_id){
        $attempt = QuizAttempt::findOrFail($attempt_id);
        
        if(!$this->check_user($attempt)){
            return redirect('/dashboard');
        }
 
        return view('quiz-attempts.result')->with(array('attempt'=>$attempt));
    }
    
    public function review($id){
        $attempt = QuizAttempt::findOrFail($id);
        if(!$this->check_user($attempt)){
            return redirect('/dashboard');
        }

        $questions = QuizAttemptAnswer::whereQuizAttemptId($id)->orderBy('squence')->paginate(10);
        return view('quiz-attempts.review')->with(array('attempt'=>$attempt,'questions'=>$questions));
    }
}
