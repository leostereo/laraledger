@extends('theme::layouts.app')

@section('content')


	@if ($errors->any())
	@include('theme::partials.formerror')
	@endif

	@if(session('last_op'))
		@include('theme::partials.opertoast')
	@endif

	<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">

		@include('theme::partials.faber_pannel')

		@include('theme::partials.alice_pannel')

	</div>

@endsection
