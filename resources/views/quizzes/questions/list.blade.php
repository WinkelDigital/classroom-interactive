@forelse($quiz->questions as $question)
<div class="card question-list-item">
    <div class="card-body">
        <label>Question:</label>
        <div class="question-body">
            {!! $question->content !!}
            <div class="question-answer">
                <label>Answer: {{$question->answer}}</label>
                @if($question->type == 'multiple')
                <table class="question-list-item-answer-option">
                    @foreach($question->question_answer_options as $option)
                    <tr>
                        <td>{!! $option->point > 0?'<i class="fa fa-check"></i>':'' !!}</td>
                        <td>{{$option->answer_option}}</td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
            
        
    </div>
    <div class="card-footer">
        <form method="POST" action="{{ url('/questions' . '/' . $question->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <a href="/questions/{{ $question->id }}/edit" class="btn btn-secondary pull-right">
                <i class="fa fa-pencil"></i> Edit
            </a>
            <button type="submit" class="btn pull-right btn-danger" title="Delete question" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
            
            
    </div>
</div>
@empty
<div class="empty-list empty-questions">
    Empty
</div>
@endforelse