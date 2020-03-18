@extends('layouts.app')
    
@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="/activities/{{$attempt->activity->id}}/report" class="btn btn-primary text-white float-right"><i class="fa fa-arrow-left"></i> Back</a>
        <h2>Review</h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5"><label for="">Name</label></div>
                    <div class="col-sm-7">{{ $attempt->user->name }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-5"><label for="">Finished in</label></div>
                    <div class="col-sm-7">{{ \Carbon\Carbon::parse($attempt->finish)->diff(\Carbon\Carbon::parse($attempt->start))->format('%H:%I:%S') }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-5"><label for="">Score</label></div>
                    <div class="col-sm-7">{{ $attempt->score }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-5"><label for="">Mark</label></div>
                    <div class="col-sm-7">{{ $attempt->point/10 }}/{{ $attempt->num_of_question }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        @include('quiz-attempts.questions.review-list')
    </div>
</div>
@endsection