    
<div class="card">
    <div class="card-body">
        <h3>{{ $activity->name or $activity->topic->name }}</h3>
        <hr>
    <div class="row activity-topic-summary">
        <div class="col-sm-12">
            {{ $activity->topic->summary }}
        </div>
    </div>
    <div class="row activity-topic-content">
        <div class="col-sm-12">
            {!! $activity->topic->content !!}
        </div>
    </div>
    </div>
    <div class="card-footer">
        <div class="col-sm-12"><a href="/classrooms/{{ $activity->classroom->code}}/activity" class="btn btn-secondary float-right">Back to Class</a></div>
    </div>
</div>