<form action="/rates" method="POST">
				{{ csrf_field() }}
			 <div class="field">
			 	<label class="label">Выберите район:</label>		
				<p class="control">
					<span class="select">
						<select name="district_id" required>
							@foreach($districts as $district)
								<option value="{{$district->id}}">{{ $district->name}}</option>
							@endforeach
						</select>
					</span>
					
				</p>
			</div>
			<div class="field">		
				<label class="label">Цена:</label>
				<p class="control">
					<input class="input" type="text" name="cost" required>
				</p>
			</div>
			<div class="field">		
				<p class="control">
					<button type="submit" class="button is-primary">Сохранить</button>
				</p>
			</div>
</form>