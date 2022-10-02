<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
class WishlistController extends Controller
{
    public function OutOfStock(Request $request){
        $id = $request ->user_id;
        $product_name= $request -> product_name;
       
        if(Wishlist::where('user_id', $id)->where('product_name', $product_name)->first() != NULL){
            return $result = 1;
        }
        else{
             $result = Wishlist::insert([
            'user_id' => $id,
            'product_name' => $product_name,
            'stock' => 0,
        ]);
        }
       

        return $result;
    }

    public function AddWishlist(Request $request){
        $id = $request ->user_id;
        $product_name= $request -> product_name;
       
        if(Wishlist::where('user_id', $id)->where('product_name', $product_name)->first() != NULL){
            return $result = 1;
        }
        else{
             $result = Wishlist::insert([
            'user_id' => $id,
            'product_name' => $product_name,
            'product_image_1' => $request->product_image_1,
        ]);
        }
       

        return $result;
    }
    public function AddToCart(Request $request){
        $id = $request ->user_id;
        $product_name= $request -> product_name;
        $product_image_1 = $request->product_image_1;
        $product_size= $request -> product_size;
        $product_pieces= $request -> product_pieces;
       
        if(Cart::where('user_id', $id)->where('product_name', $product_name)->where('product_size', $product_size)->first() != NULL){
            $product = Cart::where('user_id', $id)->where('product_name', $product_name)->where('product_size', $product_size)->first();
            $product->product_pieces = $product->product_pieces + $product_pieces;
            $product->save();
           
            return $result = 1; 
        }
        else{
             $result = Cart::insert([
            'user_id' => $id,
            'product_name' => $product_name,
            'product_image_1' => $product_image_1,
            'product_size' => $product_size,
            'product_pieces' => $product_pieces,
           
        ]);
        }
       

        return $result;
    }

    public function ViewWishlistAPI(Request $request, $id){
        $wishlist = Wishlist::latest()->where('user_id', $id)->paginate(6);
        return compact('wishlist');
    }
}
