<div class="tags notification is-warning mt-1">
	@foreach($productcategories as $category)
		<span class="tag is-dark">{{$category->name}}</span>
	@endforeach
</div>