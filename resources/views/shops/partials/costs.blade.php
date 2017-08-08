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