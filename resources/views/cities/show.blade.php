@extends('layouts.app')
@section('title')
	Экспресс доставка. По городу бесплатно.
@endsection

@section('content')
		<section class="hero is-dark">
		 	<div class="hero-body">
			    <div class="container has-text-centered">
			      <h1 class="title is-1">
			        Здесь должен быть слайдер
			      </h1>
			      <h2 class="subtitle is-3">
			        или видеоролик
			      </h2>
			    </div>
			</div>
		</section>
 		<div class="container mt-2">
	 			@foreach($groups as $group)
							    <div class="groupnames  has-text-centered">
							  		<p class="title is-4">
							  			{{-- {{$group->name}}  --}}
							  			Выберите категорию
							  		</p>
							  	</div>
							  	<div class="mt-2">
									@foreach($group->shopCategories->chunk(3) as $chunk)
										<div class="columns">
											@foreach ($chunk as $category) 
													<div class="column is-4 has-text-centered">
											    
											        	<a href="{{ route('shops', [$city->slug,$category->slug] )}}">
											        		<div class="cat_block">
												            	<figure class="image is-3by2">
																	<img class="category_image" src="/app/{{$category->photo_path}}" alt="">
																</figure>
																<p class="cat_block_text title is-3">
													                    {{ $category->name }}
													           	</p>
													           	<figure class="cat_block_icon image is-48x48">
													           			<img src="/app/{{$category->thumbnail_path}}" alt="">
													           	</figure>
													        </div>	   	
												        </a>
														
											        </div>
											@endforeach
										</div>
									@endforeach
								</div>	 
	 			@endforeach
 		</div>
 		<section class="hero is-info mt-2">
          <div class="hero-body">
            <div class="container">
             <div class="columns">
             	<div class="column is-12">             	
             		<h3 class="title is-1 is-spaced has-text-centered">Как сделать заказ?</h3>
             	</div>
             </div>
             <div class="columns">
             	 <div class="column is-4">
                    <h3 class="title is-1 has-text-centered">1. Выберите понравившиеся вам заведение</h3>
                </div>
                <div class="column is-4">
                     <h3 class="title is-1 has-text-centered">2. </h3>
                </div>
                <div class="column is-4">
                    <h3 class="title is-1 has-text-centered">3</h3>
                </div>
             </div>
            </div>
          </div>
        </section>
        <div class="container mt-2">
        	<div class="columns">
        		<div class="column is-12">
        			<h3 class="title is-1 has-text-centered">Почему заказывать через наш сервис удобно?</h3>
        		</div>
        	</div>
        	<div class="columns">
        		<div class="column is-4 has-text-centered">
        			<h3 class="title is-4">
        				1. У нас собраны все заведения вашего города, вам не придется искать в интернете
        			</h3>
        		</div>
        		<div class="column is-4 has-text-centered">
        			<h3 class="title is-4">2. </h3>
        		</div>
        		<div class="column is-4 has-text-centered">
        			<h3 class="title is-4">3</h3>
        		</div>
        	</div>
        </div>

        
     


@endsection