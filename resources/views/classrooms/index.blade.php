@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Classrooms</div>
                    <div class="card-body">
                        <a href="{{ url('/classrooms/create') }}" class="btn btn-success btn-sm" title="Add New classroom">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Code</th><th>Name</th><th>Description</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($classrooms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->code }}</td><td>{{ $item->name }}</td><td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('/classrooms/' . $item->id) }}" title="View classroom"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/classrooms/' . $item->id . '/edit') }}" title="Edit classroom"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/classrooms' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete classroom" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
