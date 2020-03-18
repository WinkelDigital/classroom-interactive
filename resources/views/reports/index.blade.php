@extends('layouts.app')

@section('content')
<h2>Reports</h2>
<table class="table-striped datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $key => $report)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $report->name? $report->name:$report->quiz->name}}</td>
            <td>{{ $report->created_at }}</td>
            <td><a href="/activities/{{ $report->id }}/report" class="btn btn-sm btn-secondary">Show <i class="fa fa-chevron-circle-right"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection