<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use App\User;
use App\Customer;
use App\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{

	public function __construct()
	{
	             
	}  

	public function categories()
    {
    	return ShopCategory::all(['id' ,'name', 'slug', 'photo_path', 'thumbnail_path']);
    }  

    // 'https://zakaz.express/api/v1/cities/' + this.props.user.citySlug + '/categories/' + category.slug + '/shops' 
    public function shops(City $city, ShopCategory $category)
    {

       return  $category->shops()
                          ->where('city_id', $city->id)
                          ->get();

    }

    /**
    * Return Shop with products
    */
    public function shop($shopId)
    {
        $shop = Shop::where('id', $shopId)->first(['name']);

        return Response::json([
                 'shop' => $shop,
                 'products'=> $shop->products
         ], 200);
    } 

    public function cities()
    {
        return City::all(['id', 'name' , 'slug']);
    } 

    public function customer ()
    {
        $user = User::where('mobile_number', request('mobilenumber'))->first();
       
        if ( ! $user ) 
        {
            return $this->newCustomer();
        } 
        
        return $this->userAPI($user);

    }

    
    public function newCustomer()
    {
         $newUser = User::create([
                'name'          => request('username'),
                'mobile_number' => request('mobilenumber'),
                'type'          => 'customer', 
                'password'      => bcrypt(request('password')),
                'api_token'     => str_random(60)
            ]);

        $customer = Customer::create([
            'user_id' => $newUser->id,
            'delivery_address' => null, 
            'city_id' => request('cityId'),
            'email'  => request('email') ?: null,
            'ip_address' => request()->ip(),
            'photo_path' => request('photoPath') ?: null
            ]);


        return $this->userAPI($newUser);
    }

    
     public function userAPI(User $user)
     {
         return Response::json([
                 'name' => $user->name,
                 'mobile_number'=> $user->mobile_number,
                 'api_token' => $user->api_token,
                 'city_id'  => $user->customer->city_id,
                 'photo_path' => $user->customer->photo_path,
                 'citySlug' => $user->customer->city->slug,
         ], 200);
     }  

    
    
}
