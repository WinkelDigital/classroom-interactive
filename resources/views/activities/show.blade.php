@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($activity->type == 'quiz')
            @include('activities.activity.quiz')
            @else
            @include('activities.activity.topic')
            @endif
        </div>
    </div>
</div>
@endsection
