<template>
	<div class="modal is-active">
		 <div class="modal-background"></div>
		  <div class="modal-card">
		    <header class="modal-card-head">
		      <p class="modal-card-title arsenal has-text-centered" >Оформление Заказа</p>
		      <button class="delete" 
		      		  @click="$emit('close')">
      		  </button>
		    </header>
		    <section class="modal-card-body">
		      	<div class="columns" v-show="!orderFinished">
		      		<!-- LEFT SIDE -->
		      		<div class="column is-6 arsenal fields">
		      			<div v-show="!verification">
						<form @submit.prevent="verifyNumber">
		      			<div class="field">
		      				<p class="control">
		      					<label class="label">Выберите район доставки</label>
		      					<span class="select is-small">
		      						<select v-model="cost" required>
		      							<option v-for="rate in rates" :value="rate">{{rate.district.name}}</option>
		      						</select>
		      					</span>
		      				</p>
		      			</div>
		      			<div class="field">
						<label class="label">Адрес доставки<small class="small-info">Пример: ул.Смагулова, 54 кв.25</small></label>
						  <p class="control">
						    <input v-model="address" class="input" type="text" placeholder="микрорайон, улица, дом, кв" required>
						  </p>
						</div>
		      			<br>
		      			<div class="field">
						  <p class="control">
						  <label class="label">Имя</label>
						    <input v-model="username" class="input" :disabled="signedIn" type="text" placeholder="Введите ваше имя" required>
						  </p>
						</div>
						<div class="field">
						 <label class="label">
						 	Мобильный номер<small class="small-info">Пример: +77075558844</small>
						 </label>
						  <p class="control">
						    <input v-model="phoneNumber" class="input" :disabled="signedIn" type="text" placeholder="Укажите мобильный номер" required pattern="(\+7)[0-9]{10}">
						  </p>
						</div>

						
						<div class="field">
							<p class="control">
								<button type="submit" class="button is-info" :class="{ 'is-loading':sending }">Отправить</button> 
							</p>
						</div>
						</form>
						</div>
							<!-- VERIFICATION -->
							<transition
									    name="custom-classes-transition"
									    enter-active-class="animated flipInY"
									    leave-active-class="animated flipOutY"
									  >
								<div v-show="verification">
									<p>На номер {{ phoneNumber }} был отправлен SMS с кодом, введите код чтобы завершить заказ</p>
									<br>
									<div class="field">
										 <label class="label">Введите код:</label>
										  <p class="control" :class="{'is-loading' : isLoading}">
										    <input class="input" type="text" v-model="enteredCode">
										  </p>
									</div>
									<br>
									<transition
									    name="custom-classes-transition"
									    enter-active-class="animated flipInX"
									    leave-active-class="animated flipOutX"
									  >	
										<p v-show="waitSmsTooLong">
											Не присло смс? <a class="button is-small" @click.prevent="verification = false">Попробуйте заново</a>
										</p>
									</transition>
									<div v-show="isLoading">
										<p>
											Ваш номер подтвержден, подождите минутку мы формируем заказ
											<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
											<span class="sr-only">Loading...</span>
										</p>
									</div>
								 
								</div>
							</transition>	
						    <!-- END VERIFICATION -->
		      		</div>
					<!-- END LEFT SIDE -->
					 
					

		      		<!-- RIGHT SIDE -->
		      		<div class="column is-6 items">
		      			<ul v-show="!orderFinished">
		      				<li v-for="(item, index) in items">
								<span v-text="item.name"></span>
								<span v-text="item.price"></span>тг. x
								<span v-text="item.amount"></span>
								<span v-text="item.unit"></span>
		      				</li>
		      				<hr>
		      				<li>Сумма: <span v-text="total"></span>тг.</li>
		      				<li>+</li>
		      				<li>Доставка: <span v-text="cost.cost"></span>тг.</li>
		      				<hr>
		      				<li v-show="cost"><strong>Итого: <span v-text="totalcost"></span>тг.</strong></li>
		      			</ul>
		      			 <!-- <div id="map" style="width: 300px; height: 400px"></div> -->
		      			<div v-show="orderFinished" class="notification is-success">
 								Заказ успешно сформирован!<br>
 								В ближайшее время курьер свяжеться с Вами.
						</div>
		      		</div>
		      		<!-- END RIGHT SIDE -->
		      	</div>
		      	<div v-show="orderFinished">
		      		<p class="title is-5 has-text-centered marmelad">
		      		Ваш заказ сформирован, ожидайте курьера!
		      		</p>
		      	</div>
		    </section>
		    <footer class="modal-card-foot" style="margin-top:0">
		      <!-- <a class="button is-success arsenal" @click.prevent="send" v-show="numberVerified">Отправить данные</a> -->
		    </footer>
		  </div>
	</div>
</template>
<script>
import moment from 'moment';
export default {
props: ['products','rates', 'city', 'shop'],
data() {
			return {
				items: this.products,
				cost: '',
				verification: false,
				enteredCode: '',
				codeFromServer:false,
				numberVerified:false,
				isLoading: false,
				orderFinished: false,
				username: '',
				phoneNumber: '',
				address:'',
				sending:false,
				waitSmsTooLong: false
			}
		},
created() {
	if(this.signedIn) 
	{
		this.username = window.App.user.name;
		this.phoneNumber = window.App.user.mobile_number;
	}
},	

computed:{
				total() 
				{
					let summ = 0;
					this.items.map((item) =>
					{
						summ += item.amount*item.price;
					});
					return summ;
				},

				totalcost()
				{
					if( !this.cost)
					{
						return '';
					}
				    return this.total+this.cost.cost;
				},
				signedIn() 
				{
	                return window.App.signedIn;
	            }
		},
watch: {
			enteredCode() {
				if(this.enteredCode == this.codeFromServer)
				{
					this.makeOrder();
				}

			},
			cost(){
				// this.makeMap();
			}

},		

methods: {


			verifyNumber() 
			{
				this.sending =true;
				let data = {
					phoneNumber:this.phoneNumber
				}

				if(this.signedIn) 
				{ 
				  return this.makeOrder();
				}
				
				axios.post('/verifynumber', data)
					  .then(response => {
					   this.codeFromServer = response.data;
					   this.verification = true;
					   this.sending = false;
					  })
					  .catch(error => {
					  	this.sending = false;
					  	let errortext = 'Не удалось отправить СМС на указанный вами номер, проверьте правильность набора. Введите номера в международном формате. Пример: +77074447755. Исправьте ошибки и повторите попытку';
					  	alert(errortext);
					  });
					  setTimeout(() => {
				                    this.waitSmsTooLong = true;
				                }, 20000);
				
			},

			makeOrder()
			{
					this.isLoading = true;
					axios.post('/orders', this.orderDatas())
						 .then(response => {
						  	console.log(response);
						  	this.isLoading = false;
						  	this.orderFinished = true;
						  	flash('Заявка успешно принята!');
						  	setTimeout(() => {
				                    this.$emit('close');
				                    location.reload();
				                }, 3500);
						  })
						 .catch(error => {
						  	console.log(error);
						  	this.isLoading = false;
						  })	
			},

			orderDatas() {
				let data = {
					username : this.username,
					mobilenumber : this.phoneNumber,
					address: this.address,
					total: this.total,
					district: this.cost.district.name,
					deliveryCost: this.cost.cost,
					totalWithDelivery:this.totalcost,
					cityId: this.city.id,
					shopId: this.shop.id,
					products: this.items,
					password: this.codeFromServer
				}

				return data;
			},
			makeMap() 
			{
				
				ymaps.ready(init);
				var myMap;

				let coordiantes = this.cost.district.map_coordinates;

				console.log(coordiantes);

				function init()
				{     
					myMap = new ymaps.Map("map", {
							center: [55.73, 37.75],
				            zoom: 10
					});
						    
					console.log(coordiantes);		

					var myPolygon = new ymaps.Polygon(coordiantes, {
				        // Описываем свойства геообъекта.
				        // Содержимое балуна.
				        hintContent: "Многоугольник"
				    }, {
				        // Задаем опции геообъекта.
				        // Цвет заливки.
				        fillColor: '#00FF0088',
				        // Ширина обводки.
				        strokeWidth: 2
				    });

			    	// Добавляем многоугольник на карту.
			   		myMap.geoObjects.add(myPolygon);
			 }
			}
		
		
	    }
}	    
</script>
<style lang="scss">
	@import url('https://fonts.googleapis.com/css?family=Arsenal');

	.arsenal {
		font-family: 'Arsenal', sans-serif;
	}

	.fields{
		border-right: 1px solid #DBDBDB;
	}
	.fields, .items {
		padding: 1rem;
		margin-top: 1rem;
		margin-bottom: 1rem;
	}
	.small-info{
		color: #b5b5b5;
		margin-left: 1rem;
	}
	
</style>