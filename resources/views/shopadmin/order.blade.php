@extends('layouts.app')
@section('content')
<div class="container  mb-2">
		<div class="columns mt-2">
			<div class="column is-6">
					<h3 class="title is-3">ID заявки - #{{ $order->id }}</h3>
					<p class="subtitle is-5">Дата/время создания: {{ $order->created_at }}</p>
					<p class="subtitle is-6">Заказчик<br>
											<strong>Имя</strong> {{ $order->user->name }} <br> 
											<strong>Мобильный номер</strong> {{ $order->user->mobile_number }} <br>
											<strong>Адрес доставки</strong> {{$order->delivery_address}}
					</p>
					<div class="order">
						<table class="table is-bordered">
							 <thead>
							    <tr>
							      	<th>Наименование</th>
								    <th>Цена</th>
								    <th>Количество</th>
								    <th>Ед.измер.</th>
							    </tr>
							  </thead>
							  @foreach($order->products as $product)
							    	<tr>

							    		<td class="is-flex"><span class="mr-2">{{$product->name}}</span>
							    		<figure class="image is-48x48">
											<img src="/app/{{$product->photo_path}}" alt="">
										</figure>
										</td>
							    		<td>{{$product->price}}тг.</td>
							    		<td>{{$product->pivot->quantity}}</td>
							    		<td>{{$product->unit->name}}</td>
							    	</tr>
							    @endforeach
							    <tr>
							    	    <td><strong>Итого к оплате с учетом доставки {{$order->total}}тг.</strong></td>
							    		<td>Оплата за доставку {{ $order->delivery_cost }}тг.</td>
							    		<td></td>
							    		<td></td>
							    </tr>
						</table>
					</div>

					</div>
		</div>
</div>			
@endsection