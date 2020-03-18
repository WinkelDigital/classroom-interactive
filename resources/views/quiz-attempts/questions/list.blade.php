@extends('layouts.app')
    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('quiz-attempts.questions.sidebar')
        </div>
            
        <div class="col-md-9">
            @include('quiz-attempts.questions.item-list')
        </div>
    </div>
</div>
    
@include('quiz-attempts.modal.confirm_finish')    
    
@endsection