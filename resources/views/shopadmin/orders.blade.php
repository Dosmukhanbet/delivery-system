@extends('layouts.app')


@section('content')
<div class="container  mb-2">
	<div class="columns mt-2">
		<div class="column is-6">
		<h3 class="title is-3">Все заявки</h3>
		<div class="orders  has-text-centered">
			@if($orders->isNotEmpty())
				<table class="table is-striped">
					 <thead>
					    <tr>
					      <th>ID заявки </th>
					      <th>Дата/время создания </th>
					      <th>Сумма с учетом доставки </th>
					      <th></th>
					    </tr>
					  </thead>
					@foreach($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>{{ $order->created_at }}</td>
							<td>{{$order->total}}тг.</td>
							<td>
								<a href="orders/{{$order->id}}">
									Посмотреть...
								</a>
							</td>
						</tr>
					@endforeach
				</table>
			@else
				<p class="title is-5">У вас нет заявки</p>
			@endif
		</div>
		</div>
	</div>
</div>
@endsection