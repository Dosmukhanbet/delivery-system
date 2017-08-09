<ul class="notification is-warning mt-1">
	@foreach($cities as $city)
		<li class="tag is-dark">{{$city->name}}</li>	
	@endforeach
</ul>