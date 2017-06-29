@extends('layouts.app')
@section('title')
	Экспресс доставка. По городу бесплатно.
@endsection
@section('styles')
	<link rel="stylesheet" href="/css/owl.carousel.min.css" >
	<link rel="stylesheet" href="/css/owl.theme.default.min.css" >
@endsection


@section('content')
		@include('cities.partials.intro')
	 	@include('cities.partials.categories')
 		@include('cities.partials.instructions')
 		@include('cities.partials.why_us')
@endsection
@section('js')
	<script  src="/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function() {
		  $("#owl-demo").owlCarousel({
		      autoplay: true,
		      autoplayTimeout: 3000,
		      loop:true,		 
		      items : 1
		  });
		 
		});
	</script>
@endsection