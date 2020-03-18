<div class="card side-widget">
    <div class="card-header">Navigation</div>
    <div class="card-body">
        
        @for($i=0;$i< ceil($questions->total()/5);$i++)
        <div class="row row-{{$i}}">
            @for($j=(5*$i);$j<((5*$i)+5);$j++)
            @if($j < $questions->total())
            <a href="/quiz_attempt/{{ $attempt->id }}?page={{$i+1}}#question-{{$j+1}}" class="btn question-nav-{{$j+1}} {{in_array($j+1,$answered)?'btn-secondary':'btn-outline-primary'}} btn-question-nav ">{{$j+1}}</a>
            @endif
            @endfor
        </div>
        @endfor
        
    </div>
</div>
<div class="card side-widget">
    <div class="card-header">Timer</div>
    <div class="card-body text-center">
        @if($attempt->activity->duration > 0)
        <p>Remaining time</p>
        <h5 class="countdown" data-finish="{{$attempt->finish}}"></h5>
        @else
        <h5>No Time Limit</h5>
        @endif
    </div>
    <div class="card-footer">
        <a href="#" data-toggle="modal" data-target="#finishQuizModal" class="btn btn-primary text-white float-right">Finish</a>
    </div>
               
</div>