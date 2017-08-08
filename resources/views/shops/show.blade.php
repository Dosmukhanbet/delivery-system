@extends('layouts.app')
@section('title')
    {{ $shop->brand_name }} - {{ $shop->description }}
@endsection
@section('content')
        <section class="hero is-info">
          <div class="hero-body">
            <div class="container">
             <div class="columns">
             	<div class="column is-8 is-offset-2 shop">
             		<div class="shop">
        					@include('shops.info', [ 'feedbacks' => null])
                    </div>
             	</div>
             </div>
             
              
            </div>
          </div>
        </section>
        <div class="container mt-2 cart_products">
        	<div class="columns">
        					@include('products.index')
             </div>
        </div>

    

@endsection