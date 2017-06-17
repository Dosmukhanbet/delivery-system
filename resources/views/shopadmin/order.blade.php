@extends('shopadmin.layout')


@section('content')
		
					<h3 class="title is-3">ID заявки - #{{ $order->id }}</h3>
					<p class="subtitle is-5">Дата/время создания: {{ $order->created_at }}</p>
					<p class="subtitle is-5">Данные создателя заявки: <br>
											Имя {{ $order->user->name }} <br> 
											Мобильный номер {{ $order->user->mobile_number }} <br>
											Адрес доставки {{$order->delivery_address}}
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
							    		<td>{{$product->name}}</td>
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
				

@endsection