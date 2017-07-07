 <div class="newnav">
 <div class="container">
 <nav class="navbar is-transparent" >
      <div class="navbar-brand">
         @include('partials.new.logo')

        <div class="navbar-burger burger" data-target="navMenuExample">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>


     
          {{-- DESKTOP SCREEN --}}
       <div  class="navbar-menu">
        @include('partials.new.user')
      </div>
        
        
          {{-- Tablet, Mobile screen --}}
      {{-- <div  class="navbar-menu">
         @include('partials.new.user')
      </div> --}}
</nav>
</div>
</div>