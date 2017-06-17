<ul>
{{-- {{dd($districts->groupBy('city_id'))}} --}}
	@foreach($shopcategories->groupBy('group_id') as $category)
		<li>{{ $category[0]->group->name}}</li>
			<ul class="ml-2">
				@foreach($category as $c)
					<li><small>{{$c->name}}</small></li>
				@endforeach	
			</ul>	
	@endforeach
</ul>