
<div class="modal fade" id="message_{{$conn}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card  mt-3 w-100">
                        <div class="card-header">
                            To: {{$conn}}
                        </div>
                        <div class="p-3">
                        <form action="{{route('message.send')}}" method="post">
                            {{ csrf_field() }}
                            <input type="text" hidden class="form-control" name="agent" value="{{$agent}}">
                            <input type="text" hidden class="form-control" name="connection_id" value="{{$conn}}">

                                <div class="row">
                                    <div class="col">
                                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                            <textarea  class="form-control" name="message" rows="3"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Send</button>
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
