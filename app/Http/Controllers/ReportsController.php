<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activities;


class ReportsController extends Controller
{
    //
    public function index(){
        $reports = Activities::whereType('quiz')
                ->whereIn('classroom_id',function($query){
                    $query->select('id')->from('classrooms')
                            ->where(array('owner_id'=>2));
                })->get();
        return view('reports.index')->with(array('reports'=>$reports));        
    }
}
