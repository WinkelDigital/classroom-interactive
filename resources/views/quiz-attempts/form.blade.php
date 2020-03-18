<div class="form-group {{ $errors->has('activity_id') ? 'has-error' : ''}}">
    <label for="activity_id" class="col-md-4 control-label">{{ 'Activity Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="activity_id" type="number" id="activity_id" value="{{ $quizattempt->activity_id or ''}}" >
        {!! $errors->first('activity_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $quizattempt->user_id or ''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('point') ? 'has-error' : ''}}">
    <label for="point" class="col-md-4 control-label">{{ 'Point' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="point" type="number" id="point" value="{{ $quizattempt->point or ''}}" >
        {!! $errors->first('point', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('start') ? 'has-error' : ''}}">
    <label for="start" class="col-md-4 control-label">{{ 'Start' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="start" type="datetime-local" id="start" value="{{ $quizattempt->start or ''}}" >
        {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('finish') ? 'has-error' : ''}}">
    <label for="finish" class="col-md-4 control-label">{{ 'Finish' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="finish" type="datetime-local" id="finish" value="{{ $quizattempt->finish or ''}}" >
        {!! $errors->first('finish', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
