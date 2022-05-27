	<div class="row mt-5">
		<div class="col-2"></div>
		<div class="col">
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-2"></div>
	</div>