@extends('layouts.app')

@section('content')
 		<section class="hero is-primary">
		  <div class="hero-body">
		    <div class="container has-text-centered">
			      <h1 class="title">
			         Информация для ресторанов и заведении
			      </h1>
			      
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
								Удобная система управления заказами
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked.png">
							</figure>
							<h3 class="title is-4">
								Клиенты узнают о ваших акциях<br> сразу же как только вы обьявите об этом
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
								Вам не нужно тратить деньги на рекламу 
							</h3>
						</li>
						<li class="is-flex">
							<figure class="image is-32x32 mr-2">
							  <img src="/app/partnership/checked2.png">
							</figure>
							<h3 class="title is-4">
								Вы сэкономите на разработке сайта и приложения
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
		</div>
@endsection