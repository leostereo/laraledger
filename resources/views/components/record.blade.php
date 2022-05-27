@props(['agent', 'state', 'record'])

                        <li class="list-group-item">
                            <div class="row g-0 justify-content-between">
                                <div class="col">


                                    @if( $state =='credential-received')
                                        <a href="{{route('credential.store',['id'=>$record])}}"><i class="bi bi-download text-secondary" title="Store credential"></i></a>
                                        
                                    @else
                                        <i class="bi bi-check-circle text-success" title="Status done"></i>

                                    @endif
                                    <i class="bi bi-info-circle text-primary" title=""></i>
                                    <a href="{{route('credential.remove',['id'=>$record,'agent'=>$agent]) }}"><i class="bi bi-trash text-danger" title="Remove" ></i></a>

                                    {{$record}}

                                </div>
                                <div class="col-3">
                                ({{$state}})
                                </div>
                            </div>
                        </li>
