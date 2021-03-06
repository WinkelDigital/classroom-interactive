<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @csrf
    
    <div class="form-group">
        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
        <div class="">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    
    <div class="form-group">
        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
        
        <div class="">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>
    
    <div class="form-group ">
        <div class="justify-content-center row">
            <button type="submit" class="btn text-white btn-primary">
                {{ __('Login') }}
            </button>
            
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
    </div>
</form>
