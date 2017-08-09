<h3 class="title is-4">Форма добавления блюда, продукта, товара</h3>
				<form action="/products" enctype="multipart/form-data" method="POST">
					{{csrf_field()}}
					<div class="field">		
						<label class="label">Название</label>
						<p class="control">
							<input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" placeholder="Например: Суши Филадельфия">
						</p>
						 @if ($errors->has('name'))
                             <p class="help is-danger">
                                 {{ $errors->first('name') }}
                             </p>
                         @endif
					</div>
					<div class="field">		
						<label class="label">Описание</label>
						<p class="control">
							<input class="input {{ $errors->has('description') ? ' is-danger' : '' }}" name="description" type="text" placeholder="Ингридиенты">
						</p>
						@if ($errors->has('description'))
                             <p class="help is-danger">
                                 {{ $errors->first('description') }}
                             </p>
                         @endif
					</div>
					<div class="field">		
						<label class="label">Цена</label>
						<p class="control">
							<input class="input {{ $errors->has('price') ? ' is-danger' : '' }}" name="price" type="text">
						</p>
						@if ($errors->has('price'))
                             <p class="help is-danger">
                                 {{ $errors->first('price') }}
                             </p>
                         @endif
					</div>
					
					<div class="field">
						  <label class="label">Единица измерения</label>
						  <p class="control">
						    <span class="select {{ $errors->has('unit') ? ' is-danger' : '' }}">
						      <select name="unit">
						      	@foreach($units as $unit)
						        	<option value="{{$unit->id}}">{{$unit->name}}</option>
						        @endforeach
						      </select>
						    </span>
						  </p>
						  @if ($errors->has('unit'))
                             <p class="help is-danger">
                                 {{ $errors->first('unit') }}
                             </p>
                         @endif
					</div>
					<div class="field">
						  <label class="label">Категория</label>
						  <p class="control">
						    <span class="select {{ $errors->has('category') ? ' is-danger' : '' }}">
						      <select name="category">
						      	@foreach($categories as $category)
						        	<option value="{{$category->id}}">{{$category->name}}</option>
						        @endforeach
						      </select>
						    </span>
						  </p>
						  @if ($errors->has('category'))
                             <p class="help is-danger">
                                 {{ $errors->first('category') }}
                             </p>
                         @endif
					</div>
					<div class="field">		
						<label class="label">Photo</label>
							<p>Соотношение сторон фото должны быть одинаковы. Например: 500px X 500px</p>
							<p class="control">
								<input class="input {{ $errors->has('photo') ? ' is-danger' : '' }}" type="file" name="photo">
							</p>
							 @if ($errors->has('photo'))
                             <p class="help is-danger">
                                 {{ $errors->first('photo') }}
                             </p>
                         @endif
					</div>
				
					<div class="field">		
						<p class="control">
							<button class="button is-primary" type="submit">Сохранить</button>
						</p>
					</div>
					

					
				</form>