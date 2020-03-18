<div class="card">
    <div class="card-header">Questions </div>
    <div class="card-body">
        <div class="quiz-list">
            @foreach($questions as $question)
            <form action="/quiz_attempt/{{ $question->quiz_attempt_id }}/answer/{{ $question->id }}" class="form-answer">
                <div id="question-{{ $question->squence }}" class="card quiz-list-item">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <h2 class="quiz-squence">{{$question->squence}}</h2>
                                    
                            </div>
                            <div class="col-sm-10">
                                {!! $question->question->content !!}
                                <span class="quiz-hint">{{$question->question->hint?'hint: '.$question->question->hint:''}}</span>
                                <div class="row">
                                    <div class="col-sm-12">
                                        
                                        <label for="">Answer:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    {{ csrf_field() }}
                                    
                                        <div class="col-sm-12">
                                        
                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                        @if($question->question->type == 'text')
                                        <div class="input-group mb-3">
                                            <input type="text" name="answer" value="{{ $question->answer or '' }}" class="form-control" placeholder="Your answer" aria-describedby="basic-addon2">
                                            
                                        </div>
                                        
                                        @elseif($question->question->type == 'boolean')
                                        @php($options = ['true','false'])
                                        <div class="btn-group btn-group-toggle btn-group-toggle-quiz" data-toggle="buttons">
                                            @foreach($options as $option)
                                            <label class="btn {{$question->answer == $option?"active":""}} btn-answer-quiz btn-outline-{{ $option=="true"?"success":"danger"}}">
                                                <input type="radio" {{$question->answer == $option? "checked" : ""}} name="answer" value="{{$option}}" autocomplete="off"> {{$option}}
                                            </label>
                                            @endforeach
                                                
                                           
                                        </div>
                                        @else
                                        <div class="btn-group-toggle btn-group-toggle-quiz" data-toggle="buttons">
                                            @foreach($question->question->question_answer_options as $option)
                                            <label class="btn
                                                   btn-answer-quiz
                                                   answer-option-item 
                                                   answer-option-id-{{$option->id}} 
                                                   btn-outline-secondary
                                                   {{$question->answer == $option->id?'active':''}}">
                                                <input type="radio" {{ ($question->answer == $option->id)  ? 'checked' : '' }} name="answer" value="{{$option->id}}" autocomplete="off" checked> {{$option->answer_option}}
                                            </label>                  
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-submit-form-{{ $question->id }} float-right text-white">Submit</button>
                    </div>
                </div>
            </form>
            
            @endforeach
        </div>
        
    </div>
    <div class="card-footer">
        {{$questions->links()}}
    </div>
</div>
