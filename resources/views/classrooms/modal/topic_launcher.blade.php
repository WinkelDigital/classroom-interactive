<div class="modal fade" id="modalTopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/activities">
             {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Launch Topic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div>
                        <h5>Choose Topic</h5>      
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10%"></th>
                                        <th style="width: 70%">Name</th>
                                        <th style="width: 20%">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topics as $topic)
                                    <tr>
                                        <td>
                                            <input type="radio" name="rel_id" value="{{$topic->id}}">
                                        </td>
                                        <td>
                                            <p class="topiclaunch-name">{{$topic->name}}</p>
                                            <p class="topiclaunch-desc">{{$topic->created_at}}</p>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>
                    <input type="hidden" name="status" value="active">
                    <input type="hidden" name="type" value="topic">
                    <input type="hidden" name="classroom_id" value="{{$classroom->id}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
            
        </form>
    </div>
</div>