
<div class="form-group">
    <div class="col-md-12">
        <input class="btn btn-primary pull-right" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="col-md-4 control-label">{{ 'Question' }}</label>
    <div class="col-md-12">
        <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ $question->content or ''}}</textarea>
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<input type="hidden" name="type" value="{{$type}}">
<input type="hidden" name="quiz_id" value="{{$question->quiz_id or Request::query('quiz_id')}}">
<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="col-md-4 control-label">{{ 'Answer' }}</label>
    @if ($type == 'multiple')
    <div class="col-sm-12">
        @for ($i = 0; $i < 6; $i++)
        @php($checked = null)
        @php($value = null)
        <div class="row">
            <div class="col-md-12">
                @if(isset($question->question_answer_options[$i]))
                   @if($question->question_answer_options[$i]->point > 0)
                       @php($checked = 'checked')
                   @endif
                   @php($value = $question->question_answer_options[$i]->answer_option)                       
                <input type="hidden" name="answer_id[{{$i}}]" value="{{ $question->question_answer_options[$i]->id }}">
                @endif
                <div class="input-group answer-options">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary btn-delete-option" type="button"><i class="fa fa-close"></i></button>
                    </div>
              
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="point[{{$i}}]" {{ $checked or "" }} value="10">
                        </div>
                    </div>
                    <input type="text" value="{{ $value or '' }}" class="form-control input-answer-option" name="answer_option[{{$i}}]" aria-label="Text input with checkbox">
                    
                </div>
            </div>
        </div>
        @endfor
    </div>
    @elseif($type == 'boolean')
    <div class="col-sm-12">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            @php($options = ['true'=>'success','false'=>'danger'])
            @foreach($options as $key => $itype)
            <label class="btn {{ $question->answer == $key? 'active':'' }} btn-outline-{{ $itype }}">
                <input type="radio" {{ $question->answer == $key? 'checked':'' }} name="answer" value="{{ $key }}" autocomplete="off" checked> {{ $key }}
            </label>
            @endforeach
        </div>
    </div>
    @else
    <div class="col-md-12">
        <input class="form-control" name="answer" type="text" id="answer" value="{{ $question->answer or ''}}" >
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
    @endif
</div>
<!--<div class="form-group {{ $errors->has('feedback') ? 'has-error' : ''}}">
    <label for="feedback" class="col-md-4 control-label">{{ 'Feedback' }}</label>
    <div class="col-md-12">
        <input class="form-control" name="feedback" type="text" id="feedback" value="{{ $question->feedback or ''}}" >
        {!! $errors->first('feedback', '<p class="help-block">:message</p>') !!}
    </div>
</div>-->
<div class="form-group {{ $errors->has('hint') ? 'has-error' : ''}}">
    <label for="hint" class="col-md-4 control-label">{{ 'Hint' }}</label>
    <div class="col-md-12">
        <input class="form-control" name="hint" type="text" id="hint" value="{{ $question->hint or ''}}" >
        {!! $errors->first('hint', '<p class="help-block">:message</p>') !!}
    </div>
</div>

