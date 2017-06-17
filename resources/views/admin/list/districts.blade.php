<ul>
{{-- {{dd($districts->groupBy('city_id'))}} --}}
	@foreach($districts->groupBy('city_id') as $district)
		<li>{{ $district[0]->city->name}}</li>
			<ul class="ml-2">
				@foreach($district as $ds)
					<li><small>{{$ds->name}}</small></li>
				@endforeach	
			</ul>	
	@endforeach
</ul>