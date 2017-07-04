<?php

namespace App\Http\Controllers;

use Image;
use App\Rate;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class ShopAdminController extends Controller
{
     public function orders()
    {
        $orders = auth()->user()->shopOrders ;
        
        return view('shopadmin.orders', compact('orders'));
    } 

    // SHOW SHOP ORDER
    public function order(Order $order)
    {
        $this->authorize('view', $order);
        return view('shopadmin.order', compact('order')); 
    } 

    
    public function products()
    {
    	$products = auth()->user()->products;

    	return view('shopadmin.products',compact('products'));
    }

    
    public function createProduct ()
    {
      return view('shopadmin.forms.createproduct');
    } 

    
     public function saveProduct()
     {
        
        
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'unit' => 'required', 
            'photo' => 'required|image',
            'category' =>'required'           
        ]);
     	
        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'unit_id' => request('unit'),
            'price' => request('price'),
            'photo_path' => $this->savePhotos(request('photo'), 'photos'),
            'shop_id' => auth()->user()->shops[0]->id,
            'product_categories_id' => request('category'),
            'is_active' => true
            ]);

        $this->clearCache();

        return back()->with('flash', 'Продукт сохранен');
     } 

     public function clearCache ()
     {
        $key = auth()->user()->shops[0]->city->slug . '.' . auth()->user()->shops[0]->slug;
        cache()->forget($key);
     } 


     /**
     * 
     */
     public function updateProduct (Product $product)
     {
        $product->update([
                'name' => request('name'),
                'description'=>request('description'),
                'price'=>request('price'),
                'unit_id'=>request('unit_id'),
            ]);
        
        $this->clearCache();

         if (request()->expectsJson()) {
            return response(['status' => 'Продукт успешно отредактирован!']);
        }

        return back();

     } 

    public function savePhotos($file, $folder)
    {
         $path = $file->store($folder);
         return $path;

         // $thumb_path = str_replace('photos', 'app/photos/thumb', $path);
         // Image::make($file)->fit(480, 480)->save($thumb_path);
    }  

    
     public function activateProduct(Product $product)
     {
         $product->update(['is_active' => true]);
         $this->clearCache();
         if (request()->expectsJson()) {
            return response(['status' => 'Продукт успешно активирован!']);
        }
     }  

     public function deactivateProduct(Product $product)
     {
         $product->update(['is_active' => false]);
         $this->clearCache();
         if (request()->expectsJson()) {
            return response(['status' => 'Продукт деактивирован!']);
        }
     }  

    
    public function rates()
    {
        $shop = auth()->user()->shops->first();
        $rates = $shop->rates;
        $districts = $shop->city->districts;
        // dd($rates);
        return view('shopadmin.rates',compact('shop','districts','rates'));

    }


     public function saveRate ()
     {

         $shop = auth()->user()->shops->first();
         $rate = Rate::where('district_id',request('district_id'))
               ->where('shop_id', $shop->id)
               ->first(); 
               // dd($rate);
         if($rate) 
         {
            $rate->update(['cost' => request('cost')]);
            return back()->with('flash', 'Тариф обновлен!');
         }  

         $shop->rates()->create([
            'district_id' => request('district_id'),
            'cost'        => (int) request('cost')
            ]);

         return back();
     }  
}
