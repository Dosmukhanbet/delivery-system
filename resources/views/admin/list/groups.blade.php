<ul class="notification is-warning mt-1">
	@foreach($groups as $group)
		<li class="tag is-dark">{{$group->name}}</li>	
	@endforeach
</ul>