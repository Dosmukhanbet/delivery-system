 <nav class="navbar is-primary" >
  <div class="container">
      <div class="navbar-brand">
         @include('partials.logo')
      </div>

      <span class="navbar-burger">
        <span></span>
        <span></span>
        <span></span>
      </span>

     
          {{-- DESKTOP SCREEN --}}
       <div class="navbar-menu">
        @include('partials.newuser')
      </div> 
        
        
          {{-- Tablet, Mobile screen --}}
      <div class="navbar-menu is-active">
         @include('partials.newuser')
      </div>
  </div>
</nav>