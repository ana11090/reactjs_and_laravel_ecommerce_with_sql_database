<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Carbon;
use App\Models\Discount;
use App\Models\ClientCart;
use App\Models\Address;
use App\Models\Order;
use App\Models\Review;use DB;

class ClientController extends Controller
{
   
    public function ClientAccountAPI(){
       
        $client = Client::get();
        return compact('client');

    }

    public function EditClientPersonalInfo(Request $request){

        $id = $request->user_id;
        $result = Client::where('user_id', $id)->Update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'day_of_birth'  => $request->day_of_birth,
            'month_of_birth'  => $request->month_of_birth,
            'year_of_birth'  => $request->year_of_birth,
            'favorite_color'  => $request->favorite_color,
            'favorite_crystal'  => $request->favorite_crystal,
           
        ]);
    
        return $result;
    }

    public function OrdersAPI(Request $request, $id){
        $orders = Order::select(
            "order_id",
            DB::raw("SUM(product_final_price) as total"),"user_id", "created_at"
        )
        ->groupBy('order_id')->where("user_id", $id)->where('tracking','!=',"return")->groupBy('user_id')->groupBy('created_at')->latest()->get();
        return compact('orders');
    }

    public function ViewOrderAPI(Request $request, $id){
        $orders = Order::where('order_id', $id)->get();
        $one = Order::where('order_id', $id)->get()->first();
       $data= compact(['orders','one']);
       return compact('data');
    }

    public function ReturnsRequestAPI(Request $request, $id){
        $orders = Order::select(
            "order_id",
            DB::raw("SUM(product_final_price) as total"),"user_id", "created_at"
        )
        ->groupBy('order_id')->where("user_id", $id)->where('tracking',"return")->groupBy('user_id')->groupBy('created_at')->latest()->get();
        return compact('orders');
    }
    public function ReturnsAPI(Request $request, $id){
        $orders = Order::where('order_id', $id)->get();
        $one = Order::where('order_id', $id)->get()->first();
       $data= compact(['orders','one']);
       return compact('data');
    }
    
    public function ReturnRequestAPI(Request $request, $id){
        $orders = Order::where('order_id', $id)->update([
            'tracking' =>"return",
        ]);
        return $orders;
    }
   
    public function AddReview(Request $request, $id){
        $review = Review::insert([

            'product_id'=>$id,
            'user_id'=> $request->user_id,
            'title'=>$request->title,
            'text'=>$request->text,
            'created_at' => Carbon::now()
        ]);

        return $review;
    }

    public function ProductReviews(Request $request, $id){
        $reviews = Review::where('product_id', $id)->get();
        $review = Review::where('product_id', $id)->first();
        // $user = Client::where('user_id', $review->user_id)->get();
        $date = compact(['reviews']);
        return compact('date');
    }

        
}
