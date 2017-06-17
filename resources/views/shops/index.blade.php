@extends('layouts.app')
@section('title')
	Все заведение вашего города
@endsection

@section('content')
		<section class="hero is-info">
		  <div class="hero-body">
		    <div class="container">
		      <h1 class="title">
		        Primary title
		      </h1>
		      <h2 class="subtitle">

		        Primary subtitle		      </h2>
		    </div>
		  </div>
		</section>
 		<div class="container">
 			<div class="columns">
 				<div class="column is-8 mt-2">
		 			@foreach($shops as $shop)
								<div class="box shop">
											@include('shops.shop')
								</div>
		 			@endforeach
		 			{{ $shops->links()}}
		 		</div>	
	 		</div>
 		</div>

@endsection