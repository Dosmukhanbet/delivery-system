@extends('layouts.app')
@section('title')
	Все заведение вашего города
@endsection

@section('content')
		<section class="hero is-info is-blue">
		  <div class="hero-body">
		    <div class="container">
		    	<h2 class="title is-4 marmelad ">
				     <strong>@include('shops.partials.breadcrumb')</strong>        
				</h2>
		    </div>
		  </div>
		</section>
 		<div class="container">
 			<div class="columns">
 				<div class="column is-7 mt-2 shops">
		 			@foreach($shops as $shop)
								<div class="box shop">
											@include('shops.newshop')
								</div>
		 			@endforeach
		 			{{ $shops->links()}}
		 		</div>
		 		 {{-- div class="column mt-2 is-4">
		 			<h3 class="title is-5">
		 				Отзывы
		 			</h3>
		 		</div>	 --}}
	 		</div>
 		</div>

@endsection