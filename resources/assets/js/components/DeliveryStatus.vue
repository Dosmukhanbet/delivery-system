<template>
<div class="delivery--status--switch has-text-centered">
	<button 
			class="button"
			@click="toggle"
			:class="{ 'is-info': isDelivered }"
			>
		{{ status }}
	</button>
</div>	
</template>

<script>
	export default {
		props : ['order'],

		data() {
			return {
				isDelivered : true
			}
		},
		created() {
			this.isDelivered = this.order.delivery_status;
		},

		computed:{
			status () {
				return this.isDelivered ? 'Доставлено' : 'Не доставлено'
			}
		},

		methods: {
			toggle() {
				this.isDelivered = ! this.isDelivered;

				this.updateStatus();
			},
			updateStatus(){
				let data = {
					orderId : this.order.id
				};
				axios.post('/customer/delivery_status/update', data)
					  .then(response => {
					  	flash(response.data.status);
					  })
					  .catch(error => {
					  	// alert(error.message);
					  	alert(error.message);
					  });
			}


		}

	}
</script>
<style lang="scss">
	// .delivery--status--switch 
	// {
	// 	width: 250px;
	// }
</style>