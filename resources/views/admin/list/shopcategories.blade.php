<ul class="notification is-warning mt-1">
{{-- {{dd($districts->groupBy('city_id'))}} --}}
	@foreach($shopcategories->groupBy('group_id') as $category)
		<li class="tag is-info is-medium mb-1">{{ $category[0]->group->name}}</li>
			<div class="tags">				
				@foreach($category as $c)
					<span class="tag is-dark">{{$c->name}}</span>
				@endforeach	
			</div>
	@endforeach
</ul>