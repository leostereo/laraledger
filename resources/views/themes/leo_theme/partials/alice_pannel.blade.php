<div class="flex flex-col justify-start flex-1 mb-5 overflow-hidden bg-white border rounded-lg lg:mr-3 lg:mb-0 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-3 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
					<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
					<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
					</svg>
				</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
	                    ALICE
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
	                    The Holder
	                </p>
					
				</div>
	        </div>

	        <div class="flex flex-wrap items-center justify-between p-3 px-3 bg-white border-b border-gray-150 sm:flex-no-wrap">

			<div class="card w-100" >
					<div class="card-header">
						Records
					</div>
					<ul class="list-group list-group-flush">
						@foreach($data['alice']['records'] as $record)
								<x-record
								agent="alice"
								:state="$record['cred_ex_record']['state']"
								:record="$record['cred_ex_record']['cred_ex_id']"/>
								
								
						@endforeach	
					</ul>
				</div>

				<div class="card w-100 mt-3" >
					<div class="card-header">
						Connections
					</div>
					<ul class="list-group list-group-flush">
						@foreach($data['alice']['connections']['results'] as $connection)
								<x-connection type="alice"
								 
								:status="$connection['state']"								 
								:conn="$connection['connection_id']"
								:alias="$connection['alias']??'no alias'"/>	
								
								<x-message_modal :conn="$connection['connection_id']" agent="alice"/>

						@endforeach	
					</ul>
				</div>


				@if(session('invite_str'))
				<div class="card  mt-3 w-100">
					<div class="card-header">
						Recibe invitation
					</div>
					<div class="p-3">
					<form action="{{route('connection.invitation_receive')}}" method="post">
						{{ csrf_field() }}
						<input type="text" hidden class="form-control" name="agent" value="alice">

							<div class="row">
								<div class="col">
										<label for="exampleFormControlTextarea1" class="form-label">Invitation data</label>
										<textarea  class="form-control" name="invitation_data" rows="3">{{session('invite_str')}}</textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-primary mt-3">Receive</button>
						</form>
					</div>
				</div>
				@endif				
				@if(session('invite_confirm'))
				<div class="card  mt-3 w-100">
					<div class="card-header">
						Accept invitation
					</div>
					<div class="p-3">
						<form action="{{route('connection.invitation_accept')}}" method="post">
						{{ csrf_field() }}

							<div class="row">
								<div class="col">
									<label for="exampleFormControlInput1" class="form-label">Connection ID</label>
									<input type="text" readonly class="form-control" name="conn_id" value="{{session('invite_confirm')}}">
									<input type="text" hidden class="form-control" name="agent" value="alice">

								</div>
							</div>
							<button type="submit" class="btn btn-primary mt-3">Accept</button>
						</form>
					</div>
				</div>
				@endif


	        </div>
		</div>