	<div class="toast-container position-fixed top-0 end-0 p-3">
		<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<i class="bi bi-info-circle"></i>
				<strong class="me-auto">Ultima operacion:</strong>
				<small>1 sec ago</small>
			</div>
			<div class="toast-body {{ session('result') ? 'text-bg-success':'text-bg-danger' }} ">
				<strong>{{ session('message') }}</strong>
			</div>
		</div>
	</div>