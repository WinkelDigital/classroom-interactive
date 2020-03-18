@extends('layouts.app')

@section('content')
@if(Auth::user()->user_level > 2)
<div class="main-page">
    <div class="col-sm-8 offset-2">
        <h2 class="text-center">Join class</h2>
        <div class="form-enter-classroom">
            <form method="POST" action="/classrooms/find">
                {{ csrf_field() }}
                <div class="col-sm-8 offset-2">
                    <label for="classroom-code">Enter classroom code</label>
                    <input class="form-control" name="code" id="classroom-code" type="text">
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<div class="classroom-list">
    <div class="row">
        <div class="offset-sm-3 col-sm-6 ">
            <h6 class="text-with-line classroom-list-title">My Classroom</h6>
        </div>
        <div class="col-sm-8 offset-sm-2">
            <div class="myclassroom">
                @include('classrooms.member.classroom_list')
            </div>
        </div>
    </div>
</div>
@endsection