@extends('layouts.app')
@section('content')
 	<div class="columns mt-2">
		<div class="column is-6 is-offset-3">
			<h3 class="title is-5">Имя: {{ $user->name }}</h3>
			<h3 class="title is-5">Мобильный номер: {{ $user->mobile_number}}</h3>
			<h3 class="title is-5">Название заведения: {{ $user->shops[0]->name}}</h3>
			<h3 class="title is-5">Название Бренда: {{ $user->shops[0]->brand_name}}</h3>
			<h3 class="title is-5">Город: {{ $user->shops[0]->city->name}}</h3>
			<h3 class="title is-5">Адрес: {{ $user->shops[0]->address}}</h3>
			<h3 class="title is-5">О заведении: {{ $user->shops[0]->description}}</h3>
			<hr>
			<div>
				<h3 class="title is-4">Обновить пароль</h3>
				<form action="/shop/updatepassword" method="POST">
					{{csrf_field()}}
					{{-- <div class="field">		
						<label class="label">Старый пароль</label>
						<p class="control">
							<input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password">
						</p>
						 @if ($errors->has('password'))
                             <p class="help is-danger">
                                 {{ $errors->first('password') }}
                             </p>
                         @endif
					</div> --}}
					<div class="field">		
						<label class="label">Новый пароль</label>
						<p class="control">
							<input class="input {{ $errors->has('newpassword') ? ' is-danger' : '' }}" type="newpassword" name="newpassword">
						</p>
						 @if ($errors->has('newpassword'))
                             <p class="help is-danger">
                                 {{ $errors->first('newpassword') }}
                             </p>
                         @endif
					</div>
					<div class="field">		
						<p class="control">
							<button class="button is-primary" type="submit">Обновить</button>
						</p>
					</div>

							
				</form>
			</div>
		</div>
	</div>	

@endsection