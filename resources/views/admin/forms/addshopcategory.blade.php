               <h3 class="title is-5">Add New ShopCategory</h3>
				<form action="/admin/shopcategories" enctype="multipart/form-data" method="POST">
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
						  <label class="label">Group</label>
						  <p class="control">
						    <span class="select {{ $errors->has('group_id') ? ' is-danger' : '' }}">
						      <select name="group_id">
						      	@foreach($groups as $group)
						        	<option value="{{$group->id}}">{{$group->name}}</option>
						        @endforeach
						      </select>
						    </span>
						  </p>
						  @if ($errors->has('group_id'))
                             <p class="help is-danger">
                                 {{ $errors->first('group_id') }}
                             </p>
                         @endif
					</div>

					<div class="field">		
									<label class="label">Фото</label>
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
						<label class="label">Icon</label>
							<p>Соотношение сторон фото должны быть одинаковы. Например: 64px X 64px</p>
							<p class="control">
								<input class="input {{ $errors->has('icon') ? ' is-danger' : '' }}" type="file" name="icon">
							</p>
							 @if ($errors->has('icon'))
                             <p class="help is-danger">
                                 {{ $errors->first('icon') }}
                             </p>
                         @endif
					</div>			
					
					<div class="field">		
						<p class="control">
							<button class="button is-primary" type="submit">Сохранить</button>
						</p>
					</div>
				</form>