<div class="modal fade" id="modalFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" enctype="multipart/form-data" action="/activities">
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
                        <h5>Upload File</h5>      
                        <div>
                            <label for="">File</label>
                            <input type="file" name="file" id="">
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>    
                        <div>
                            <label for="">Label</label>
                            <input required name="file_name" class="form-control" type="text" id="">
                        </div>
                        <div>
                            <label for="">Description</label>
                            <textarea name="file_description" id="" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="active">
                    <input type="hidden" name="type" value="file">
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