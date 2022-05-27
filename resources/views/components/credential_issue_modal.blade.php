
<div class="modal fade" id="issue_{{$conn}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Issue credential</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card  mt-3 w-100">
                        <div class="card-header">
                            To: {{$conn}}
                        </div>
                        <div class="p-3">
                        <form action="{{route('credential.issue')}}" method="post">
                            {{ csrf_field() }}
                            <input type="text" hidden class="form-control" name="agent" value="{{$agent}}">
                            <input type="text" hidden class="form-control" name="connection_id" value="{{$conn}}">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="degree" class="form-label">Degree</label>
                                    <input type="text" class="form-control" name="degree" id="degree">
                                </div>


                                <button type="submit" class="btn btn-primary mt-3">Issue</button>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>	
