@foreach($classrooms as $classroom)
<div class="card my-classroom-item mb-2">
    
    <div class="card-body">
        <span class="my-classroom-last-activity float-right"> last activity: {{$classroom->last_activities}}</span>
        <div class="my-classroom-name">
            <h4>{{$classroom->classroom->name}}</h4>
        </div>
        <div class="my-classroom-detail">{{$classroom->classroom->description}}</div>
    </div>
    <div class="card-footer"><a href="/classrooms/{{$classroom->classroom->code}}/activity" class="btn float-right btn-secondary">Enter Class</a></div>
</div>
@endforeach