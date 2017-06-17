@extends('shopadmin.layout')


@section('content')
	@if($products->isNotEmpty())
			@foreach($products->chunk(4) as $chunk)
					<div class="columns">
						@foreach($chunk as $product)
							<div class="column is-3">
								<div class="card">
									<div class="card-image">
										<figure class="image is-1by1">
											<img src="/app/{{$product->photo_path}}" alt="">
										</figure>
									</div>
									<div class="card content">
									
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
@endsection