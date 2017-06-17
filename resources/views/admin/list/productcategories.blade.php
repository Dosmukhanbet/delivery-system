<ul>
	@foreach($productcategories as $category)
		<li>{{$category->name}}</li>	
	@endforeach
</ul>