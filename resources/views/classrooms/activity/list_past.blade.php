<div class="activity-list-past list-group">
   @foreach($past_activities as $activity)
<a href="/activities/{{$activity->id}}" class="activity-list-item list-group-item">
    {{$activity->name or $activity->{$activity->type}->name}} 
    <i class="fa fa-chevron-right float-right"></i>
</a>

   @endforeach 
</div>
