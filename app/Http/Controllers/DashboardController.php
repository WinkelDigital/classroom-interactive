<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ClassroomMember;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myclass =  ClassroomMember::where('user_id','=',Auth::id())
                ->with('classroom');
        if($myclass->count() == 1 && Auth::user()->user_level == 2){
            return redirect("/classrooms/{$myclass->first()->classroom->code}/activity");
        }
        return view('dashboard')->with(['classrooms'=>$myclass->get()]);
    }
}
