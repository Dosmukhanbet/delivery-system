<?php

namespace App\Http\Controllers;

use App\City;
use App\Rate;
use App\Shop;
use App\Unit;
use App\User;
use App\Group;
use App\Country;
use App\Product;
use App\District;
use App\ShopCategory;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Faker;


class FakeDatasController extends Controller
{
		private $shop1;
		private $pc1;
		private $pc2;
       public function generate ()
       {
		      $country = $this->makeCountry();
		      $city = $this->makeCity($country);
		      $userShop = $this->makeUserShop();
		      $group = $this->makeGroup();
		      $shopCategory	 = $this->makeShopCategory($group);
		      $shop = $this->makeShop($city, $userShop, $shopCategory);
		      $district = $this->makeDistrict($city);
		      $unit = $this->makeUnit();
		      $rate = $this->makeRate($shop);
		      $this->makeProductCategory();
		      $this->makeProduct($shop, $unit);

       } 

       public function makeCountry ()
       {
       	 return  Country::create([ 
		       	  'name'     => 'Казахстан', 
		       	  'language' => 'kz',
		       	  'slug'     => 'kaz'
		       	  ]);
       } 

      		
       public function makeCity ($country)
       {

       			City::create([
       	 		'name' => 'Атырау',
       	 		'slug' => 'atyrau', 
       	 		'timezone' => 'Asia\Aqtobe',
       	 		'country_id' => $country->id
       	 		]); 

       	 		City::create([
       	 		'name' => 'Актау',
       	 		'slug' => 'aktau', 
       	 		'timezone' => 'Asia\Aqtobe',
       	 		'country_id' => $country->id
       	 		]); 



       	 	return City::create([
       	 		'name' => 'Актобе',
       	 		'slug' => 'aktobe', 
       	 		'timezone' => 'Asia\Aqtobe',
       	 		'country_id' => $country->id
       	 		]); 
       } 

       
       public function makeDistrict ($city)
       {
       	 District::create(
       	 	[ 
       	 	'name' => 'Жилянка/Нур Сити',
       	 	'city_id' => $city->id,
       	 	'makeShopCategory' => null
       	 	]);

       	 District::create(
       	 	[ 
       	 	'name' => 'Новая',
       	 	'city_id' => $city->id,
       	 	'makeShopCategory' => null
       	 	]);

       	 District::create(
       	 	[ 
       	 	'name' => 'Юго-Запад',
       	 	'city_id' => $city->id,
       	 	'makeShopCategory' => null
       	 	]);

       	 
       	 return District::create(
       	 	[ 
       	 	'name' => 'по городу',
       	 	'city_id' => $city->id,
       	 	'makeShopCategory' => null
       	 	]);
       } 

       /**
       * 
       */
       public function makeUnit ()
       {
       	 Unit::create(
       	 	[ 
       	 	'name' => 'ШТУКА',
       	 	'short_name' => 'ШТ.',
       	 	]);

       	Unit::create(
       	 	[ 
       	 	'name' => 'Порция',
       	 	'short_name' => 'порц.',
       	 	]);
       	 return Unit::create(
       	 	[ 
       	 	'name' => 'СЕТ',
       	 	'short_name' => 'СЕТ',
       	 	]);
       	
       } 

       /**
       * 
       */
       public function makeRate ($shop)
       {
       		$districts = District::all();

       		

       		foreach ($districts as $district)  {
       			Rate::create([
       				'district_id' => $district->id,
       				'shop_id'	  => $shop->id,
       				'cost'		  => rand(300, 1000)
       				]);
       			Rate::create([
       				'district_id' => $district->id,
       				'shop_id'	  => $this->shop1->id,
       				'cost'		  => rand(300, 1000)
       				]);
       		}
       } 

    
       public function makeUserShop()
       {
       	$faker =\Faker\Factory::create();
       		return User::create([
       			'name' => $faker->firstNameMale . ' '. $faker->lastName, 
       			'mobile_number' => '+' . 7701 . rand(1000000, 9999999),
       			'password' => bcrypt('secret'),
       			'type' => 'shop', 
       			'remember_token' => str_random(10)
       			]);
       } 

       
       public function makeGroup ()
       {
       	return Group::create(
       			[
       			'name' => 'Еда',
       			'slug' => 'Food',
       			'photo_path' => null,
       			'thumbnail_path' => null
       			]
       		);
       } 
       
       public function makeShopCategory ($group)
       {
       	ShopCategory::create(
       		[
       		'name' => 'Суши',
       		'group_id' => $group->id, 
       		'slug' => 'sushi', 
       		'photo_path' => null,
       		'thumbnail_path' => null
       		]);

       		ShopCategory::create(
       		[
       		'name' => 'Бургеры',
       		'group_id' => $group->id, 
       		'slug' => 'burgers', 
       		'photo_path' => null,
       		'thumbnail_path' => null
       		]);

       		return ShopCategory::create(
       		[
       		'name' => 'Шашлыки',
       		'group_id' => $group->id, 
       		'slug' => 'barbeque', 
       		'photo_path' => null,
       		'thumbnail_path' => null
       		]);
       } 

       public function makeShop ($city, $user, $shopCategory)
       {
       	 $this->shop1 = Shop::create([
       	 		'name' 			=> 'ТОО Adal',
       	 		'brand_name'    => 'Шашлычная Адал',
       	 		'slug'  	  	=> 'adal',
       	 		'email'			=> 'amina@mail.ru',
       	 		'min_order'		=> 2000,
       	 		'delivery_time' => 60,
       	 		'open_time'		=> '09:30',
       	 		'close_time'	=> '18:30',
       	 		'photo_path'    => null,
       			'thumbnail_path'=> null,
       			'user_id'		=> $user->id,
       			'city_id'		=> $city->id,
       			'active'		=> 0,
       			'address'		=> 'ул.Гришина, 28'

       		]);

       	 	return Shop::create([
       	 		'name' 			=> 'ТОО АМИНА',
       	 		'brand_name'    => 'Шашлычная СВЕЖАК',
       	 		'slug'  	  	=> 'svezhak',
       	 		'email'			=> 'amina@mail.ru',
       	 		'min_order'		=> 3000,
       	 		'delivery_time' => 90,
       	 		'open_time'		=> '09:30',
       	 		'close_time'	=> '18:30',
       	 		'photo_path'    => null,
       			'thumbnail_path'=> null,
       			'user_id'		=> $user->id,
       			'city_id'		=> $city->id,
       			'active'		=> 0,
       			'address'		=> 'ул.Богенбай-Батыра, 28'
       		]);

       } 

       
       public function makeProductCategory ()
       {
       		$this->pc1=ProductCategory::create(['name' => 'Пицца', 'icon' => null]);
       		$this->pc2=ProductCategory::create(['name' => 'Суши', 'icon' => null]);
       } 

       /**
       * 
       */
       public function makeProduct($shop, $unit)
       {
       	Product::create([
       		'name' => 'Суши Поцелуй гейшы',
       		'price'=> 1800,
       		'unit_id' => $unit->id,
       		'shop_id' => $shop->id,
       		'product_categories_id' => $this->pc1->id,
       		'photo_path'    => null,
       		'thumbnail_path'=> null
       		]);
       	Product::create([
       		'name' => 'Суши Филаделфия',
       		'price'=> 2400,
       		'unit_id' => $unit->id,
       		'shop_id' => $shop->id,
       		'product_categories_id' => $this->pc2->id,
       		'photo_path'    => null,
       		'thumbnail_path'=> null
       		]);
       	Product::create([
       		'name' => 'Пицца Маргарита',
       		'price'=> 1000,
       		'unit_id' => $unit->id,
       		'shop_id' => $shop->id,
       		'product_categories_id' => $this->pc1->id,
       		'photo_path'    => null,
       		'thumbnail_path'=> null
       		]);
       	Product::create([
       		'name' => 'Пицца Алматы',
       		'price'=> 1100,
       		'unit_id' => $unit->id,
       		'shop_id' => $shop->id,
       		'product_categories_id' => $this->pc1->id,
       		'photo_path'    => null,
       		'thumbnail_path'=> null
       		]);
       } 

}
