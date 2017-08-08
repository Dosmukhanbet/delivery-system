<template>
	<div class="card">
		    <div class="card-image">
		        <figure class="image is-1by1">
			        	<img :src="photo_path">
		        </figure>
		    </div>
		  <div class="card-content">
		      <div class="content">
		          <p class="subtitle is-6 has-text-centered">
		                  <span class="tooltip" :data-tooltip="description">
		                  		{{ name }}
		                  </span>
		          </p>
		         
				  <p class="has-text-centered">
					  <span class="icon">
					  	<i class="fa fa-minus-square-o" aria-hidden="true" @click.prevent="cart.amount--"></i>
					  </span>
					  <span v-text="quantity"></span>
					  <span class="icon">
					  	<i class="fa fa-plus-square-o" aria-hidden="true" @click.prevent="cart.amount++"></i>
					  </span>
					  <span class="price">{{total}} тг.</span>
				 </p>  
		          <p class="has-text-centered">
		            <a class="button is-danger" @click.prevent="updateCart">в корзину</a>
		          </p>
		      </div>
		  </div>
	</div>
</template>
<script>
	export default {
		props: ['product'],

		data() {
			return {
				name : this.product.name,
				price : this.product.price,
				description: this.product.description,
				cart: {
					productId : this.product.id,
					name : this.product.name,
					price : this.product.price,
					unit: this.product.unit.short_name,
					amount: 1,
					summa: ''
				}
			}
		},
		created(){
		},
		computed: {
			photo_path() {
					return '/app/' + this.product.photo_path;
			},
			total() {
				return this.product.price*this.quantity;
			},
			quantity(){
				return this.cart.amount < 1 ? 1 : this.cart.amount; 
			}
		},
		methods:{
			updateCart() {
				this.cart.summa = this.total;
				AppEvent.fire('update', this.cart);
				// console.log(this.cart);	
			}


		}

	}
</script>
<style lang="scss">
	.price {
	 	color: #000;
	    padding-right: calc(0.625em - 1px);
	    padding-top: 0.5rem;
	}

	.description {
		position: relative;
		top:0;
		left:0;
	}


	
</style>