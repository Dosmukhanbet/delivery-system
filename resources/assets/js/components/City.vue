<template>
	<div class="modal is-active">
					 <div class="modal-background"></div>
					  <div class="modal-card">
						    <header class="modal-card-head partnership_request_header">
						      <p class="modal-card-title arsenal has-text-centered" >Выберите Ваш город</p>
						    </header>

						    <section class="modal-card-body">
						    	<div class="columns">
						    		<div class="column">
						    			<ul>
						    				<li v-for="city in cities" class="has-text-centered">
						    					<a :href="url(city.slug)">{{ city.name }}</a>
						    				</li>
						    			</ul>
						    			
						    		</div>
						    	</div>
						    </section>
						    <footer class="modal-card-foot partnership_request_footer" style="margin-top:0">
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