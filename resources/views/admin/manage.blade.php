   @extends('admin.layout')

   @section('content')
			<div class="columns">
				<div class="column is-4 box mr-1">
						<h3 class="title is-3">Cities</h3>
						@include('admin.list.cities')
						<hr>
						@include('admin.forms.addcity')
				</div>
				<div class="column is-4 box mr-1">
						<h3 class="title is-3">Districts</h3>
						@include('admin.list.districts')
						<hr>
						@include('admin.forms.add_district')
				</div>
				<div class="column is-4 box mr-1">
						<h3 class="title is-3">Groups</h3>
						@include('admin.list.groups')
						<hr>
						@include('admin.forms.addgroup')
				</div>
			</div>
			<div class="columns mt-2">
				<div class="column is-4 box mr-1">
						<h3 class="title is-3">ShopCategories</h3>
						@include('admin.list.shopcategories')
						<hr>
						@include('admin.forms.addshopcategory')
				</div>
				<div class="column is-4 box mr-1">
						<h3 class="title is-3">ProductCategories</h3>
						@include('admin.list.productcategories')
						<hr>
						@include('admin.forms.addproductcategory')
				</div>
				<div class="column is-4 box mr-1">
						<h3 class="title is-3">Units</h3>
						@include('admin.list.units')
						<hr>
						@include('admin.forms.addunit')
				</div>
			</div>

   @endsection