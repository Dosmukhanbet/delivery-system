@extends('layouts.app')

@section('content')
 		<section class="hero is-success">
		  <div class="hero-body">
		    <div class="container">
		    <div class="level">
		    	<div class="level-item">
		    		 <figure class="image is-96x96">
		    		<img src="/app/buildings-png/002-restaurant-2.png" alt="">
		    	  </figure>
		    	  <h1 class="title ml-2 has-text-centered">
		    	  	
		    	  	<span class="text-orange">
		    	  	<strong>
			         	Информация для ресторанов <br> и заведении
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
			<div class="level">
					<div class="level-item has-text-centered">
						 <h2 class="title">
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
							<h3 class="title is-4">
								Вы получите новых клиентов
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked.png">
							</figure>
							<h3 class="title is-4">
								Готовая и Удобная система <br> для управления заказами
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked.png">
							</figure>
							<h3 class="title is-4">
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
							<h3 class="title is-4">
								Отсутствие затрат на рекламу 
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked2.png">
							</figure>
							<h3 class="title is-4">
								Вы сэкономите на разработке <br> сайта и приложения
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked2.png">
							</figure>
							<h3 class="title is-4">
								Вам не нужно уведомлять клиентов <br> о новых акциях,скидках
							</h3>
						</li>
					</ul>
					
				</div>
			</div>
			<div class="level">
					<div class="level-item has-text-centered">
						 <h2 class="title">
					        Чтобы подключить к системе свое заведение <br>
					         просто позвоните по номеру +7 (707) 883-59-53
					      </h2>
					</div>
			</div>
		</div>
@endsection