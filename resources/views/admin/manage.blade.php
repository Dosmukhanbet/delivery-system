   @extends('admin.layout')

   @section('content')
			<div class="columns">
				<div class="column is-4">
					@include('admin.forms.addcity')
				</div>
				<div class="column is-4">
					@include('admin.forms.addgroup')
				</div>
				<div class="column is-4">
					@include('admin.forms.add_district')
				</div>
			</div>
			<div class="columns">
				<div class="column is-4">
					@include('admin.forms.addshopcategory')
				</div>
				<div class="column is-4">
					@include('admin.forms.addproductcategory')
				</div>
				<div class="column is-4">
					@include('admin.forms.addunit')
				</div>
			</div>

   @endsection