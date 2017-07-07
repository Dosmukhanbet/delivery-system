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

		computed: {
			status() {
				return this.active ? 'Виден' : 'Не виден';
			},
			buttonText() {
				return this.active ? 'убрать' : 'показать';
			}

		},

		methods: {
			toggle() {
				this.active ? this.deactivate() : this.activate();
			},
			deactivate() {
				axios.delete('/products/' + this.productid + '/deactivate')
					 .then(response => {
								flash(response.data.status);
							});
                this.active = false;

			},
			activate() {
				axios.post('/products/' + this.productid + '/activate')
					 .then(response => {
								flash(response.data.status);
							});
                this.active = true;
			}

		}
	}
</script>