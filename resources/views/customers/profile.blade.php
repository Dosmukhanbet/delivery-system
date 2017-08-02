@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="columns mt-2">
			<div class="column">
				<h3 class="title is-5">Имя: {{ $user->name}}</h3>
			</div>
		</div>
	</div>
@endsection