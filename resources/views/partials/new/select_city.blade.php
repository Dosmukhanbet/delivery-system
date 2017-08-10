<div class="navbar-end navbar-loggedin">
            <div class="navbar-item has-dropdown is-hoverable">
            	<p class="navbar-item text-warning" >
            		@if($city)
                 	   {{ $city->name }}
                 	 @endif
                </p>
            
             <div class="navbar-dropdown is-boxed ">
             	@foreach($cities as $city)
             		<a class="navbar-item text-danger" href="{{ url( 'cities/'.$city->slug ) }}">
                        {{ $city->name }}
                      </a>
             	@endforeach
             </div>
            </div> 
</div>
