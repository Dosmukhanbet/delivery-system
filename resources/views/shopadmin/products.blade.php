@extends('layouts.app')
@section('content')
<div class="columns mt-2">
	<div class="column is-9 is-offset-1">
			@if($products->isNotEmpty())
					@foreach($products->chunk(6) as $chunk)
							<div class="columns">
								@foreach($chunk as $product)
									<div class="column is-2">
										<div class="card" style="padding-bottom:1rem;">
											<div class="card-image">
												<figure class="image is-1by1">
													<img src="/app/{{$product->photo_path}}" alt="">
												</figure>
											</div>
											<div class="card content" style="padding-bottom:0.5rem;">
											
												<p><small>Категория: {{$product->productCategory->name}}</small>
												<br><small>Название: {{$product->name}}</small>
												<br><small>Описание: {{$product->description}}</small>
												<br><small>Цена: {{$product->price}} тг.</small>
												<br><small>Ед.измерения: {{$product->unit->name}}</small></p>
												<p>
													<update-product :prod="{{$product}}" :units="{{$units}}"></update-product>
												</p>
												<div>

													<activate-product :active="{{ $product->is_active }}" :productid="{{ $product->id }}"></activate-product>
											  </div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
					@endforeach	
			@else
				<p>У вас нет ни одного продукта</p>
			@endif
	</div>
</div>
@endsection