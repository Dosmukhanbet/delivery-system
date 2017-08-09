<?php

use App\User;
use App\Order;
use App\Country;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
Route::post('verifynumber', 'VerificationController@verify');

Route::get('/', function () {
	// dd(\Request::ip());
    return redirect('cities/aktobe');
});
Route::get('/home', 'HomeController@index')->name('home');


Route::get('cities/{city}', 'CitiesController@show');


// Shop
Route::get('cities/{city}/{category}/shops', 'ShopsController@index')->name('shops');
Route::get('cities/{city}/shops/{shop}', 'ShopsController@show')->name('shop');

// ShopOrder
Route::get('orders/{order}/', 'ShopAdminController@order')->middleware('auth', 'shop');
Route::get('orders', 'ShopAdminController@orders')->middleware('auth', 'shop');

// Products	
Route::get('products', 'ShopAdminController@products')->middleware('auth', 'shop');
Route::get('products/create', 'ShopAdminController@createProduct')->middleware('auth', 'shop');
Route::post('products', 'ShopAdminController@saveProduct')->middleware('auth', 'shop');
Route::patch('products/{product}', 'ShopAdminController@updateProduct')->middleware('auth', 'shop');
Route::get('rates', 'ShopAdminController@rates')->middleware('auth', 'shop');
Route::post('rates', 'ShopAdminController@saveRate')->middleware('auth', 'shop');
Route::post('products/{product}/activate','ShopAdminController@activateProduct')->middleware('auth', 'shop');
Route::delete('products/{product}/deactivate','ShopAdminController@deactivateProduct')->middleware('auth', 'shop');
Route::get('shop/profile', 'ShopAdminController@profile')->middleware('auth', 'shop');
Route::post('shop/updatepassword', 'ShopAdminController@updatepassword')->middleware('auth', 'shop');



//Partnership
Route::get('partnership', 'PartnershipController@offer');
Route::post('bepartner', 'PartnershipController@store');

 // deactivate() {
	// 			axios.delete('/products/' + this.productid + '/deactivate');
 //                this.active = false;
	// 		},
	// 		activate() {
	// 			axios.post('/products/' + this.productid + '/activate');
 //                this.active = true;

Route::post('orders', 'OrdersController@store');

Route::get('generatedata', 'FakeDatasController@generate');

Route::get('logout', function(){
   Auth::logout();
   return redirect('/login');
})->name('logout');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){
		Route::get('manage','AdminController@manage');
		Route::post('cities','AdminController@storeCity');
		Route::post('districts','AdminController@storeDistrict');
		Route::post('groups','AdminController@storeGroup');
		Route::post('shopcategories','AdminController@storeShopCategory');
		Route::post('productcategories','AdminController@storeProductCategory');
		Route::post('units','AdminController@storeUnit');

		Route::get('shops', 'AdminController@shops');
		Route::post('shops', 'AdminController@storeShop');

});

Route::group(['prefix' => 'customer', 'middleware' => ['auth','customer']], function(){
		Route::get('orders','CustomerController@orders');
		Route::get('profile','CustomerController@profile');
		Route::get('feedbacks','CustomerController@feedbacks');
		Route::post('leavefeedback','CustomerController@saveFeedback');
});

Route::get('emailtest', function(){
	$admin = User::where('type', 'admin')->first();

    $order = Order::find(1)->first();

    Mail::to($admin)->send(new OrderCreated($order));
});

Route::get('updatepass', function(){
	$user = User::where('mobile_number', +77026253252)->first();
	$user->update(['password' => bcrypt(123456)]);

});

Route::get('createadmin', function() {
 User::create([
 	'name' => 'Dos',
 	'password' => bcrypt(995253),
 	'email' => 'dosmukhanbet@gmail.com',
 	'mobile_number' => '+77078835953',
 	'type' => 'admin'
 	]);

 Country::create([
 	'name' => 'Казахстан',
 	'slug' => 'kaz',
 	'language' => 'kz'
 	]);
});
