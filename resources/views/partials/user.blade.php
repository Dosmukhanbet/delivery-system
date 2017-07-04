@if( !Auth::check())
          <div class="nav-item field is-grouped">
            <p class="control">
              <a href="/login" class="button is-warning is-outlined" >
                <span>Войти</span>
              </a>
            </p>
          </div>
         @else
            <p class="nav-item text-warning">{{auth()->user()->name}}</p>
            <div class="nav-item field">
              <p class="control">
                <a href="{{url('/logout')}}" class="button is-warning is-outlined" >
                  <span>Выйти</span>
                </a>
              </p>
            </div>
          
@endif