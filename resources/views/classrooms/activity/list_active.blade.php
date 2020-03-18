@forelse($active_activities as $activity)
<div class="card activity-list-item activity-list-item-active">
    <div class="card-header">
        @switch($activity->type)
        @case('file')
        @php ($action = '<i class="fa fa-download"></i> Download')
        <i class="fa fa-file"></i> File
        @break
        @case('quiz')
        @php ($action = '<i class="fa fa-pencil"></i> Take Quiz')
        <i class="fa fa-pencil"></i> Quiz 
        @break
        @case('topic')
        @php ($action = '<i class="fa fa-file-o"></i> Read Topic')
        <i class="fa fa-file-text"></i> Topic 
        @break
        @endswitch
    </div>
    <div class="card-body">
        <div class="activity-list-item-head">
            <span class="float-right">{{$activity->created_at->diffForHumans()}}</span>
            <h4>{{$activity->name?$activity->name:$activity->{$activity->type}->name}}</h4>
        </div>
        <div class="activity-list-item-body">
            {{$activity->{$activity->type}->description}}
        </div>
    </div>
    <div class="card-footer">
        <form action="/activities/{{ $activity->id }}" method="POST">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            @if(Auth::user()->user_level > 2 || ($activity->type != 'quiz'))
            <a href="/activities/{{ $activity->id }}" class="btn btn-secondary text-white float-right">
                {!! $action !!}
            </a>
            @endif
            @if(Auth::user()->user_level == 2)
            <input type="hidden" name="status" value="finished">    
            <button type="submit"  class="btn btn-success float-right"><i class="fa fa-check"></i> Set to done</button>
            @if($activity->type == 'quiz')
            <a href="/activities/{{ $activity->id }}/report" class="btn btn-dark float-right"><i class="fa fa-file-o"></i> Report</a>
            @endif
            @endif
        </form>
            
    </div>
</div>
@empty
<div class="no-activity empty-list">No activity</div>
@endforelse