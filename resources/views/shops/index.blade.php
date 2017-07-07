@extends('layouts.app')
@section('title')
	Все заведение вашего города
@endsection

@section('content')
		<section class="hero is-success is-hidden-mobile">
		  <div class="hero-body">
		    <div class="container">
		      <h1 class="title is-spaced">
		        {{ $category->name }}
		      </h1>
		      <h2 class="subtitle">
					Название гамбургера изначально происходит от названия второго по величине города Германии — Гамбурга[1], откуда многие эмигрировали в Америку. <br>
					В немецком языке слово «гамбургер» может быть описательным существительного, то есть обозначать кого-то из Гамбурга или прилагательным, описывающим что-то из Гамбурга.      
		        </h2>
		    </div>
		  </div>
		</section>
 		<div class="container">
 			<div class="columns">
 				<div class="column is-8 mt-2 shops">
		 			@foreach($shops as $shop)
								<div class="box shop">
											@include('shops.shop')
								</div>
		 			@endforeach
		 			{{ $shops->links()}}
		 		</div>
		 		<{{-- div class="column mt-2 is-4">
		 			<h3 class="title is-5">
		 				Отзывы
		 			</h3>
		 		</div>	 --}}
	 		</div>
 		</div>

@endsection