 <div class="newnav">
   <div class="container">
       <nav class="navbar" >
            <div class="navbar-brand">
               @include('partials.new.logo')
                <div class="navbar-burger burger" data-target="navMenuExample">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>

            
              @if(auth()->check() && auth()->user()->type == 'admin')
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <div class="navbar-item">
                          <a href="#" class="button is-warning">
                            {{ request()->ip() }}
                          </a>  
                        </div>
                    </div>
                </div>
              @endif
           
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