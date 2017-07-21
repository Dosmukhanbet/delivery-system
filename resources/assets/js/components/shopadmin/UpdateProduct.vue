<template>
	<div>
	   <button class="button is-info is-small" @click.prevent="showForm = true">Редактировать</button>
	   
	   	<div class="modal is-active" v-show="showForm">
		 <div class="modal-background"></div>
		  <div class="modal-card">
		    <header class="modal-card-head">
		      <p class="modal-card-title arsenal has-text-centered" >Редактировать продукт</p>
		      <button class="delete" @click.prevent="showForm = false"></button>
		    </header>
		    <section class="modal-card-body">
		    <div class="columns">
		    	<div class="column is-6">
		    		<div class="field">		
			    		<label class="label">Название</label>
			    		<p class="control">
			    			<input class="input" v-model="product.name" type="text" required>
			    		</p>
			    	</div>
			    	<div class="field">		
			    		<label class="label">Описание</label>
			    		<p class="control">
			    			<input class="input" v-model="product.description" type="text" required>
			    		</p>
			    	</div>
			    	<div class="field">		
			    		<label class="label">Цена</label>
			    		<p class="control">
			    			<input class="input" v-model="product.price" type="text" required>
			    		</p>
			    	</div>
			    	<div class="field">
		      				<p class="control">
		      					<label class="label">Единица измерения</label>
		      					<span class="select is-small">
		      						<select v-model="newunit" required>
		      							<option v-for="unit in units" :value="unit.id">{{unit.name}}</option>
		      						</select>
		      					</span>
		      				</p>
		      		</div>
		    		
		    	</div>
		    </div>
		    	
		    	
		      	
		    </section>
		    <footer class="modal-card-foot" style="margin-top:0">
		      <a class="button is-success" :class="{ 'is-loading':sending }" @click.prevent="updateProduct">Сохранить</a>
		    </footer>
		  </div>
		</div>
	   
	</div>
	
</template>
<script>
	export default {
		props: ['prod', 'units'],
		data() {
			return {
				showForm : false, 
				product: this.prod, 
				newunit: '',
				sending:false
			}
		},
		methods: {
			updateProduct() {
				this.sending =true;
				axios.patch('/products/' + this.product.id, {
					name : this.product.name,
					description : this.product.description,
					price: this.product.price,
					unit_id: this.newunit
				}).then(response => {
					
					flash(response.data.status);
					
					this.sending = false;
					
					setTimeout(() => {
							this.showForm =false;
		                    location.reload();
              				}, 1000);

				}).catch(error => {
					this.sending = false
				});

			}
		}
	}
</script>