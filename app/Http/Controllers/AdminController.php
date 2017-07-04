<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use App\Unit;
use App\User;
use App\Group;
use App\Country;
use App\Services\SMS;
use App\ShopCategory;
use App\ProductCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $smsAPI;

    public function __construct(SMS $smsAPI)
    {
        $this->smsAPI = $smsAPI;
    }

    public function manage()
    {
    	return view('admin.manage');
    }

    /**
    * Shops
    */
    public function shops ()
    {
        $shops = Shop::all()->groupBy('city_id');
        return view('admin.shops', compact('shops'));
    } 

    /**
    * Store Shop
    */
    public function storeShop()
    {
        $password = str_random(6);
        // dd(request()->all());
        $user = User::create(
            [ 
              'name' => request('username'), 
              'mobile_number' => request('mobile_number'),
              'password' => bcrypt($password),
              'type' => 'shop'
            ]);

        $this->smsAPI->send(request('mobile_number'), 'Ваш пароль - ' .$password);

        $shop = $user->shops()->create([
            'name' => request('name'),
            'brand_name' => request('brand_name'),
            'slug' => request('slug'),
            'email' => request('email'),
            'min_order' => request('min_order'),
            'delivery_time' => request('delivery_time'),
            'open_time' => request('open_time'),
            'close_time' => request('close_time'),
            'address' => request('address'),
            'description' => request('description'),
            'city_id' => request('city_id'),
            'photo_path' => $this->savePhotos(request('logo'), 'logos')
            ]);

          $shop->shopcategories()->toggle(request('shopcategories'));
        
    } 

     public function savePhotos($file, $destination)
    {
         $path = $file->store($destination);
         return $path;
    } 

    
    public function storeCity ()
    {
     	$country = Country::find(1);
     	$country->cities()->create([
     			'name' => request('name'),
     			'timezone' => request('timezone'),
     			'slug' => request('slug')
     		]);	

     	return back();
    } 

    public function storeDistrict ()
    {
     	$city = City::find(request('city_id'));
     	$city->districts()->create([
     			'name' => request('name')
     		]);	

     	return back();
    } 

    public function storeGroup ()
    {
     	Group::create([
     			'name' => request('name'),
     			'slug' => request('slug')
     		]);	

     	return back();
    }   

    
    public function storeShopCategory ()
    {
    	$group = Group::find(request('group_id'));

    	$group->shopCategories()->create([
    			'name' => request('name'),
     			'slug' => request('slug'),
                'photo_path' => $this->savePhotos(request('photo'), 'shopcategories'),
                'thumbnail_path' => $this->savePhotos(request('icon'), 'svg'),
     			]
    		);

    	return back();

    } 

    
    public function storeProductCategory ()
    {
    	ProductCategory::create([
     			'name' => request('name')
     		]);	

     	return back();
    	
    } 

   
    public function storeUnit ()
    {
    	Unit::create([
     			'name' => request('name'),
     			'short_name' => request('short_name')
     		]);	

     	return back();
    	
    } 
}
