@extends('layouts.app')
@section('title')
	Экспресс доставка. По городу бесплатно.
@endsection

@section('content')
		@include('cities.partials.intro')
	 	@include('cities.partials.categories')
 		@include('cities.partials.instructions')
 		@include('cities.partials.why_us')
@endsection