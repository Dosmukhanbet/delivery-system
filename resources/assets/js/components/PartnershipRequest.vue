<template>
	<div>
		<button class="button is-danger is-medium" @click.prevent="showForm = true">Подключится к системе</button>
		 		<div class="form-be-partner" v-show="showForm">
				<div class="modal is-active">
					 <div class="modal-background"></div>
					  <div class="modal-card">
					    <header class="modal-card-head partnership_request_header">
					      <p class="modal-card-title arsenal has-text-centered" >Запрос на сотрудничество</p>
					      <button class="delete is-medium" @click.prevent="showForm = false">
			      		  </button>
					    </header>
					    <section class="modal-card-body">
					    	<div class="columns">
					    		<div class="column is-8 is-offset-2">
					    			<form @submit.prevent="sendInfo">
								<div class="field">		
									<!-- <label class="label">Имя</label> -->
									<p class="control">
										<input v-model="name" class="input is-medium" type="text" required placeholder="Ваше имя">
									</p>
									<br>
								</div>
									
								<div class="field">		
									<!-- <label class="label">Название вашего заведения</label> -->
									<p class="control">
										<input v-model="companyName" class="input is-medium" type="text" required placeholder="Название вашего заведения">
									</p>
									<br>
								</div>

								<div class="field">		
									<!-- <label class="label">Мобильный номер<small class="small-info">Пример: +77075558844</small></label> -->
									<p class="control">
										<input v-model="mobilenumber" class="input is-medium" required type="text" placeholder="Мобильный номер">
									</p>
									<br>
								</div>

								<div class="field">
									<p class="control">
										<button type="submit" class="button is-danger is-medium is-fullwidth" :class="{ 'is-loading':sending }" >Отправить данные</button> 
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
		data() {
			return {
				showForm: false,
				sending:false,
				name: '',
				companyName: '',
				mobilenumber: ''
			}
		},
		methods: {
			sendInfo() {
				this.sending = true;
				let data = {
					name: this.name,
					companyName: this.companyName,
					mobilenumber:this.mobilenumber
				};
				axios.post('bepartner', data)
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