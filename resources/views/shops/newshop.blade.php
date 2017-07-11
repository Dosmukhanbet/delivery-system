<article class="media">
	<div class="media-left">
		<figure class="image is-128x128">
			<a href="{{ route('shop', [$city->slug, $shop->slug] )}}">
				<img src="/app/{{$shop->photo_path}}" alt="">
			</a>
		</figure>
	</div>
	<div class="media-content">
		<a href="{{ route('shop', [$city->slug, $shop->slug] )}}" class="shop_link">
				    	<p class="title is-5"><strong>{{$shop->brand_name}}</strong></p>
		</a>
		<hr>
		<div class="rest_info">	
					<p>
						<strong><small>Мин.заказ:</small></strong>
						<br> {{$shop->min_order}}тг.
					</p>
					<p>	
						<strong><small>Время доставки</small></strong>
						<br> До {{$shop->delivery_time}} мин.
					</p>
					<p>
						<strong><small>Время приема заказов</small></strong>
						<br> c {{$shop->open_time}} до {{ $shop->close_time }}
					</p>
		</div>	
			

	</div>
	<div class="media-right">
		<p class="delivery_rates">
					<strong><small>Доставка</small></strong>
					<br>
					<span class="rates_list">
						@foreach($shop->rates->sortBy('cost') as $rate)
						 	<small>{{$rate->district->name}} - 
								@if($rate->cost) 
									{{$rate->cost}}тг.
								@else
									<strong>БЕСПЛАТНО</strong>
								@endif
							</small>	
								<br>
						@endforeach
					</span>	
		</p>
	</div>
</article>




