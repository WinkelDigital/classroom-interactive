@extends('layouts.frontpage')

@section('content')
<div class="main">
    <div class="container" style="max-width:450px">
        <div class="card border-primary">
            <div class="card-body">
                <h5 class="text-center">Login</h5>
                @include('auth._login_form')
            </div>
        </div>
    </div>
</div>
@endsection
