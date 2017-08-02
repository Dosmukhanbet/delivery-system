@extends('layouts.app')
@section('content')
		<div class="container">
			<div class="columns mt-2">
				<div class="column is-9">
					<h3 class="title is-5">Мои заказы</h3>
					<table class="table is-striped is-bordered">
					 <thead>
					    <tr>
					      <th>ID  </th>
					      <th>Дата/время <br> заказа </th>
					      <th>Сумма</th>
					      <th>Цена доставки</th>
					      <th>Детали заказа</th>
					      <th>Продавец <br> Бренд</th>
					      <th>Отзывы</th>
					    </tr>
					  </thead>
					@foreach($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>{{ $order->created_at->diffForHumans() }}</td>
							<td>{{$order->total}}тг.</td>
							<td>{{$order->delivery_cost}}тг.</td>
							<td>
								<ul>
									@foreach($order->items as $item)
											<li>
												<small>
													{{ $item->product->name }} - {{ $item->quantity }} {{ $item->product->unit->short_name}} | {{ $item->product->price*$item->quantity}}тг.
												</small>
											</li>
									@endforeach
								</ul>
							</td>
							<td>{{ $order->shop->name}} | {{ $order->shop->brand_name}}</td>
							<td>
								@if(count($order->feedback))
									{{$order->feedback->body}}
								@else
									<leave-feedback 
											:order="{{$order->id}}" 
											:customer="{{ auth()->user()->customer->id }}" 
											:shop="{{$order->shop->id}}" >
									</leave-feedback>
								@endif

								
							</td>
						</tr>
					@endforeach
				</table>
				</div>
			</div>
		</div>

@endsection