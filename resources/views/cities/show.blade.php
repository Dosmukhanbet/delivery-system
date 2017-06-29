@extends('layouts.app')

@section('content')
		<section class="hero is-medium is-primary">
			  <div class="hero-body">
			    <div class="container has-text-centered">
			      <h1 class="title is-1">
			        Здесь должен быть слайдер
			      </h1>
			      <h2 class="subtitle is-3">
			        автоматический прокручивающийся
			      </h2>
			    </div>
			  </div>
		</section>
 		<div class="container mt-2">
	 			@foreach($groups as $group)
							    <div class="groupnames  has-text-centered">
							  		<p class="button is-outlined is-danger">
							  			{{$group->name}}
							  		</p>
							  	</div>
							  	<div class="mt-2">
									@foreach($group->shopCategories->chunk(3) as $chunk)
										<div class="columns">
											@foreach ($chunk as $category)
											        <div class="column is-4 b-1 has-text-centered">
											            <h4 class="title is-3">
											                <a href="{{ route('shops', [$city->slug,$category->slug] )}}">
											                    {{ $category->name }}
											                </a>
											            </h4>
											        </div>
											@endforeach
										</div>
									@endforeach
								</div>	 
	 			@endforeach
 		</div>

@endsection