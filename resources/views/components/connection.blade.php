@props(['conn' , 'status'])
                            <li class="list-group-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <i class="bi bi-chat-right text-primary"></i>
                            <a href="{{route('connection.remove',['id'=>$conn])}}"><i class="bi bi-trash text-danger"></i></a>
                            {{ $conn }}({{$status}})</li>
