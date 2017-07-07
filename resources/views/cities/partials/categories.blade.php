<div class="container mt-2">
	@foreach($groups as $group)
		<div class="groupnames  has-text-centered">
			<p class="title is-4 marmelad">
				Выберите категорию
			</p>
		</div>
		<div class="mt-2">
			@foreach($group->shopCategories->chunk(3) as $chunk)
				<div class="columns">
						@foreach ($chunk as $category) 
							<div class="column is-4 has-text-centered">
								<a href="{{ route('shops', [$city->slug,$category->slug] )}}">
									<div class="cat_block">
										<div class="gradient"></div>
										<img class="category_image" src="/app/{{$category->photo_path}}" alt="{{ $category->name }}">
										<p class="cat_block_text title is-3">
											{{ $category->name }}
										</p>
										<figure class="cat_block_icon image is-64x64">
											<img src="/app/{{$category->thumbnail_path}}" alt="">
										</figure>
									</div>	   	
								 </a>
							</div>
						@endforeach
					</div>
			@endforeach
		</div>	 
	@endforeach
</div>