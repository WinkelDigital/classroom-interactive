<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-sm-12">
        <input class="form-control" name="name" type="text" id="name" value="{{ $topic->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-sm-12">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $topic->description or ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
    <label for="summary" class="col-md-4 control-label">{{ 'Summary' }}</label>
    <div class="col-sm-12">
        <textarea class="form-control " rows="5" name="summary" type="textarea" id="summary" >{{ $topic->summary or ''}}</textarea>
        {!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="summary" class="col-md-4 control-label">{{ 'Content' }}</label>
    <div class="col-sm-12">
        <textarea class="form-control summernote" data-height="300" name="content" type="textarea" id="content" >{{ $topic->content or ''}}</textarea>
        {!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
