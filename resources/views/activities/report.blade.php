@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Report {{ $activity->name or $activity->{$activity->type}->name }}</h3>
        <table class="table datatable table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    @for($i=0;$i<$activity->max_attempts;$i++)
                    <th> attempt {{$i+1}}</th>
                    @endfor
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $key => $result)
                @if($result->user_level == 3)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$result->name}}</td>
                    @for($i=0;$i<$activity->max_attempts;$i++)
                    <td>
                       @if(isset($result->attempts[$i]))
                       score: {{ $result->attempts[$i]->score }} <a href="/quiz_attempt/{{$result->attempts[$i]->id}}/review" class="btn btn-link"><i class="fa fa-file"></i></a>
                       @else
                       Not taken yet
                       @endif

                    </td>
                    @endfor
                    <td></td>
                </tr>
                @endif
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="card-footer"><a href="/classrooms/{{$activity->classroom->code}}/activity" class="btn btn-secondary float-right">Back</a></div>
</div>
@endsection