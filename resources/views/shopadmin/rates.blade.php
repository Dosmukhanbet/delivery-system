@extends('shopadmin.layout')

@section('content')
	
	
	<div class="columns">
		<div class="column is-3">
			<p class="title is-4">Установите цену на доставку по районам</p>
			@include('shopadmin.forms.addrate')
		</div>
		<div class="column is-offset-1 is-5">
			<p class="title is-4">Мой тарифы на доставку</p>
			<ul>
				@foreach($rates as $rate)
						<li>{{$rate->district->name}} - {{ $rate->cost}}тг.</li>
				@endforeach
			</ul>
		</div>
	</div>
	
@endsection