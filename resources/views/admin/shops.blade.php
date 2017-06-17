@extends('admin.layout')

@section('content')
			<div class="columns">
				<div class="column is-12">
					@include('admin.forms.createshop')	
				</div>			
			</div>	
			<hr>
			@foreach($shops->chunk(3) as $chunk)
				<div class="columns">
					@foreach($chunk as $shopgroup)
						<div class="column is-4">
							<h4 class="title is-4">{{$shopgroup[0]->city->name}}</h4>
							<ul>
								@foreach($shopgroup as $shop)
									<li class="box">
										<p>{{$shop->name}} / {{$shop->brand_name}}</p>
										<p><small>Количество всего заказов: {{$shop->orders->count()}}</small></p>
										<p><small>Мин.заказ.: {{$shop->min_order}}тг. </small></p>
										<p><small>Время доставки:{{$shop->delivery_time}} мин.</small></p>
										<p><small>Время приема заказов: {{$shop->open_time}}-{{$shop->close_time}}</small></p>
										<p><small>Зарегистрировано: {{$shop->created_at->toDateString() }} </small></p>
									</li>
								@endforeach
							</ul>
						</div>
					@endforeach
				</div>
			@endforeach
			
@endsection