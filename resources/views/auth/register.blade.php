@extends('layouts.frontpage')

@section('content')
<div class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-info">
                    <h4 class="text-center mt-3">Register</h4>
                    
                    <div class="card-body">
                        @include('auth._register_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
