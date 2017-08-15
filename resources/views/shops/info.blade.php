<div class="columns">
	<div class="column is-3">
		<figure class="media-left image is-128x128 mr-2 b-3">
			<a href="{{ route('shop', [$city->slug, $shop->slug] )}}">
				<img src="/app/{{$shop->photo_path}}" alt="">
			</a>
		</figure>
	</div>
	<div class="column is-9">
		<div class="shop_info">
	<div class="level">
		<div class="level-left">
			<a href="{{ route('shop', [$city->slug, $shop->slug] )}} ">
		    	<p class="title is-5 text-white"><strong>{{$shop->brand_name}}</strong></p>
			</a>
		</div>

	</div>
	<hr>
    <div class="is-flex shop_terms">
		<p>
			<strong><small>Мин.заказ:</small></strong>
			<br> {{$shop->min_order}}тг.
		</p>	
		<p>	
			<strong><small>Время доставки</small></strong>
			<br> До {{$shop->delivery_time}} мин.
		</p>	
		<p>
			<strong><small>Доставка</small></strong>
			<br>
			<span class="rates_list">
				@foreach($shop->rates->sortBy('cost') as $rate)
				 	{{$rate->district->name}} - 
						@if($rate->cost) 
							{{$rate->cost}}тг.
						@else
							<strong>БЕСПЛАТНО</strong>
						@endif
						<br>
				@endforeach
			</span>	
		</p>
		<p>
			<strong><small>Время приема заказов</small></strong>
			<br> c {{$shop->open_time}} до {{ $shop->close_time }}
		</p>
	</div>
</div>	
	</div>
</div>

