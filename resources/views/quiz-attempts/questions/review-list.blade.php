<div class="card">
    <div class="card-header">Questions <span class="float-right">{{$questions->links()}}</span></div>
    <div class="card-body">
        <div class="quiz-list">
            @foreach($questions as $question)
            <div class="card quiz-list-item {{$question->point>0?'border-success':'border-danger wrong-answer'}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <h2 class="quiz-squence">{{$question->squence}}</h2>
                        </div>
                        <div class="col-sm-10">
                            {!! $question->question->content !!}
                            <div class="row">
                                <div class="col-sm-12">
                                    <span>Answer:</span>
                                    <div class="answer">
                                        @if($question->question->type == 'multiple')
                                        {{ $question->answer_content->answer_option }}
                                        @else
                                        {{ $question->answer }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(!($question->point>0))
                            <div class="row">
                                <div class="col-sm-12">
                                    <span>Correct Answer:</span>
                                    <div class="answer-key">
                                        @if($question->question->type == 'multiple')
                                        {{ $question->answer_key_content->answer_option }}
                                        @else
                                        {{ $question->answer_key }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        <span class="float-right">{{$questions->links()}}</span>
    </div>
</div>