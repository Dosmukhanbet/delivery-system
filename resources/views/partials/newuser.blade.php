@if( !Auth::check())
  <div class="navbar-start">
          <div class="navbar-item field is-grouped">
            <p class="control">
              <a href="/login" class="button is-warning is-outlined" >
                <span>Войти</span>
              </a>
            </p>
          </div>
  </div>        
@else
  <div class="navbar-start">
            <p class="navbar-item text-warning">
              {{auth()->user()->name}}
            </p>
            <div class="nav-item field">
              <p class="control">
                <a href="{{url('/logout')}}" class="button is-warning is-outlined" >
                  <span>Выйти</span>
                </a>
              </p>
            </div>
     </div>     
@endif