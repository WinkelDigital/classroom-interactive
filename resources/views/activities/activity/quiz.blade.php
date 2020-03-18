<div class="card">
    <div class="card-body">
        <div class="quiz-overview text-center">
            <h4 class="quiz-overview-detail">
                {{$activity->name?$activity->name:$activity->quiz->name}}
            </h4>
            <div class="quiz-overview-detail">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Time Limit:</label>
                        <p>{{ $activity->duration > 0 ? $activity->duration." Minute":"No limit" }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Attempt(s) remaining:</label>
                        <p>{{ $activity->attempts_remaining }} of {{ $activity->max_attempts }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Desciption:</label>
                        
                        <p>{{ $activity->quiz->description? $activity->quiz->description:'No description available'}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Taken At</td>
                                    <td>Point</td>
                                    <td>Score</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activity->attempts as $key => $attempt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $attempt->start }}</td>
                                    <td>{{ $attempt->point/10 }}/{{ $attempt->num_of_question }}</td>
                                    <td>{{ $attempt->score }}</td>
                                    <td>
                                        <a href="/quiz_attempt/{{ $attempt->id }}/result" class="btn btn-secondary btn-sm"><i class="fa fa-file-o"></i> show result</a>
                                        @if(!$attempt->is_finished)
                                        <a href="/quiz_attempt/{{ $attempt->id }}" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-circle-right"></i> continue</a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <form method="POST" action="/activities/{{$activity->id}}/attempt_quiz">
            {{ csrf_field() }}
            @if($activity->status == 'active' && $activity->attempts_remaining>0)
            <button  type="submit" class="btn text-white btn-primary float-right" >Take Quiz</button>
            @endif
        </form>
    </div>
</div>