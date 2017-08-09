   @extends('admin.layout')

   @section('content')
			<div class="columns">
				<div class="column is-4">
					@include('admin.forms.addcity')
					@include('admin.list.cities')
					<hr>
				</div>
				<div class="column is-4">
					@include('admin.forms.addgroup')
					@include('admin.list.groups')
					<hr>
				</div>
				<div class="column is-4">
					@include('admin.forms.add_district')
					@include('admin.list.districts')
					<hr>
				</div>
			</div>
			<div class="columns">
				<div class="column is-4">
					@include('admin.forms.addshopcategory')
					@include('admin.list.shopcategories')
				 	<hr>
				</div>
				<div class="column is-4">
					@include('admin.forms.addproductcategory')
					@include('admin.list.productcategories')
					<hr>
				</div>
				<div class="column is-4">
					@include('admin.forms.addunit')
					@include('admin.list.units')
					<hr>
				</div>
			</div>

   @endsection