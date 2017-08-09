@extends('layouts.app')

@section('content')
	<div class="container mb-2">
		<div class="columns mt-2 ">
			<div class="column">
				<h3 class="subtitle is-5">Имя: {{ $user->name}}</h3>
				<h3 class="subtitle is-5">Мобильный номер: {{ $user->mobile_number}}</h3>

			</div>
		</div>
	</div>
@endsection