<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-12">
        <input class="form-control" name="name" type="text" id="name" value="{{ $user->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-12">
        <input class="form-control" name="email" type="text" id="email" value="{{ $user->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if(!isset($user))
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
    <div class="col-md-12">
        <input class="form-control" name="password" type="text" id="password" value="{{ $user->password or ''}}" >
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('user_level') ? 'has-error' : ''}}">
    <label for="user_level" class="col-md-4 control-label">{{ 'User Level' }}</label>
    <div class="col-md-12">
        <select name="user_level" class="form-control" id="user_level" >
            @foreach (['1'=>'admin','2'=>'Teacher','3'=>'Student'] as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($user->user_level) && $user->user_level == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        {!! $errors->first('user_level', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
