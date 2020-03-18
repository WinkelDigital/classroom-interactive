@extends('layouts.app')

@section('content')
    @if($activity->type == 'quiz')
        @include('activities.activity.quiz')
    @else
        @include('activities.activity.topic')
    @endif
@endsection
