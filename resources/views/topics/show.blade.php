@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">topic {{ $topic->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/topics') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/topics/' . $topic->id . '/edit') }}" title="Edit topic"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('topics' . '/' . $topic->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete topic" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $topic->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $topic->name }} </td></tr>
                                    <tr><th> Description </th><td> {!! $topic->description !!} </td></tr>
                                    <tr><th> Summary </th><td> {!! $topic->summary !!} </td></tr>
                                    <tr><th> Content </th><td> {!! $topic->content !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
