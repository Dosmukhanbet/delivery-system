@extends('shopadmin.layout')


@section('content')
		<h3 class="title is-3">Все заявки</h3>
		<div class="orders">

			@if($orders->isNotEmpty())
				<ul>
					@foreach($orders as $order)
						<li>ID заявки {{$order->id}}. Дата/время создания {{ $order->created_at }}. Сумма с учетом доставки {{$order->total}}тг. <a href="orders/{{$order->id}}"> Детали заявки</a></li>
					@endforeach
				</ul>
			@else
				<p class="title is-5">У вас нет заявки</p>
			@endif
		</div>
		

@endsection