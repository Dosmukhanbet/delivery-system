<ul class="notification is-warning mt-1">
{{-- {{dd($districts->groupBy('city_id'))}} --}}
	@foreach($districts->groupBy('city_id') as $district)
		<li class="tag is-info is-medium mb-1">{{ $district[0]->city->name}}</li>
			<div class="tags">
				@foreach($district as $ds)
					<span class="tag is-dark">{{$ds->name}}</span>
				@endforeach
			<div class="tags">		
	@endforeach
</ul>