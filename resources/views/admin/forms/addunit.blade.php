               <h3 class="title is-5">Add New Unit</h3>
				<form action="/admin/units" enctype="multipart/form-data" method="POST">
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
						<label class="label">Короткое название</label>
						<p class="control">
							<input class="input {{ $errors->has('short_name') ? ' is-danger' : '' }}" type="text" name="short_name" required>
						</p>
						 @if ($errors->has('short_name'))
                             <p class="help is-danger">
                                 {{ $errors->first('short_name') }}
                             </p>
                         @endif
					</div>
					
					<div class="field">		
						<p class="control">
							<button class="button is-primary" type="submit">Сохранить</button>
						</p>
					</div>
				</form>