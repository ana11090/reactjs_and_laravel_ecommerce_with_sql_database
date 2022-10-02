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

class ProductController extends Controller
{
    public function AddProduct(){
        return view('admin.products.addProduct');
    }

    public function DeleteProduct($id){
        $delete = Product::find($id)->Delete();
        return redirect()->back()->with('success', 'Product deleted');
    }
    public function Logout(){
        Auth::Logout();
        return Redirect()->route('login')->with('success', 'user logout');
    }

    public function AllProduct(){
        $incompleteProducts = Product::latest()->where('product_state', 'incomplete')->get();
        $incomplete = Product::latest()->where('product_state', 'incomplete')->paginate(3);
        
        $allproductsProducts = Product::latest()->get();
        $allproducts = Product::latest()->paginate(10);

        $realeaseProducts = Product::latest()->where('product_state', 'Release soon')->get();
        $realease = Product::latest()->where('product_state', 'Release soon')->paginate(20);

        $activeProducts = Product::latest()->where('product_state', 'active')->get();
        $active = Product::latest()->where('product_state', 'active')->paginate(20);

        $inactiveProducts = Product::latest()->where('product_state', 'inactive')->get();
        $inactive = Product::latest()->where('product_state', 'inactive')->paginate(20);
        
        return view('admin.products.stateProduct', compact('incomplete', 'incompleteProducts', 'allproducts', 'allproductsProducts', 'realease', 
        'realeaseProducts','active', 'activeProducts', 'inactive', 'inactiveProducts'));
    }

    public function AddInfo($id){
        $productID = Product::find($id);
        //var_dump($productID->id);
        //$product = Product::where('id', '=', $productID->id)->get();
        $category = $productID->product_category;
      // var_dump($category);

        if($category == "Earrings")
          return view('admin.products.filter.infoProductEaring', compact('productID'));
        if($category == "Rings")
            return view('admin.products.filter.infoProductRing', compact('productID'));
        if($category == "Necklaces")
             return view('admin.products.filter.infoProductNecklace', compact('productID'));
         if($category == "Bracelets")
              return view('admin.products.filter.infoProductBracelet', compact('productID'));
         if($category == "Tiaras")
             return view('admin.products.filter.infoProductTiara', compact('productID'));
        
    }

    
    

    public function AddInfoStoreEarings(Request $request){

            $validatedData = $request->validate([
                'product_id' => 'required',
                'product_name' => 'required|unique:earings_filters|min:1',
                'earings_filter_lock' => 'required|min:1',
                'earings_filter_style' => 'required|min:1', 
               
                'pieces' => 'required|min:1', 
                'date_activation_product'=> 'required|min:1', 
                'time_activation_product' => 'required|min:1'     
            ]);


            Earings_filter::insert([
                'product_name' => $request->product_name,
                'earings_filter_lock' => $request->earings_filter_lock,
                'earings_filter_style' => $request->earings_filter_style,
                'created_at' => Carbon::now()
            ]);

            $id = $request->product_id;//var_dump($id);
            $productID = Product::find($id);
            $productID->product_state = "Release soon";
            

            $stock = $request->pieces;
            if($stock < 5){
                $stock = 'Low';
            }
            else if(($stock <= 5)||($stock >= 10)){
                $stock = 'Medium';
            }
            else
                $stock = 'High';

            $productID->product_inventory = $stock;
            $productID->save();


           Inventory::insert([
            'product_name' => $request->product_name,
            'size' => $request->size,
            'pieces' => $request->pieces,
            'created_at' => Carbon::now()
        ]);

        InvenotoryHistory::insert([
            'product_name' => $request->product_name,
            'size' => $request->size,
            'pieces' => $request->pieces,
            'created_at' => Carbon::now()
        ]);

        TimeActivityProduct::insert([ // cand produsul este publicat pe pagina site-ului
            'product_name' => $request->product_name,
            'date_activation_product' => $request->date_activation_product,
            'time_activation_product' => $request->time_activation_product,
            'created_at' => Carbon::now()
        ]);

           return redirect()->to('/product/state');
      
    }

    public function AddInfoStoreRings(Request $request){

        $validatedData = $request->validate([
            'product_id' => 'required',
            'product_name' => 'required|unique:rings_filters|min:1',
            'pieces' => 'required|min:1', 
            'date_activation_product'=> 'required|min:1', 
            'time_activation_product' => 'required|min:1'     
        ]);


        Rings_filter::insert([
            'product_name' => $request->product_name,
                'ring_filter_band' => $request->ring_filter_band,
                'ring_filter_style' => $request->ring_filter_style,
                'ring_filter_special' => $request->ring_filter_special,
                'ring_filter_gift' => $request->ring_filter_gift,
                'ring_filter_gift' => $request->ring_filter_gift,
                'created_at' => Carbon::now()
        ]);

        $id = $request->product_id;//var_dump($id);
        $productID = Product::find($id);
        $productID->product_state = "Release soon";
        

        $stock = $request->pieces;
        if($stock < 5){
            $stock = 'Low';
        }
        else if(($stock <= 5)||($stock >= 10)){
            $stock = 'Medium';
        }
        else
            $stock = 'High';

        $productID->product_inventory = $stock;
        $productID->save();


       Inventory::insert([
        'product_name' => $request->product_name,
        'size' => $request->size,
        'pieces' => $request->pieces,
        'created_at' => Carbon::now()
        ]);

        InvenotoryHistory::insert([
            'product_name' => $request->product_name,
            'size' => $request->size,
            'pieces' => $request->pieces,
            'created_at' => Carbon::now()
        ]);

        TimeActivityProduct::insert([ // cand produsul este publicat pe pagina site-ului
            'product_name' => $request->product_name,
            'date_activation_product' => $request->date_activation_product,
            'time_activation_product' => $request->time_activation_product,
            'created_at' => Carbon::now()
        ]);

        return redirect()->to('/product/state');
    
}

public function AddInfoStoreBracelets(Request $request){

    $validatedData = $request->validate([
        'product_id' => 'required',
        'product_name' => 'required|unique:rings_filters|min:1',
        'pieces' => 'required|min:1', 
        'date_activation_product'=> 'required|min:1', 
        'time_activation_product' => 'required|min:1'     
    ]);


    Bracelets_filter::insert([
        'product_name' => $request->product_name,
            'bracelet_filter_type' => $request->bracelet_filter_type,
            'bracelet_filter_style' => $request->bracelet_filter_style,
            'bracelet_filter_gift' => $request->bracelet_filter_gift,
            'created_at' => Carbon::now()
    ]);

    $id = $request->product_id;//var_dump($id);
    $productID = Product::find($id);
    $productID->product_state = "Release soon";
    

    $stock = $request->pieces;
    if($stock < 5){
        $stock = 'Low';
    }
    else if(($stock <= 5)||($stock >= 10)){
        $stock = 'Medium';
    }
    else
        $stock = 'High';

    $productID->product_inventory = $stock;
    $productID->save();


   Inventory::insert([
    'product_name' => $request->product_name,
    'size' => $request->size,
    'pieces' => $request->pieces,
    'created_at' => Carbon::now()
    ]);

    InvenotoryHistory::insert([
        'product_name' => $request->product_name,
        'size' => $request->size,
        'pieces' => $request->pieces,
        'created_at' => Carbon::now()
    ]);

    TimeActivityProduct::insert([ // cand produsul este publicat pe pagina site-ului
        'product_name' => $request->product_name,
        'date_activation_product' => $request->date_activation_product,
        'time_activation_product' => $request->time_activation_product,
        'created_at' => Carbon::now()
    ]);

    return redirect()->to('/product/state');

}

public function AddInfoStoreTiaras(Request $request){

    $validatedData = $request->validate([
        'product_id' => 'required',
        'product_name' => 'required|unique:rings_filters|min:1',
        'pieces' => 'required|min:1', 
        'date_activation_product'=> 'required|min:1', 
        'time_activation_product' => 'required|min:1'     
    ]);


    Tiaras_filter::insert([
        'product_name' => $request->product_name,
            'tiara_filter_style' => $request->tiara_filter_style,
            'created_at' => Carbon::now()
    ]);

    $id = $request->product_id;//var_dump($id);
    $productID = Product::find($id);
    $productID->product_state = "Release soon";
    

    $stock = $request->pieces;
    if($stock < 5){
        $stock = 'Low';
    }
    else if(($stock <= 5)||($stock >= 10)){
        $stock = 'Medium';
    }
    else
        $stock = 'High';

    $productID->product_inventory = $stock;
    $productID->save();


   Inventory::insert([
    'product_name' => $request->product_name,
    'size' => $request->size,
    'pieces' => $request->pieces,
    'created_at' => Carbon::now()
    ]);

    InvenotoryHistory::insert([
        'product_name' => $request->product_name,
        'size' => $request->size,
        'pieces' => $request->pieces,
        'created_at' => Carbon::now()
    ]);

    TimeActivityProduct::insert([ // cand produsul este publicat pe pagina site-ului
        'product_name' => $request->product_name,
        'date_activation_product' => $request->date_activation_product,
        'time_activation_product' => $request->time_activation_product,
        'created_at' => Carbon::now()
    ]);

    return redirect()->to('/product/state');

}

public function AddInfoStoreNecklaces(Request $request){

    $validatedData = $request->validate([
        'product_id' => 'required',
        'product_name' => 'required|unique:rings_filters|min:1',
        'pieces' => 'required|min:1', 
        'date_activation_product'=> 'required|min:1', 
        'time_activation_product' => 'required|min:1'     
    ]);


    Necklaces_filter::insert([
        'product_name' => $request->product_name,
            'necklace_filter_lenght' => $request->necklace_filter_lenght,
            'necklace_filter_style' => $request->necklace_filter_style,
            'necklace_filter_gift' => $request->necklace_filter_gift,
            'created_at' => Carbon::now()
    ]);

    $id = $request->product_id;//var_dump($id);
    $productID = Product::find($id);
    $productID->product_state = "Release soon";
    

    $stock = $request->pieces;
    if($stock < 5){
        $stock = 'Low';
    }
    else if(($stock <= 5)||($stock >= 10)){
        $stock = 'Medium';
    }
    else
        $stock = 'High';

    $productID->product_inventory = $stock;
    $productID->save();


   Inventory::insert([
    'product_name' => $request->product_name,
    'size' => $request->size,
    'pieces' => $request->pieces,
    'created_at' => Carbon::now()
    ]);

    InvenotoryHistory::insert([
        'product_name' => $request->product_name,
        'size' => $request->size,
        'pieces' => $request->pieces,
        'created_at' => Carbon::now()
    ]);

    TimeActivityProduct::insert([ // cand produsul este publicat pe pagina site-ului
        'product_name' => $request->product_name,
        'date_activation_product' => $request->date_activation_product,
        'time_activation_product' => $request->time_activation_product,
        'created_at' => Carbon::now()
    ]);

    return redirect()->to('/product/state');

}
    public function AddInventoryEarings(Request $request){
        $productID = Product::find($id);

    }

    public function AllProductsAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->paginate(4);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');
    }

    public function AllRingsAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->where('product_category', 'Rings')->paginate(2);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');
    }

    public function AllEarringsAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->where('product_category', 'Earrings')->paginate(2);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');
    }

    public function AllNecklaceAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->where('product_category', 'Necklaces')->paginate(2);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');
    }
    public function AllBraceletAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->where('product_category', 'Bracelets')->paginate(2);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');
    }
    public function AllTiaraAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->where('product_category', 'Tiaras')->paginate(2);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');

    }
    public function AllSetAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->where('product_category', 'Sets')->paginate(2);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');
    }

    public function AllBookmarkAPI(Request $request){
        $product = Product::query()->latest()->where('product_state', 'active')->where('product_category', 'Bookmarks')->paginate(2);
        $inventory = Inventory::query()->get();
        return compact('product', 'inventory');
    }

    public function InventoryAPI(Request $request){
        $inventory = Inventory::query()->get();
        return compact('inventory');
    }

    public function TableProductsAPI(Request $request, $id){
        $id = Product::find($id);
        $mainStone = MainStone::where('product_name', $id->product_name)->get();
        $secondStone = SecondStone::where('product_name', $id->product_name)->get();
        $metal = Metal::where('product_name', $id->product_name)->get();
        $info = compact(['mainStone','secondStone','metal']);
        return compact('info');
    }

    public function ProductsDetailsAPI(Request $request, $id){
        $product = Product::find($id);
        return compact('product');
    }

    public function InactiveProduct(Request $request, $id){
        $inactive = Product::find($id);
        $inactive->product_state = 'inactive';
        $inactive->save();
        return redirect()->back()->with('success', 'The product was marked as inactive. It will not be show to clients now!');
    }

    public function ActiveProduct(Request $request, $id){
        $active = Product::find($id);
        $active->product_state = 'active';
        $active->created_at = Carbon::now()->toDateString();
        $active->save();
        return redirect()->back()->with('success', 'The product was marked as active. The clients will be able to view this product!');
    }

    public function ViewProductsProduct(Request $request){
        $products = Product::latest()->get();
        //var_dump($productID->id);
        //$product = Product::where('id', '=', $productID->id)->get();
        $rings = Product::where('product_category', 'Rings')->where('product_state', 'active')->latest()->paginate(10);
        $tiaras = Product::where('product_category', 'Tiaras')->where('product_state', 'active')->latest()->paginate(10);
        $earrings = Product::where('product_category', 'Earrings')->where('product_state', 'active')->latest()->paginate(10);
        $necklaces = Product::where('product_category', 'Necklaces')->where('product_state', 'active')->latest()->paginate(10);
        $bracelets = Product::where('product_category', 'Bracelets')->where('product_state', 'active')->latest()->paginate(10);
     
             return view('admin.products.view', compact('rings', 'tiaras', 'earrings', 'necklaces', 'bracelets'));
    }
    public function EditProductRings(Request $request, $id){
        $product = Product::find($id);
        $ring = Rings_filter::where('product_name', $product->product_name)->first();
        $ring = Rings_filter::find($ring->id);
        $main = MainStone::where('product_name', $product->product_name)->first();
        $second = SecondStone::where('product_name', $product->product_name)->first();
        $metal = Metal::where('product_name', $product->product_name)->first();
        return view('admin.products.edit.editProductRings', compact('product', 'ring', 'main', 'second', 'metal'));
    }

    public function EditProductRingsUpdate(Request $request, $id){
        $product = Product::find($id);
        $productUpdate = Product::where('id', $product->id)->Update([
            'product_name' => $request->product_name,
            'product_image_1'  => $request->product_image_1,
            'product_image_2' => $request->product_image_2,
            'product_image_3' => $request->product_image_3,
            'product_image_4' => $request->product_image_4,
            'product_category' => $request->product_category,
            'product_collection' => $request->product_collection,
            'product_variation' => $request->product_variation,
            'product_cost' => $request->product_cost,
            'product_price' => $request->product_price,
            'product_sale' => $request->product_sale,
            'product_description' => $request->product_description,
        ]);

        $ring = Rings_filter::where('product_name', $product->product_name)->first()->Update([
            'ring_filter_band' => $request->ring_filter_band,
            'ring_filter_style' => $request->ring_filter_style,
            'ring_filter_special' => $request->ring_filter_special,
            'ring_filter_gift' => $request->ring_filter_gift,
            'ring_filter_gift' => $request->ring_filter_gift,
        ]);

        $main = MainStone::where('product_name', $product->product_name)->first()->Update([
            'main_stone_type' => $request->main_stone_type,
            'main_stone_color' => $request->main_stone_color,
            'main_stone_carat' => $request->main_stone_carat,
            'main_stone_mm' => $request->main_stone_mm,
            'main_stone_gr' => $request->main_stone_gr,
            'main_stone_clarity' => $request->main_stone_clarity,
            'main_stone_cut' => $request->main_stone_cut,
            'main_stone_shape' => $request->main_stone_shape,
        ]);

        $second = SecondStone::where('product_name', $product->product_name)->first()->Update([
            'second_stone_type' => $request->second_stone_type,
            'second_stone_color' => $request->second_stone_color,
            'second_stone_carat' => $request->second_stone_carat,
            'second_stone_mm' => $request->second_stone_mm,
            'second_stone_gr' => $request->second_stone_gr,
            'second_stone_clarity' => $request->second_stone_clarity,
            'second_stone_cut' => $request->second_stone_cut,
            'second_stone_shape' => $request->second_stone_shape,
        ]);

        $metal = Metal::where('product_name', $product->product_name)->first()->Update([
            'metal_type' => $request->metal_type,
            'metal_plating' => $request->metal_plating,
            'metal_gr' => $request->metal_gr,
        ]);

        return redirect()->back()->with('success', 'The product was updated!');

    }

    public function ViewInventory(){
        $products = Inventory::latest() ->orderBy('product_name', 'asc')->get();
        return view('admin.products.inventory.view', compact('products'));
    }

    public function ViewInventoryProduct(Request $request, $id){
        $products = Inventory::where('product_name', $id)->get();
        $name = Inventory::where('product_name', $id)->first();

        return view('admin.products.inventory.viewProduct', compact('products','name'));
    }
    
    public function AddInventory(Request $request){
      
        InvenotoryHistory::insert([
            'product_name' => $request->product_name,
            'size' => $request->size,
            'pieces' => $request->pieces,
            'created_at' => Carbon::now()
        ]);

        $product = Inventory::where('product_name', $request->product_name)->where('size', $request->size)->first();
        if( isset($product)){
            $product->pieces= $product->pieces + $request->pieces;
            $product->save();

        }
        else{
            Inventory::insert([
                'product_name' => $request->product_name,
                'size' => $request->size,
                'pieces' => $request->pieces,
                'created_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('success', 'The inventory was updated!');

    }
}
