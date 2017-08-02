<template>
	<div>
		<button class="button is-info" @click.prevent="showForm = true">Оставить отзыв</button>
		 		<div class="form-be-partner" v-show="showForm">
				<div class="modal is-active">
					 <div class="modal-background"></div>
					  <div class="modal-card">
					    <header class="modal-card-head partnership_request_header">
					      <p class="modal-card-title arsenal has-text-centered" >Оставить отзыв</p>
					      <button class="delete is-medium" @click.prevent="showForm = false">
			      		  </button>
					    </header>
					    <section class="modal-card-body">
					    	<div class="columns">
					    		<div class="column is-8 is-offset-2">
					    			<form @submit.prevent="sendFeedback">
										<div class="field">		
											<!-- <label class="label">Имя</label> -->
											<p class="control">
												<textarea v-model="body" 
														  class="textarea" 
														  placeholder="напишите ваш отзыв здесь"
														  required>													
												</textarea>
											</p>
										</div>
										<div class="field">
											<p class="control">
												<button    type="submit" class="button is-info is-fullwidth" :class="{ 'is-loading':sending }" >Отправить</button> 
											</p>
										</div>
								</form>	
					    			
					    		</div>
					    	</div>
					    	
					    </section>
					    <footer class="modal-card-foot partnership_request_footer" style="margin-top:0">
					    </footer>
					  </div>
				</div>
			</div>
	</div>
</template>
<script>
 export default {
 	data(){
 		return {
 			showForm:false,
 			sending:false,
 			body:''
 		}
 	},
 	props: ['order', 'shop', 'customer'],
 	methods: {
 		sendFeedback() {
 			this.sending = true;
				let data = {
					body: this.body,
					order: this.order,
					shop:this.shop,
					customer:this.customer
				};
				axios.post('/customer/leavefeedback', data)
					 .then(response => {
					 	this.sending = false;
					 	this.showForm =false;
					 	flash(response.data);
					  	console.log(response.data);
					  });
 		}
 	}
} 
	
</script>