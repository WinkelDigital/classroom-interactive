<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use App\QuestionAnswerOption;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $questions = Question::latest()->paginate($perPage);
        } else {
            $questions = Question::latest()->paginate($perPage);
        }

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $question = new Question;
        return view('questions.create')
                ->with(array('question'=>$question,
                    'type'=> $request->query('type')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        $question = Question::create($requestData);
        if($request->input('type') == 'multiple'){
            foreach ($request->input('answer_option') as $key => $value) {
                if(!(!isset($value) || trim($value) == '')){
                $answer = QuestionAnswerOption::create(array(
                    'question_id' => $question->id,
                    'point' => isset($request->input('point')[$key])?$request->input('point')[$key]:0,
                    'answer_option' => $value
                ));
                }
            }
        }

        return redirect('/quizzes/'.$request->input('quiz_id'))->with('flash_message', 'Question added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id, Request $request)
    {
        $question = Question::findOrFail($id);

        return view('questions.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $question = Question::findOrFail($id);

        return view('questions.edit')
                ->with(array('question'=>$question,
                    'type'=> $question->type));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $question = Question::findOrFail($id);
        $question->update($requestData);
        if($request->input('type') == 'multiple'){
            foreach ($request->input('answer_option') as $key => $value) {
                if(isset($request->input('answer_id')[$key])){
                    $answer = QuestionAnswerOption::find($request->input('answer_id')[$key]);
                }else{
                     $answer = new QuestionAnswerOption;
                }
                if(!(!isset($value) || trim($value) == '')){
                    $answer->point = isset($request->input('point')[$key])?$request->input('point')[$key]:0;
                    $answer->answer_option = $value;
                    $answer->question_id = $question->id;
                    $answer->save();
                }else{
                    if($answer->id){
                        $answer->delete();
                    }
                }
            }
        }
        return redirect('/quizzes/'.$request->input('quiz_id'))->with('flash_message', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Question::destroy($id);

        return redirect('questions')->with('flash_message', 'Question deleted!');
    }
}
