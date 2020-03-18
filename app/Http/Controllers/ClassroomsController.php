<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use Illuminate\Http\Request;
use App\Quiz;
use App\ClassroomMember;
use App\Activities;
use App\Topic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ClassroomsController extends Controller
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
            $classrooms = Classroom::latest()->mine()->paginate($perPage);
        } else {
            $classrooms = Classroom::latest()->mine()->paginate($perPage);
        }

        return view('classrooms.index', compact('classrooms'));
    }
    
    public function class_presence($id){
        $classroom = Classroom::findOrFail($id);
        $check = ClassroomMember::where([
            ['user_id','=', Auth::id()],
            ['classroom_id','=',$classroom->id]
                ])->firstOrFail();
        $check->update_last_activities();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('classrooms.create');
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
        //TODO: add teacher as class member
        $request->validate(['name'=>'required','description'=>'required']);
        $requestData = $request->all();
        $class = Classroom::create($requestData);

        return redirect("/classrooms/{$class->id}")->with('flash_message', 'Classroom added!');
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
        $classroom = Classroom::findOrFail($id);

        return view('classrooms.show', compact('classroom'));
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
        $classroom = Classroom::findOrFail($id);

        return view('classrooms.edit', compact('classroom'));
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
        
        $classroom = Classroom::findOrFail($id);
        $classroom->update($requestData);

        return redirect('classrooms')->with('flash_message', 'Classroom updated!');
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
        Classroom::destroy($id);

        return redirect('classrooms')->with('flash_message', 'Classroom deleted!');
    }
    
    public function activity($code)
    {
        $classroom = Classroom::whereCode($code)->firstOrFail();
        $check = ClassroomMember::where([
            ['user_id','=', Auth::id()],
            ['classroom_id','=',$classroom->id]
                ])->firstOrFail();
        $check->update_last_activities();
        $quizzes = Quiz::has('questions')->latest()->mine()->get();
        $topics = Topic::latest()->mine()->get();
        $active_activities = Activities::where([
            'classroom_id'=>$classroom->id,
            'status'=>'active'
                ])->latest()->get();
        $past_activities = Activities::where([
            'classroom_id'=>$classroom->id,
            'status'=>'finished'
                ])->latest()->get();
        if (\Request::ajax()) {
            return response()->json(array('past_activities'=>$past_activities,
                    'active_activities'=>$active_activities));
        }
        return view('classrooms.activity')->with(array('classroom'=>$classroom,
                    'quizzes'=>$quizzes,
                    'topics'=>$topics,
                    'past_activities'=>$past_activities,
                    'active_activities'=>$active_activities));
    }
    
    public function find(Request $request){
        $code = $request->input('code');
        $classroom = Classroom::whereCode($code)->firstOrFail();
        ClassroomMember::firstOrCreate([
            'user_id' => Auth::id(),
            'classroom_id'=>$classroom->id ]);
        return redirect("/classrooms/$code/activity");
    }
}
