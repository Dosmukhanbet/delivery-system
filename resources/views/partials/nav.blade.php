 <nav class="nav is-primary" >
  <div class="container">
      <div class="nav-left">
         @include('partials.logo')
      </div>

      <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </span>

          {{-- DESKTOP SCREEN --}}
       <div class="nav-right nav-menu">
        @include('partials.user')
      </div>
        
        
          {{-- Tablet, Mobile screen --}}
      <div class="nav-right nav-menu is-hidden-tablet">
        @include('partials.user')
      </div>
  </div>
</nav>