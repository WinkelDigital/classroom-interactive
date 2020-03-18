@extends('layouts.app')
    
@section('content')
<div class="col-sm-6 offset-sm-3">
    <div class="card">
        <div class="card-header">
            <a href="#" data-target="#modalChangePassword" data-toggle="modal" class="btn float-right btn-secondary"><i class="fa fa-key"></i> Change Password</a>
            <h5>Profile</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Username:</label>
                </div>
                <div class="col-sm-12">
                    <label for="">{{ $user->name }}</label>
                </div>       
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Email:</label>
                </div>
                <div class="col-sm-12">
                    <label for="">{{ $user->email }}</label>
                </div>
                    
                    
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Classroom:</label>
                </div>
                <div class="col-sm-12">
                    @forelse($user->classrooms as $classroom)
                    <a href="/classrooms/{{$classroom->code}}/activity" class="badge badge-pill badge-info"> {{$classroom->name}} </a>
                    @empty
                    You haven't attend any class
                    @endforelse
                </div>
                    
                    
            </div>
        </div>
    </div>
</div>
@include('profile.modal.change_password')
@endsection