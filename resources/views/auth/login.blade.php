@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
<div class="hero-body">
<div class="container">
    <div class="columns is-vcentered">
        <div class="column is-4 is-offset-4">
                <div class="login box">
                  <h3 class="title is-4 has-text-centered"><strong>Авторизация</strong></h3><hr>
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field">
                            <label for="mobile_number" class="label">Мобильный номер
                                 <small class="small-info">Формат: +77075558844</small>
                            </label>
                            <p class="control">
                                <input id="mobile_number" 
                                       type="mobile_number" 
                                       class="input{{ $errors->has('mobile_number') ? ' is-danger' : '' }}" 
                                       name="mobile_number" value="{{ old('mobile_number') }}" 
                                       required 
                                       autofocus
                                       pattern="(\+7|8)[0-9]{10}">
                            </p>
                                @if ($errors->has('mobile_number'))
                                    <p class="help is-danger">
                                        {{ $errors->first('mobile_number') }}
                                    </p>
                                @endif
                        </div>

                        <div class="field">
                            <label for="password" class="label">Пароль</label>

                            <p class="control">
                                <input id="password" 
                                       type="password" 
                                       class="input{{ $errors->has('password') ? ' is-danger' : '' }}" 
                                       name="password" 
                                       value="{{ old('password') }}" 
                                       required 
                                       autofocus>
                            </p>
                             @if ($errors->has('password'))
                                    <p class="help is-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </p>
                             @endif
                        </div>

                        <div class="field">
                          <p class="control">
                            <label class="checkbox" style="color:#343333">
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <small>Запомнить меня</small>
                            </label>
                          </p>
                        </div>

                        <div class="field">
                            <p class="control">
                                <button type="submit" class="button is-primary">
                                    Войти
                                </button>
                            </p>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection
