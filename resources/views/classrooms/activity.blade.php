@extends('layouts.app')
    
@section('content')
<div id="classroom">
    <h3 id="classroom-code">{{$classroom->code}}</h3>
    <h5 id="classroom-name">{{$classroom->name}}</h5>
        
    @if(Auth::user()->user_level < 3)
    @if (count($errors) > 0)

    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
    @include('classrooms.activity.form')
    
    <div class="">
            <h6 class="activity-quick text-with-line">Activities</h6>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-8 active-activities">
            <h6 class="text-center title-activities">Active Activities</h6>
            <div id="list-activity-active-{{$classroom->code}}" class="list-activities">
                @include('classrooms.activity.list_active')
            </div>
        </div>
        <div class="col-sm-4 past-activities">
            <h6 class="text-center title-activities">Past Activities</h6>
            @include('classrooms.activity.list_past')
        </div>
    </div>
</div>
@include('classrooms.modal.quiz_launcher')
@include('classrooms.modal.topic_launcher')
@include('classrooms.modal.file_launcher')
@endsection