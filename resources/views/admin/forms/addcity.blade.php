               <h3 class="title is-5">Add New City</h3>
				<form action="/admin/cities" enctype="multipart/form-data" method="POST">
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
						<label class="label">Timezone</label>
						<p class="control">
							<input class="input {{ $errors->has('timezone') ? ' is-danger' : '' }}" type="text" name="timezone" required>
						</p>
						 @if ($errors->has('timezone'))
                             <p class="help is-danger">
                                 {{ $errors->first('timezone') }}
                             </p>
                         @endif
					</div>
					
					<div class="field">		
						<p class="control">
							<button class="button is-primary" type="submit">Сохранить</button>
						</p>
					</div>
				</form>