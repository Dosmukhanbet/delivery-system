<template>
	<div class="cart" id="cart">
	<div class="level">
		<div class="level-left">
			<p class="title is-5">
			    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
			    КОРЗИНА
			</p>
		</div>
		<div class="level-right" v-if="items.length">
			<a href="" class="button is-link marmelad" @click.prevent="clearCart"><small>очистить корзину</small></a>
		</div>
	</div>
		
		<ul>
			<li v-for="(item, index) in items">
				<small v-text="item.name"></small>
				<small>{{item.price}}тг.  x</small> 
				<small>{{ item.amount }}{{item.unit}}</small>
					<a class="remove delete is-small" @click="remove(index, item)"></a>
			</li>
		</ul>
		<hr>
		<p><strong>Итого: {{ total }} тг.</strong></p>
			<p v-if="total < minorder && total > 0" class="notEnough">
			    Не хватает <span v-text="notEnough"></span>тг. до минимальной суммы заказа
			</p>
			 <transition
			    name="custom-classes-transition"
			    enter-active-class="animated bounceIn"
			    leave-active-class="animated bounceOut"
			  >
				<p class="has-text-centered mt-2" v-if="total >= minorder">
					<a class="button is-warning" 
					   @click.prevent="showOrder = true">
						Оформить заказ
					</a>
				</p>
			</transition>

		<transition
			    name="custom-classes-transition"
			    enter-active-class="animated slideInDown"
			    leave-active-class="animated fadeOut"
			  >	
				<order 
				    :products="items"
				    :rates="shop.rates"
				    :city="city"
				    :shop="shop"
				    v-show="showOrder" 
				    @close="showOrder = false && clearCart">
				</order>
		</transition>
	</div>
</template>

<script>
	import Order from './Order.vue';

	export default {
		data() {
			return {
				showOrder:false,
				items: [],
				summa : 0
			}
		},
		props: ['minorder', 'city', 'shop'],

		components : { Order },

		created() {
			AppEvent.listen('update', this.addToCart);
		},
		computed: {
			total() {
				let summ = 0;
				this.items.map((item) =>
				{
					summ += item.amount*item.price;
				});
				return summ;
			},
			notEnough() {
				return this.minorder - this.total;
			} 
		},
		
		methods: {
			addToCart(data){
				this.items.push(data);
				this.scrolToCart();
				
			},

			remove(index, item) {
            	this.items.splice(index, 1);
	        },

	        clearCart() {
	        	this.items = []; 
	        },
	        scrolToCart(){
	        	$('html, body').animate({
			        scrollTop: $("#cart").offset().top
			    }, 750);
	        }

	        

        	
		}
	}
</script>

<style lang="scss">
	.cart {
		font-family: 'Marmelad', cursive;
		padding: 1rem;
		background:#fff;
		border: 2px solid #DBDBDB;
	}
	.remove {
		color:red;
	}
	.notEnough{
		background:#F6F7F9;
		padding: 0.5rem;
		margin-top: 1rem;
		font-size: 0.9rem;
		color:lighten(#333, 30%);
	}
</style>