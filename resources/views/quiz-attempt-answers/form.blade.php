<div class="form-group {{ $errors->has('quiz_attempt_id') ? 'has-error' : ''}}">
    <label for="quiz_attempt_id" class="col-md-4 control-label">{{ 'Quiz Attempt Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quiz_attempt_id" type="number" id="quiz_attempt_id" value="{{ $quizattemptanswer->quiz_attempt_id or ''}}" >
        {!! $errors->first('quiz_attempt_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $quizattemptanswer->user_id or ''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_id') ? 'has-error' : ''}}">
    <label for="question_id" class="col-md-4 control-label">{{ 'Question Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="question_id" type="number" id="question_id" value="{{ $quizattemptanswer->question_id or ''}}" >
        {!! $errors->first('question_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="col-md-4 control-label">{{ 'Answer' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="answer" type="text" id="answer" value="{{ $quizattemptanswer->answer or ''}}" >
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('answer_key') ? 'has-error' : ''}}">
    <label for="answer_key" class="col-md-4 control-label">{{ 'Answer Key' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="answer_key" type="text" id="answer_key" value="{{ $quizattemptanswer->answer_key or ''}}" >
        {!! $errors->first('answer_key', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('point') ? 'has-error' : ''}}">
    <label for="point" class="col-md-4 control-label">{{ 'Point' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="point" type="number" id="point" value="{{ $quizattemptanswer->point or ''}}" >
        {!! $errors->first('point', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
