@extends('layouts.app')

@section('content')
<div class="container mb-3">
	<div class="columns mt-2">
		<div class="column is-4">
			@include('shopadmin.forms.addproduct')
		</div>
	</div>
</div>	
@endsection
