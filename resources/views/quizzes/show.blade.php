@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">quiz {{ $quiz->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/quizzes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/quizzes/' . $quiz->id . '/edit') }}" title="Edit quiz"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('quizzes' . '/' . $quiz->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete quiz" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Name </th><td> {{ $quiz->name }} </td></tr>
                                    <tr><th> Description </th><td> {{ $quiz->description }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Questions</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="/questions/create?type=text&quiz_id={{ $quiz->id }}" class="btn btn-primary text-white pull-right">
                                    <i class="fa fa-plus"></i> Short Answer
                                </a>
                                <a href="/questions/create?type=boolean&quiz_id={{ $quiz->id }}" class="btn btn-primary text-white pull-right">
                                    <i class="fa fa-plus"></i> True/False
                                </a>
                                <a href="/questions/create?type=multiple&quiz_id={{ $quiz->id }}" class="btn btn-primary pull-right text-white">
                                    <i class="fa fa-plus"></i> Multiple Choice
                                </a>
                            </div>
                        </div>
                        <div class="question-list">
                            @include('quizzes.questions.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
