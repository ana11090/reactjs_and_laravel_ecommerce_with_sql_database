<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Metal;
use App\Models\MainStone;
use App\Models\SecondStone;
use App\Models\Product;
use App\Models\Bracelets_filter;
use App\Models\Earings_filter;
use App\Models\Rings_filter;
use App\Models\Tiaras_filter;
use App\Models\Necklaces_filter;
use App\Models\Inventory;
use App\Models\InvenotoryHistory;
use App\Models\TimeActivityProduct;
use Illuminate\Support\Carbon;
use App\Exceptions\Handler;
class RecomandationController extends Controller
{
    public function RecomandationAPI(Request $request, $id){
        $product = Product::find($id);
        $product_1 = Product::where('product_category', $product->product_category)->inRandomOrder()->first();

        if($product->product_category  == "Earrings" ){
            $product_2 = Earings_filter::where('earings_filter_style', $product->earings_filter_style)->inRandomOrder()->first();

        }
        if($product->product_category  == "Rings" ){
         
            $product_2= Rings_filter::where('ring_filter_style', $product->ring_filter_style)->inRandomOrder()->first();}        
        if($product->product_category  == "Necklaces" ){
            try {
                $product_2 = Necklaces_filter::where('necklace_filter_style', $product->necklace_filter_style)->inRandomOrder()->first();  

            } catch(Exception $e)  {
             
                $product_2 = Product::where('product_category', $product->product_category)->inRandomOrder()->first();

            }}
        if($product->product_category  == "Bracelets" ){
            $product_2 = Bracelets_filter::where('bracelet_filter_type', $product->bracelet_filter_type)->inRandomOrder()->first();
        }
        if($product->product_category  == "Tiaras" ){
            $product_2 = Tiaras_filter::where('tiara_filter_style', $product->tiara_filter_style)->inRandomOrder()->first();
        }

        $product_3 = MainStone::where("product_name", $product->product_name)->where('main_stone_type', $product->main_stone_type)->inRandomOrder()->first();

        if($product_2==null){
            $product_2 = Product::where('product_category', $product->product_category)->inRandomOrder()->first();
        }
        if($product_3==null){
            $product_3 = Product::where('product_category', $product->product_category)->inRandomOrder()->first();
        }
       
        $products = compact(['product_1','product_2','product_3']);
        return compact(['product_1','product_2','product_3']);
    }

}
