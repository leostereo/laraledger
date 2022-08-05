<div class="flex flex-col justify-start flex-1 mb-5 overflow-hidden bg-white border rounded-lg lg:mr-3 lg:mb-0 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-3 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
  					<path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
					</svg>
				</div>
				<div class="relative flex-1">
					<div class="row">
						<div class="col">
							<h3 class="text-lg font-medium leading-6 text-gray-700">
								FABER
							</h3>
							<p class="text-sm leading-5 text-gray-500 mt">
								The issuer
							</p>
						</div>

						<div class="col-10">
							<label for="exampleFormControlInput1" class="form-label">DID</label>
							<input type="text" class="form-control" name="did"  
							value="{{$data['faber']['public_did']['did'].' ('.$data['faber']['public_did']['method'].')'}}">
						</div>


					</div>

					
				</div>
	        </div>

	        <div class="flex flex-wrap items-center justify-between p-3 px-3 bg-white border-b border-gray-150 sm:flex-no-wrap">


				<div class="card mt-3 w-100" >
					<div class="card-header">
						Connections
					</div>
					<ul class="list-group list-group-flush">
						@foreach($data['faber']['connections']['results'] as $connection)
						<x-connection type="faber"
								 
								:status="$connection['state']"								 
								:conn="$connection['connection_id']"
								:alias="$connection['alias']??'no alias'"/>	
								 
								 <x-message_modal :conn="$connection['connection_id']" agent="faber"/>
								
								@if($connection['state'] == 'active')
								 	<x-credential_issue_modal :conn="$connection['connection_id']" agent="faber"/>
								@endif

						@endforeach	
					</ul>
				</div>

				<div class="card  mt-3 w-100">
					<div class="card-header">
						Create invitation
					</div>
					<div class="p-3">
						<form action="{{route('connection.invitation_create')}}" method="post">
						{{ csrf_field() }}

							<div class="row">
								<div class="col">
									<label for="exampleFormControlInput1" class="form-label">Alias</label>
									<input type="text" class="form-control" name="alias" placeholder="invite for Alice">
									<input type="text" hidden class="form-control" name="agent" value="faber">

								</div>
								<div class="col">
									@if(session('invite_str'))
										<label for="exampleFormControlTextarea1" class="form-label">Invitation data</label>
										<textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{session('invite_str')}}</textarea>
									@endif
								</div>
							</div>
							<button type="submit" class="btn btn-primary mt-3">Create</button>
						</form>
					</div>
				</div>

				@if(session('request_accept'))
				<div class="card  mt-3 w-100">
					<div class="card-header">
						Accept invitation
					</div>
					<div class="p-3">
						<form action="{{route('connection.request_accept')}}" method="post">
						{{ csrf_field() }}

							<div class="row">
								<div class="col">
									<label for="exampleFormControlInput1" class="form-label">Connection ID</label>
									<input type="text" class="form-control" name="conn_id" value="">
									<input type="text" hidden class="form-control" name="agent" value="faber">

								</div>
							</div>
							<button type="submit" class="btn btn-primary mt-3">Accept request</button>
						</form>
					</div>
				</div>
				@endif

	        </div>
		</div>