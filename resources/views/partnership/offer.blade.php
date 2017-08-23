@extends('layouts.app')
@section('title')
	Сотрудничество с ZAKAZ.EXPRESS
@endsection
@section('content')
 		<section class="hero is-info">
		  <div class="hero-body">
		    <div class="container">
		    <div class="level">
		    	<div class="level-item ">
		    		{{-- <div class="offer_images is-hidden-mobile">
			    	  <figure class="image is-64x64 mr-1">
			    		<img src="/app/buildings-png/002-restaurant-2.png" alt="">
			    	  </figure>
			    	  <figure class="image is-64x64 mr-1">
			    		<img src="/app/buildings-png/013-food.png" alt="">
			    	  </figure>
			    	  <figure class="image is-64x64 mr-1">
			    		<img src="/app/buildings-png/009-food-4.png" alt="">
			    	  </figure>
			    	</div>   --}}
		    	  <h1 class="subtitle is-4 ml-2 has-text-centered">
		    	  	
		    	  	<span class="text-warning marmelad">
		    	  	<strong>
			         	Информация для ресторанов  и фаст-фуд заведении
			         	 </strong> 
			        </span> 	
			       
			      </h1>
		    	</div>
		    {{-- 	<div class="level-item has-text-centered">
		    		<h1 class="title">
			         Информация для ресторанов и заведении
			      </h1>
		    	</div> --}}
		    </div>
		    </div>
		  </div>
		</section>
		<div class="container marmelad mt-2 mb-6">
			{{-- <div class="switch is-rounded is-success">
			  <input id="yes-no" type="checkbox" name="exampleSwitch">
			  <label for="yes-no">Доставлено / НЕ доставлено</label>
			</div> --}}
			<div class="level">
					<div class="level-item has-text-centered">
						 <h2 class="subtitle is-3">
					        Почему содрудничать с нами выгодно?
					      </h2>
					</div>
			</div>
			<div class="columns">
				<div class="column is-6 mt-2">
					<ul class="benefits">
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked.png">
							</figure>
							<h3 class="subtitle is-4">
								Вы получите новых клиентов
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked.png">
							</figure>
							<h3 class="subtitle is-4">
								Готовая и Удобная система <br> для управления заказами
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked.png">
							</figure>
							<h3 class="subtitle is-4">
								Вы можете указать цены на доставку<br>
								в отдаленные районы города
							</h3>
						</li>
					</ul>
				</div>

				<div class="column is-6 mt-2">
					<ul class="benefits">
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked2.png">
							</figure>
							<h3 class="subtitle is-4">
								Вы сэкономите на рекламе 
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked2.png">
							</figure>
							<h3 class="subtitle is-4">
								Вы сэкономите на разработке <br> сайта и приложения
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked2.png">
							</figure>
							<h3 class="subtitle is-4">
								Вам не нужно уведомлять клиентов <br> о новых акциях,скидках
							</h3>
						</li>
					</ul>
					
				</div>
			</div>
			<div class="level">
					<div class="level-item">
						<partnership-request></partnership-request>
						{{--  <h2 class="subtitle">
					        Чтобы подключить к системе свое заведение <br>
					         просто позвоните по номеру +7 (707) 883-59-53
					      </h2> --}}
					</div>
			</div>
		</div>
@endsection