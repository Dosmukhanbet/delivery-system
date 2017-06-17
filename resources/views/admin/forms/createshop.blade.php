               <h3 class="title is-5">Create New Shop</h3>
               <div class="columns">
               		<div class="column is-6">
						<form action="/admin/shops" enctype="multipart/form-data" method="POST">
							   {{csrf_field()}}
							   			<div class="field">		
											<label class="label">Имя</label>
											<p class="control">
												<input class="input {{ $errors->has('username') ? ' is-danger' : '' }}" type="text" name="username" required>
											</p>
											 @if ($errors->has('username'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('username') }}
					                             </p>
					                         @endif
										</div>

										<div class="field">		
											<label class="label">Мобильный номер</label>
											<p class="control">
												<input class="input {{ $errors->has('mobile_number') ? ' is-danger' : '' }}" type="text" name="mobile_number" required>
											</p>
											 @if ($errors->has('mobile_number'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('mobile_number') }}
					                             </p>
					                         @endif
										</div>
										<hr>
										<div class="field">
											  <label class="label">Выберите город</label>
											  <p class="control">
											    <span class="select {{ $errors->has('unit') ? ' is-danger' : '' }}">
											      <select name="city_id">
											      	@foreach($cities as $city)
											        	<option value="{{$city->id}}">{{$city->name}}</option>
											        @endforeach
											      </select>
											    </span>
											  </p>
											  @if ($errors->has('city_id'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('city_id') }}
					                             </p>
					                         @endif
										</div>

										<div class="field">		
											<label class="label">Название органиации</label>
											<p class="control">
												<input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" required>
											</p>
											 @if ($errors->has('name'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('name') }}
					                             </p>
					                         @endif
										</div>

										<div class="field">		
											<label class="label">Название бренда</label>
											<p class="control">
												<input class="input {{ $errors->has('brand_name') ? ' is-danger' : '' }}" type="text" name="brand_name" required>
											</p>
											 @if ($errors->has('brand_name'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('brand_name') }}
					                             </p>
					                         @endif
										</div>

										<div class="field">		
											<label class="label">Slug</label>
											<p class="control">
												<input class="input {{ $errors->has('slug') ? ' is-danger' : '' }}" type="text" name="slug" required>
											</p>
											 @if ($errors->has('slug'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('slug') }}
					                             </p>
					                         @endif
										</div>

										<div class="field">		
											<label class="label">Email</label>
											<p class="control">
												<input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" required>
											</p>
											 @if ($errors->has('email'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('email') }}
					                             </p>
					                         @endif
										</div>
										
										<div class="field">		
											<label class="label">Минимальная сумма заказа</label>
											<p class="control">
												<input class="input {{ $errors->has('min_order') ? ' is-danger' : '' }}" type="text" name="min_order" required>
											</p>
											 @if ($errors->has('min_order'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('min_order') }}
					                             </p>
					                         @endif
										</div>
										@foreach($shopcategories as $category)
											<div class="field is-grouped">
											  <p class="control">
											    <label class="checkbox">
											      <input type="checkbox" name="shopcategories[]" value="{{$category->id}}">
											      	{{$category->name}}
											    </label>
											  </p>
											</div>
										@endforeach
								
										<div class="field">		
											<label class="label">Время доставки (в минутах)</label>
											<p class="control">
												<input class="input {{ $errors->has('delivery_time') ? ' is-danger' : '' }}" type="text" name="delivery_time" required>
											</p>
											 @if ($errors->has('delivery_time'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('delivery_time') }}
					                             </p>
					                         @endif
										</div>
							
										<div class="field">		
											<label class="label">Описание</label>
											<p class="control">
												<textarea class="input {{ $errors->has('description') ? ' is-danger' : '' }}" type="text" name="description"></textarea> 
											</p>
											 @if ($errors->has('description'))
					                             <p class="help is-danger">
					                                 {{ $errors->first('description') }}
					                             </p>
					                         @endif
										</div>
						
								<div class="field ">		
									<label class="label">Время приема заказов:</label><br>
									<p class="control">
										<input class="input {{ $errors->has('open_time') ? ' is-danger' : '' }}" type="text" name="open_time" placeholder="с" required>
									</p>
									 @if ($errors->has('open_time'))
			                             <p class="help is-danger">
			                                 {{ $errors->first('open_time') }}
			                             </p>
			                         @endif
			                         <p class="control">
										<input class="input {{ $errors->has('close_time') ? ' is-danger' : '' }}" type="text" name="close_time" placeholder="до" required>
									</p>
									 @if ($errors->has('close_time'))
			                             <p class="help is-danger">
			                                 {{ $errors->first('close_time') }}
			                             </p>
			                         @endif
								</div>
								<div class="field">		
									<label class="label">Адрес</label>
									<p class="control">
										<input class="input {{ $errors->has('address') ? ' is-danger' : '' }}" type="text" name="address" required>
									</p>
									 @if ($errors->has('address'))
			                             <p class="help is-danger">
			                                 {{ $errors->first('address') }}
			                             </p>
			                         @endif
								</div>

								<div class="field">		
									<label class="label">Логотип</label>
										<p class="control">
											<input class="input {{ $errors->has('logo') ? ' is-danger' : '' }}" type="file" name="logo" required>
										</p>
										 @if ($errors->has('logo'))
			                             <p class="help is-danger">
			                                 {{ $errors->first('logo') }}
			                             </p>
			                         @endif
								</div>
	
								<div class="field">		
									<p class="control">
										<button class="button is-primary" type="submit">Сохранить</button>
									</p>
								</div>
				</form>
				</div>
			</div>	