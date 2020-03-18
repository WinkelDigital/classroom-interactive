<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classroom;
use App\Activities;
use App\QuizAttempt;
use App\Question;
use Carbon\Carbon;
use App\QuizAttemptAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\ClassroomMember;
use App\File;
use App\Events\ClassroomActivityPusherEvent;

class ActivitiesController extends Controller
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
            $activities = Activities::latest()->paginate($perPage);
        } else {
            $activities = Activities::latest()->paginate($perPage);
        }

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('activities.create');
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
//        event( new ClassroomActivityPusherEvent('coba'));
        $requestData = $request->all();
        if($request->input('type')=='file'){
            request()->validate([
                'file' => 'mimes:jpeg,png,jpg,docx,doc,pdf|max:5000',
            ]);
            $file = new File();
            $file->name = $request->input('file_name');
            $file->description = $request->input('file_description');
            $file = $file->save_file($request->file('file'));
            $requestData['rel_id'] = $file->id;
        }
        $activity = Activities::create($requestData);
        $classroom = Classroom::find($request->input('classroom_id'));
        //TODO: fix this
        $options = array(
         'cluster' => 'ap1',
         'encrypted' => true
        );
        $pusher = new \Pusher\Pusher(
          '5cc3333cf7b2bc512b42',
          '64d8bc31c8ba5257d685',
          '554747',
          $options
        );
        //endtodo
        $data['message'] = $activity;
        $pusher->trigger('my-channel', 'my-event', $data);
        return redirect("/classrooms/{$classroom->code}/activity")->with('flash_message', 'Activities added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $activity = Activities::findOrFail($id);
        if (\Request::ajax()) {
            return response()->json(Activities::with(['topic','quiz','file'])->findOrFail($id));
        }else{
            if($activity->type =="quiz"){
                if(Auth::user()->user_level == 2){
                    return redirect("/activities/$id/report");
                }else{

                }
                $attempt = QuizAttempt::whereActivityId($activity->id)->mine();
                //find active attempt
                $max_score_attempt = $attempt->orderBy('score')->first();
                $activity->attempts_remaining = $activity->max_attempts - $attempt->count();
//                if(($attempt->count() >= $activity->max_attempts) or $activity->status == 'finished'){
//                    return redirect("/quiz_attempt/{$max_score_attempt->id}/result");
//                }
                $active = $attempt->whereIsFinished(false)->first();
                $activity->attempts = QuizAttempt::whereActivityId($activity->id)->mine()->get();
                if($active){
                    return redirect("/quiz_attempt/{$active->id}");
                }
            }
            elseif($activity->type == "file"){
                 return response()->download(storage_path("app/{$activity->file->real_path}"));
            }
            return view('activities.show', compact('activity'));        
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $activity = Activities::findOrFail($id);

        return view('activities.edit', compact('activity'));
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
        
        $activity = Activities::findOrFail($id);
        $activity->update($requestData);

        return redirect("/classrooms/{$activity->classroom->code}/activity")->with('flash_message', 'Activities updated!');
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
        Activities::destroy($id);
        if(request()->query('ref')){
            return redirect(request()->query('ref'))->with('flash_message', 'Activities deleted!');
        }
        return redirect('activities')->with('flash_message', 'Activities deleted!');
    }
    
    public function attempt_quiz($activity_id){
        $quiz_attempt = QuizAttempt::firstOrCreate(
                array('activity_id'=>$activity_id,
                        'is_finished'=>false,
                    'user_id'=> Auth::id()));
        if(!$quiz_attempt->start){
            $quiz_attempt->start = Carbon::now();
            $quiz_attempt->finish = Carbon::now()
                    ->addMinutes($quiz_attempt
                            ->activity->duration);
            $quiz_attempt->point = 0;        
            $quiz_attempt->save();
        }
        //synchronize user answer with attempt
        //find all question of quiz
        //TODO: add option to random or not
        $questions = Question::inRandomOrder()->whereQuizId($quiz_attempt->activity->rel_id)->get();
        foreach ($questions as $key => $value) {
            $answer_option = QuizAttemptAnswer::firstOrCreate(
                    array('question_id'=>$value->id,
                        'quiz_attempt_id'=>$quiz_attempt->id,
                        'user_id'=>Auth::id()));
            if(!$answer_option->squence){
                $answer_option->squence = $key+1;
                $answer_option->save();
            }
        }
        return redirect('/quiz_attempt/'.$quiz_attempt->id);
    }
    
    public function report($id){
        $activity = Activities::where(array('id'=>$id,'type'=>'quiz'))
                ->firstOrFail();
        $attendance = $activity->classroom->members;
        foreach ($attendance as $key => $member) {
            if($member->user_level==3){
                //find attempt by user and activity
                $attempt = QuizAttempt::where(array(
                    'activity_id'=>$activity->id,
                    'is_finished' => true,
                    'user_id'=>$member->id))
                        ->orderBy('id')
                        ->get();
                $member->attempts = $attempt;
            }
        }
//        print_r($attendance);
        return view('activities.report')->with(array('results'=>$attendance,'activity'=>$activity));
    }
}
