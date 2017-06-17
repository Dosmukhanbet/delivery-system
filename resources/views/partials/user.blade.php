@if( !Auth::check())
          <div class="nav-item field is-grouped">
            <p class="control">
              <a href="/login" class="button is-info" >
                <span>Войти</span>
              </a>
            </p>
          </div>
         @else
            <p class="nav-item">{{auth()->user()->name}}</p>
            <div class="nav-item field">
              <p class="control">
                <a href="{{url('/logout')}}" class="button is-info" >
                  <span>Выйти</span>
                </a>
              </p>
            </div>
          
@endif