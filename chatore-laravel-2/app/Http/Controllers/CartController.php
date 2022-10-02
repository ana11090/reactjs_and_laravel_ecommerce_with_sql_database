<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Discount;
use App\Models\ClientCart;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use DB;

class CartController extends Controller
{
    public function AddToCartAPI(Request $request){
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

    public function FinalCartViewAPI(Request $request, $id){
        $products = Cart::where('user_id', $id)->get();
        return compact('products');
    }

    public function PricesAPI(){
        $product = Product::get();
        $inventory = Inventory::get();
        $products = compact(['product', 'inventory']);
        return compact('products');
    }

    public function InventoryAPI(){

    }

    public function PieceMinusAPI(Request $request, $id){
        $invenotry = $request->invenotry;
        $product_pieces = $request->product_pieces;
        $condition = $product_pieces-1;
        if($condition!=0){
            $result = Cart::find($id)->Update([
                        'product_pieces' => $request->product_pieces -1,
                    
                    ]);
        }
        

        return $result;
    }

    public function PiecePlusAPI(Request $request, $id){

        $invenotry = $request->invenotry;
        $product_pieces = $request->product_pieces;
        $condition = $product_pieces-1;
        if($condition<$invenotry){
            $result = Cart::find($id)->Update([
                        'product_pieces' => $request->product_pieces +1,
                    
                    ]);
        }

        return $result;
    }

    public function DeleteProductCartAPI(Request $request, $id){
        $result = Cart::find($id)->delete();
        return $result;
    }

    public function GetDiscountsAPI(){
        $discounts = Discount::get();
        return compact('discounts');
    }

    public function CartDiscountsAPI(Request $request, $id){

        $discount_code = $request->discount_code;
        $discount = Discount::where('discount_code', $discount_code)->first();
       
       if(($discount->discount_start > Carbon::now()->toDateString())||(($discount->discount_end < Carbon::now()->toDateString()))){
            return 2;
       };

       if(($discount->discount_procent != null)&&($discount->discount_procent != 0)){
          $disc= $discount->discount_procent; 
          $dis = 0;
       }else{
            $dis = $discount->discount_sum;
            $disc = 0;
       }

       if(($discount->discount_apply_for != 'No')||(($discount->discount_apply_for != '1-client')&&($discount->nr_uses == 0))){
            $product = Cart::where('user_id', $id)->Update([
                        'discount_code' => $discount_code,
                        'discount_procent' => $disc,
                        'discount_sum' => $dis,
                    ]);
                    
                    $discount->nr_uses = $discount->nr_uses + 1;
                    $discount->save();

                    return $product;
       }   
    }

    public function ConfirmOrderCartAPI(Request $request, $id){

        $products = Cart::where('user_id', $id)->get();
        $address = Address::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            "phone" =>$request->phone,
            "country"=>$request->country,
            "county"=>$request->county,
            "city"=>$request->city,
            "postal_code"=>$request->postal_code,
            "street"=>$request->street
        ]);
            foreach($products as $product){
               $order = Order::create([
                    'user_id'=>$product->user_id,
                    'product_name'=>$product->product_name,
                    'product_image_1'=>$product->product_image_1,
                    'product_size'=>$product->product_size,
                    'product_pieces'=>$product->product_pieces,
                    'product_price'=>$product->product_price,
                    'product_sale'=>$product->product_sale,
                    'discount_code'=>$product->discount_code,
                    'product_final_price'=>$product->product_final_price,
                    'id_address'=>$product->id_address,
                    'discount_procent'=>$product->discount_procent,
                    'discount_sum'=>$product->discount_sum,
                    'tracking'=> 'pending',
                    'created_at'=>Carbon::now()
                ]);
            }
            $time= $order->created_at;
            $items = $request->items; 
            $order_id=0;
           $a =0;

          
            foreach((array)$items as $key => $item){
               $product_name = $item['product_name'];  
                $user_id = $item['user_id']; 
               $order_id = $item['order_id']; 
                $orderComplete = Order::where('user_id', $user_id)->where('created_at', $time)->Update([
                    'order_id' => $order_id,
                    'product_price'=>$item['product_price'],
                    'product_sale'=>$item['product_sale'],
                    'discount_procent'=>$item['discount_procent'],
                   'discount_sum'=>$item['product_discount_sum'],
                    'product_final_price'=> (float)$item['product_price'] 
                        - (float)$item['product_sale']
                        -(float)$item['product_price']*(float)$item['discount_procent']/100-(float)$item['product_discount_sum'],
                    'id_address'=>$address->id,
                    
                ]);
                 
            }       

          
            $result = Cart::where('user_id', $id)->delete();
            return $result;
            
    }

    public function PendingOrders(){
        $pendingOrders = Order::select(
            "order_id",
            DB::raw("SUM(product_final_price) as total"),"user_id", "created_at"
        )
        ->groupBy('order_id')->where("tracking", "pending")->groupBy('user_id')->groupBy('created_at')->latest()->get();
        return view("admin.orders.pending",compact('pendingOrders'));
    }

    public function PendingOrdersConfirmation(Request $request, $id){
        $order = Order::where('order_id', $id)->update([
            'tracking' => 'in progress',
            'updated_at' => Carbon::now()
        ]);

        return  redirect()->back()->with('success', 'Order in progress!');
    }

    public function ViewOrders(Request $request, $id){
        $orders = Order::where('order_id', $id)->get();
        $one = Order::where('order_id', $id)->get()->first();
        return view('admin.orders.view', compact('orders','one'));
    }

    public function PendingOrdersConfirmationTableDetailsRequest(Request $request, $id){
        $order = Order::where('order_id', $id)->update([
            'tracking' => 'in progress',
            'updated_at' => Carbon::now()
        ]);

        return  redirect()->to('/orders/pending');
    }

    public function ProcessingOrders(){
        $processingOrders = Order::select(
            "order_id",
            DB::raw("SUM(product_final_price) as total"),"user_id", "created_at"
        )
        ->groupBy('order_id')->where("tracking", "in progress")->groupBy('user_id')->groupBy('created_at')->latest()->get();
        return view("admin.orders.processing",compact('processingOrders'));
    }

    public function ProcessingOrdersConfirmation(Request $request, $id){
        $order = Order::where('order_id', $id)->update([
            'tracking' => 'completed',
            'updated_at' => Carbon::now()
        ]);

        return  redirect()->back()->with('success', 'Order is complete!');
    }

    public function ViewProcessingOrders(Request $request, $id){
        $orders = Order::where('order_id', $id)->get();
        $one = Order::where('order_id', $id)->get()->first();
        return view('admin.orders.viewProcessing', compact('orders','one'));
    }

    public function ProcessingOrdersConfirmationTableDetails(Request $request, $id){
        $order = Order::where('order_id', $id)->update([
            'tracking' => 'completed',
            'updated_at' => Carbon::now()
        ]);

        return  redirect()->to('/orders/processing');
    }

    
    public function CompletedOrders(){
        $completedOrders = Order::select(
            "order_id",
            DB::raw("SUM(product_final_price) as total"),"user_id", "created_at"
        )
        ->groupBy('order_id')->where("tracking", "completed")->groupBy('user_id')->groupBy('created_at')->latest()->get();
        return view("admin.orders.completed",compact('completedOrders'));
    }

    public function ViewCompletedOrders(Request $request, $id){
        $orders = Order::where('order_id', $id)->get();
        $one = Order::where('order_id', $id)->get()->first();
        return view('admin.orders.viewCompleted', compact('orders','one'));
    }

    public function Returns(){
        $returns = Order::select(
            "order_id",
            DB::raw("SUM(product_final_price) as total"),"user_id", "created_at"
        )
        ->groupBy('order_id')->where("tracking", "return")->groupBy('user_id')->groupBy('created_at')->latest()->get();
        return view("admin.orders.returns",compact('completedOrders'));
    }

    public function ViewReturns(Request $request, $id){
        $orders = Order::where('order_id', $id)->get();
        $one = Order::where('order_id', $id)->get()->first();
        return view('admin.orders.viewReturns', compact('orders','one'));
    }


    
}
