<template>
	<div>
		<button class="button is-danger is-medium" @click.prevent="showForm = true">Подключится к системе</button>
		 		<div class="form-be-partner" v-show="showForm">
				<div class="modal is-active">
					 <div class="modal-background"></div>
					  <div class="modal-card">
					    <header class="modal-card-head">
					      <p class="modal-card-title arsenal has-text-centered" >Форма отправки запроса </p>
					      <button class="delete" @click.prevent="showForm = false">
			      		  </button>
					    </header>
					    <section class="modal-card-body">
					    	<form @submit.prevent="sendInfo">
								<div class="field">		
									<label class="label">Имя</label>
									<p class="control">
										<input v-model="name" class="input" type="text" required placeholder="Ваше имя">
									</p>
								</div>
									
								<div class="field">		
									<label class="label">Название вашего заведения</label>
									<p class="control">
										<input v-model="companyName" class="input" type="text" required placeholder="Например: Ресторан Астория">
									</p>
								</div>

								<div class="field">		
									<label class="label">Мобильный номер</label>
									<p class="control">
										<input v-model="mobilenumber" class="input" required type="text">
									</p>
								</div>

								<div class="field">
									<p class="control">
										<button type="submit" class="button is-danger" :class="{ 'is-loading':sending }" >Отправить данные</button> 
									</p>
								</div>
							</form>	
					    </section>
					    <footer class="modal-card-foot" style="margin-top:0">
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