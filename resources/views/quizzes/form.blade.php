<div class="row">
    <div class="col-sm-12">
        <button class="btn btn-primary pull-right">Save</button>
        <h2>Quiz</h2>
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-12">
        <input class="form-control" name="name" type="text" id="name" value="{{ $quiz->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-12">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $quiz->description or ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>


