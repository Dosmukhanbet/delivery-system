@if( !Auth::check())
  <div class="navbar-end">
          <div class="navbar-item field is-grouped">
              <p class="control">
                <a href="/login" class="button is-warning is-outlined" >
                  <span>Войти</span>
                </a>
              </p>
              
          </div>
  </div>        
@else
  <div class="navbar-end navbar-loggedin">
            <div class="navbar-item has-dropdown is-hoverable">
                <p class="navbar-item text-warning" >
                  {{auth()->user()->name}}
                </p>
                  @if(auth()->user()->type == 'customer')
                    <div class="navbar-dropdown">
                      <a class="navbar-item " href="#">
                        Профиль
                      </a>
                      <hr class="navbar-divider">
                      <a class="navbar-item" href="#">
                        Отзывы
                      </a>
                    </div>
                  @endif
            </div>
            
            <div class="nav-item field">
              <p class="control">
                <a href="{{url('/logout')}}" class="button is-warning is-outlined" >
                  <span>Выйти</span>
                </a>
              </p>
            </div>
     </div>     
@endif