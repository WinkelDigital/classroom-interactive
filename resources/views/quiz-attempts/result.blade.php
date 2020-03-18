@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Quiz Result</h3>
    </div>
    <div class="card-body">
        <div class="text-center quiz-result-body">
            <h3>Result</h3>
            <p>{{ $attempt->point/10 }}/{{ $attempt->num_of_question }}</p>
            <h4>Your score: {{ $attempt->score }}</h4>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attempt->quiz_attempt_answers as $answer)
                     <tr>
                        <td>{{ $answer->squence }}</td>
                        <td>{{ $answer->point?$answer->point:0 }}</td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="card-footer">
        @if(!$attempt->is_finished)
        <a href="/quiz_attempt/{{$attempt->id}}" class="btn btn-secondary float-right">Continue Quiz</a>
        @endif
        <a href="/classrooms/{{$attempt->activity->classroom->code}}/activity" class="btn btn-default float-right">Back to classroom page</a>
    
    </div>
</div>
@endsection