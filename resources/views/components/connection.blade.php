@props(['conn', 'status', 'type', 'alias'])

                        <li class="list-group-item">
                            <div class="row g-0 justify-content-between">
                                <div class="col">
                                    @if($status == 'active')
                                    <i class="bi bi-check-circle text-success" title="Status active"></i>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#message_{{$conn}}">
                                      <i class="bi bi-chat-right text-primary" title="Send message"></i></a>
                                      @if($type=='faber')
                                      <a href="" data-bs-toggle="modal" data-bs-target="#issue_{{$conn}}">
                                      <i class="bi bi-credit-card-2-front" title="Issue credential"></i></a>
                                      @endif


                                    @else
                                    <i class="bi bi-check-circle text-secondary"></i>
                                    <i class="bi bi-chat-right text-secondary"></i>

                                    @endif
                                    <i class="bi bi-info-circle text-primary" title="Alias: {{$alias}}"></i>
                                    <a href="{{route('connection.remove',['id'=>$conn,'agent'=>$type]) }}"><i class="bi bi-trash text-danger" title="Remove" ></i></a>
                                    {{ $conn }}


                                </div>
                                <div class="col-2">
                                ({{$status}})
                                </div>
                            </div>
                        </li>
