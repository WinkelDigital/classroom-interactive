<div class="modal fade" id="modalQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/activities">
             {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Launch Quiz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="accordionQuizLaunch">
                    
                    <div>
                        <a href="#" class="btn btn-link" data-toggle="collapse" data-target="#collapseQOne" aria-expanded="true" aria-controls="collapseOne">  
                            <h5>Choose Quiz</h5>      
                        </a>
                        <div id="collapseQOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionQuizLaunch">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10%"></th>
                                        <th style="width: 70%">Name</th>
                                        <th style="width: 20%">Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($quizzes as $quiz)
                                    <tr>
                                        <td>
                                            <input type="radio" name="rel_id" value="{{$quiz->id}}">
                                        </td>
                                        <td>
                                            <p class="quizlaunch-name">{{$quiz->name}}</p>
                                            <p class="quizlaunch-desc">{{$quiz->description}}</p>
                                        </td>
                                        <td>{{ $quiz->created_at }} </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"> <h6>No Quiz Available</h6></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>
                    <input type="hidden" name="status" value="active">
                    <input type="hidden" name="type" value="quiz">
                    <input type="hidden" name="classroom_id" value="{{$classroom->id}}">
                    <div>
                        <a href="#" class="btn btn-link" data-toggle="collapse" data-target="#collapseQTwo" aria-expanded="true" aria-controls="collapseOne">  
                            <h5>Options</h5>      
                        </a>
                        <div id="collapseQTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionQuizLaunch">
                            <div class="form-group">
                                <label for="">Custom name</label>
                                <input type="text" id="duration" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Time limit in minute (use zero to disable time limit)</label>
                                <input type="text" id="duration" name="duration" value="0" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Max Attempts</label>
                                <input type="text" id="max_attempts" name="max_attempts" value="1" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary text-white">Next</button>
                </div>
            </div>
            
        </form>
    </div>
</div>