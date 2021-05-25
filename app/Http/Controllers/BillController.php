<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function getList() {
    	$customer = DB::table('orders')
                        ->join('users', 'users.id', '=', 'orders.user_id')
                        ->select('orders.*', 'users.fullname as fullname', 'users.email as email', 'users.address as address', 'users.phone as phone')
                        ->orderBy('orders.id','desc')
                        ->get();

		return view('admin.bill.list',compact('customer'));

	}
	public function getEdit($id){
        $product = Product::find($id);
    	$product_image = Product::find($id)->product_image;
		$customerInfo = DB::table('orders')
                        ->join('users', 'users.id', '=', 'orders.user_id')
                        ->select('orders.*', 'users.fullname as fullname', 'users.email as email', 'users.address as address', 'users.phone as phone')
                        ->orderBy('orders.id','desc')
                        ->where('orders.id', '=', $id)
                        ->first();
        $billInfo = DB::table('orders')
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->leftjoin('products', 'order_details.product_id', '=', 'products.id')
                    ->where('orders.id', '=', $id)
                    ->select('orders.*', 'order_details.*', 'products.name as product_name')
                    ->get();
		return view('admin.bill.detail',compact('customerInfo','billInfo' ,'product','product_image'));
	}
	public function postEdit(Request $request, $id)
    {
        $bill = Order::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        return redirect()->route('admin.bill.list')->with(['flash_level'=>'success','flash_message'=>'Update Order Complete Success!']);
    }
    public function getDelete($id)
    {
        $bill = Order::find($id);
        $bill->delete();
        return redirect()->route('admin.bill.list')->with(['flash_level'=>'success','flash_message'=>'Delete Order Complete Success!']);
    }
}
