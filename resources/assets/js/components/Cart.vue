<template>
	<div class="cart">
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
					<a class="remove" @click="remove(index, item)"><small>&#10006</small></a>
			</li>
		</ul>
		<hr>
		<p><strong>Итого: {{ total }} тг.</strong></p>
		<p class="has-text-centered mt-2" v-if="total >= minorder">
			<a class="button is-warning" 
			   @click.prevent="showOrder = true">
				Оформить заказ
			</a>
		</p>
		<order 
		    :products="items"
		    :rates="shop.rates"
		    :city="city"
		    :shop="shop"
		    v-show="showOrder" 
		    @close="showOrder = false && clearCart">
		</order>
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
			}
		},
		
		methods: {
			addToCart(data){
				this.items.push(data);
			},

			remove(index, item) {
            	this.items.splice(index, 1);
	        },

	        clearCart() {
	        	this.items = []; 
	        }

	        

        	
		}
	}
</script>

<style lang="scss">
	.cart {
		font-family: 'Kelly Slab', cursive;
		padding: 1rem;
		background:#fff;
		border: 2px solid #DBDBDB;
	}
	.remove {
		color:red;
	}
</style>