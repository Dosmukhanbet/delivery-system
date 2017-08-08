@extends('layouts.app')
@section('title')
	Экспресс доставка еды. По городу бесплатно.
@endsection
@section('styles')
	<link rel="stylesheet" href="/css/owl.carousel.min.css" >
	<link rel="stylesheet" href="/css/owl.theme.default.min.css" >
@endsection


@section('content')
		@include('cities.partials.a-intro')
	 	@include('cities.partials.b-categories')
 		@include('cities.partials.c-instructions')
 		@include('cities.partials.d-why_us')
@endsection
@section('js')
	<script  src="/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function() {
		  $("#owl-demo").owlCarousel({
		      autoplay: true,
		      autoplayTimeout: 4000,
		      loop:true,		 
		      items : 1
		  });
		 
		});
	</script>
@endsection