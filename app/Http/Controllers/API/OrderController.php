<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Models\User; 
use App\Models\Order; 
use App\Models\CustomerOrder; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class OrderController extends Controller 
{
    public function orders(Request $request) 
    { 
        $header = $request->header('Authorization');
        $user = Auth::user();  
        $order_id= $request->order_id;
        $quantity= $request->quantity;
        $orders=Order::findOrFail($order_id);
        $stock = $orders->available_stock ;
      
        if($stock== 0 && $stock < $quantity)
        {
            $message = "“Failed to order this product due to unavailability of the stock”";
            $status=400;
        }

        else
        {
            $status=201;
            $stock = (int)$stock - (int)$quantity;
            $message = "You have successfully ordered this product";
             $inputs = [
                'user_id'=>Auth::user()->id,
                'order_id' =>$order_id,
                'quantity'=>$quantity,
        
            ];
            Order::where('id', $order_id)->update(['available_stock' =>  $stock]);
            CustomerOrder::insert($inputs);
        }

        return response()->json([

            'message' => $message,
            
        ], $status); 
    } 
 
}
