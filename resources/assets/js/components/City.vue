<template>
	<div class="modal is-active modal-width">
					 <div class="modal-background"></div>
					  <div class="modal-card">
						    <header class="modal-card-head City--modal--head">
						      <p class="modal-card-title has-text-centered is-size-5" >Выберите Ваш город</p>
						    </header>

						    <section class="modal-card-body">
						    	<div class="columns">
						    		<div class="column">
						    			<ul>
						    				<li v-for="city in cities" class="has-text-centered is-size-6 List--city">
						    					<a :href="url(city.slug)">{{ city.name }}</a>
						    				</li>
						    			</ul>
						    			
						    		</div>
						    	</div>
						    </section>
						    <footer class="modal-card-foot City--modal--food" style="margin-top:0">
						    </footer>
					  </div>
				</div>
</template>
<script>
	export default {
		props: ['cities'],
		methods: {
			url(slug)
			{
				return '/cities/' + slug;
			}
		},
		data() {
			return {
			}
		}
	}
</script>
<style lang="scss">
	.List--city
	{
		padding: 0.5rem;
		border-bottom: 1px solid #f5f5f5;
	}

	.List--city > a:hover {
		color: #4481AA;
	}

	.City--modal--food, .City--modal--head {
		background:#fff !important;
		border-bottom: none !important;
		border-top: none !important;
	} 
</style>