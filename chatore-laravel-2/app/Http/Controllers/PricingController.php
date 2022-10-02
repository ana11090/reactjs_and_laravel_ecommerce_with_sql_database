<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Metal;
use App\Models\Product;
use App\Models\Bracelets_filter;
use App\Models\Earings_filter;
use App\Models\Rings_filter;
use App\Models\Tiaras_filter;
use App\Models\Necklaces_filter;
use App\Models\Inventory;
use App\Models\InvenotoryHistory;
use App\Models\TimeActivityProduct;
use App\Models\MainStone;
use App\Models\SalesGroup;
use App\Models\Discount;
use Illuminate\Support\Carbon;

class PricingController extends Controller
{
    public function ProductsPricing(){

        $products = Product::latest()->paginate(30);
        return view('admin.pricing.pricingProduct', compact('products'));
    }

    public function ProductsPricingProduct(){
        $categories = Product::select('product_category')->distinct()->get();
        $product_collection = Product::select('product_collection')->distinct()->get();
        $product_inventory = Product::select('product_inventory')->distinct()->get();

        $sales = SalesGroup::latest()->get();
        return view('admin.pricing.pricingGroup', compact('categories', 'product_collection', 'product_inventory' ,'sales'));
    }

    public function ProductsPricingMetal(){
        $metal_type = Metal::select('metal_type')->distinct()->get();
        $metal_plating = Metal::select('metal_plating')->distinct()->get();
        $metal_gr = Metal::select('metal_gr')->distinct()->get();

        $sales = SalesGroup::latest()->get();
        return view('admin.pricing.pricingMetal', compact('metal_type', 'metal_plating', 'metal_gr','sales'));
    }

    public function ProductsPricingMainStone(){
        $main_stone_type = MainStone::select('main_stone_type')->distinct()->get();
        $main_stone_color = MainStone::select('main_stone_color')->distinct()->get(); 
        $main_stone_gr = MainStone::select('main_stone_gr')->distinct()->get();
        $main_stone_shape = MainStone::select('main_stone_shape')->distinct()->get();

        $sales = SalesGroup::latest()->get();
        return view('admin.pricing.pricingMainStone', compact('main_stone_type','sales', 'main_stone_color', 'main_stone_gr', 'main_stone_shape' ));
    }

    public function EditProductsPricing(Request $request){
        $id = $request->product_id;
        $product = Product::find($id);
        $product_sale = $request->product_sale;
        $product->product_sale = $product_sale;
        $product->save();

        return redirect()->back()->with('success', 'Sale added!');
    }

    public function EditGroupPricing(Request $request){
            $validated = $request->validate([
                'sale' => 'required|numeric',
            
            ]
        );

        $table=$request->table; // the name of the row in the product table
        $category =$request->info;
        $sale = $request->sale;

        
        if(SalesGroup::latest()->where('criterion', '=' , $category)->first() == NULL){
            SalesGroup::insert([
                'criterion' => $category,
                'current_sale' => $request->sale,
            ]);
        }
        else{
            $condition = SalesGroup::latest()->where('criterion', '=' , $category)->first();
            $condition->current_sale = $sale;
            $condition->save();
            
        }
       
       

        $products = Product::latest()->where($table, '=' , $category)->Update([
            'product_sale' => $sale
           
        ]);

        return redirect()->back();
    }

    public function EditGroupPricingMetal(Request $request){
        $validated = $request->validate([
            'sale' => 'required|numeric',
        
        ]
    );

    $table=$request->table; // the name of the row in the product table
    $category =$request->info;
    $sale = $request->sale;

    
    if(SalesGroup::latest()->where('criterion', '=' , $category)->first() == NULL){
        SalesGroup::insert([
            'criterion' => $category,
            'current_sale' => $request->sale,
        ]);
    }
    else{
        $condition = SalesGroup::latest()->where('criterion', '=' , $category)->first();
        $condition->current_sale = $sale;
        $condition->save();
        
    }
   
   $metals = DB::table('metals')->where($table, $category)->get();
   //var_dump($metal);
   foreach( $metals as $metal){
       $id = Product::where('product_name', $metal->product_name)->Update([
        'product_sale' => $sale
       
    ]);
   }
   
    return redirect()->back();
    }   

    
    public function EditGroupPricingGr(Request $request){
        $validated = $request->validate([
            'new_min_gr' => 'required|numeric',
            'new_max_gr' => 'required|numeric',
        
        ]
    );

    $table=$request->table; // the name of the row in the product table
    $min_gr =$request->new_min_gr;
    $max_gr =$request->new_max_gr;
    $sale = $request->sale;

    $old_max_gr = $request->old_max_gr;
    $update = SalesGroup::where('max_gr', $old_max_gr)->where('criterion', $table)->update([
        'min_gr' => $request->new_min_gr,
        'max_gr' => $request->new_max_gr,
        'current_sale' =>$request->sale,
    ]);
   $table_name = $request->table_name;
   $metals = DB::table($table_name)->where($table, '=>', $min_gr)->where($table, '=<', $max_gr)->get();
   //var_dump($metal);
   foreach( $metals as $metal){
       $id = Product::where('product_name', $metal->product_name)->Update([
        'product_sale' => $sale
       
    ]);
   }
   
    return redirect()->back();
    }   

    public function EditGroupPricingMainStone(Request $request){
        $validated = $request->validate([
            'sale' => 'required|numeric',
        
        ]
        );

        $table=$request->table; // the name of the row in the product table
        $category =$request->info;
        $sale = $request->sale;


        if(SalesGroup::latest()->where('criterion', '=' , $category)->first() == NULL){
            SalesGroup::insert([
                'criterion' => $category,
                'current_sale' => $request->sale,
            ]);
        }
        else{
            $condition = SalesGroup::latest()->where('criterion', '=' , $category)->first();
            $condition->current_sale = $sale;
            $condition->save();
            
        }



        $products = DB::table('products')->where($table, '=' , $category)->first();
        $products->product_sale = $sale;
        $products->save();

        return redirect()->back();
        }

        public function Discount(){
            $discounts = Discount::get();
            return view('admin.pricing.discount', compact('discounts'));
        }

        public function AddDiscount(Request $request){
            Discount::insert([
                'discount_code' => $request->discount_code,
                'discount_procent' => $request->discount_procent,
                'discount_sum' => $request->discount_sum,
                'discount_apply_sale'=> $request->discount_apply_sale,	
                'discount_start'=>$request->discount_start,
                'discount_end' =>$request->discount_end,
                'discount_apply_for' =>$request->discount_apply_for,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Discount added');
        }

        public function DeleteDiscount($id){
            $delete = Discount::find($id)->Delete();
            return redirect()->back()->with('success', 'Discount deleted');
        }
}
