@extends('layouts.frontpage')

@section('content')
<div class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body">
                        <h4 class="text-center">Student</h4>
                        <h5 class="text-center">Login</h5>
                        @include('auth._login_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
