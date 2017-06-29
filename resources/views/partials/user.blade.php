@if( !Auth::check())
          <div class="nav-item field is-grouped">
            <p class="control">
              <a href="/login" class="button is-danger is-outlined" >
                <span>Войти</span>
              </a>
            </p>
          </div>
         @else
            <p class="nav-item">{{auth()->user()->name}}</p>
            <div class="nav-item field">
              <p class="control">
                <a href="{{url('/logout')}}" class="button is-danger is-outlined" >
                  <span>Выйти</span>
                </a>
              </p>
            </div>
          
@endif