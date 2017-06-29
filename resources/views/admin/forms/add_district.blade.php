<h3 class="title is-5">Add district</h3>
				<form action="/admin/districts" enctype="multipart/form-data" method="POST">
					{{csrf_field()}}
					<div class="field">		
						<label class="label">Название</label>
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
						  <label class="label">City</label>
						  <p class="control">
						    <span class="select {{ $errors->has('city_id') ? ' is-danger' : '' }}">
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
						<p class="control">
							<button class="button is-primary" type="submit">Сохранить</button>
						</p>
					</div>
					

					
				</form>