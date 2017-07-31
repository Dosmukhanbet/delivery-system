<div class="column is-3">
		<ul>
		<cart 
				:minorder="{{$shop->min_order}}" 
				:city="{{$city}}" 
				:shop="{{$shop}}">
		</cart>
			{{-- @foreach($groupedproducts as $product)
					<li><p class="title is-5">{{ $product[0]->productCategory->name}}</p></li>

			@endforeach --}}
		</ul>
</div>
<div class="column is-9">
	{{-- {{ dd($products) }} --}}
	@foreach($products->where('is_active', 1)->chunk(4) as $chunked)
		<div class="columns">
			@foreach($chunked as $product)
				<div class="column is-3">
					<product :product="{{$product}}"></product>
				</div>
			@endforeach
		</div>
	@endforeach
</div>
@section('map')
	  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
@endsection


{{-- <div class="column is-10">
	<ul class="has-columns">
			@foreach($products as $product)
				<li>
					<product :product="{{$product}}"></product>
				</li>
			@endforeach
	</ul>	
</div> --}}