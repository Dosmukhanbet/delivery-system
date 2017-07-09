<template>
	<div>
		<p>Видимость: {{status}} </p>
		<footer class="card-footer" style="margin-top:0">
			
			<a class="card-footer-item button" 
			   @click='toggle'
			   v-text="buttonText"
			   ></a>
		</footer>
	</div>
</template>
<script>
	export default {
		props: ['active', 'productid'],

		data() {
			return {
				isActive : this.active
			}
		},

		computed: {
			status() {
				return this.isActive ? 'Виден' : 'Не виден';
			},
			buttonText() {
				return this.isActive ? 'убрать' : 'показать';
			}

		},

		methods: {
			toggle() {
				this.isActive ? this.deactivate() : this.activate();
			},
			deactivate() {
				axios.delete('/products/' + this.productid + '/deactivate')
					 .then(response => {
								flash(response.data.status, 'danger');
							});
                this.isActive = false;

			},
			activate() {
				axios.post('/products/' + this.productid + '/activate')
					 .then(response => {
								flash(response.data.status, 'warning');
							});
                this.isActive = true;
			}

		}
	}
</script>