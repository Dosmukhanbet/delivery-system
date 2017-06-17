 <nav class="nav">
  <div class="container">
      <div class="nav-left">
         @include('partials.logo')
      </div>
      <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
      <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
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
  </div>
</nav>