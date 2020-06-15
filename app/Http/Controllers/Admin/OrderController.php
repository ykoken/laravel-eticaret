<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sales\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('sales')
            ->join('users','users.id','=','sales.user_id')
            ->select('sales.id','users.name','sales.sales_code','sales.total_price','sales.status')
            ->get();
        return view('admin.order.list',compact('orders'));
    }

    public function checkOrder($id)
    {
        $saleUpdate = Sale::where('id',$id)->update(['status'=>1]);
        return response()->json([
            'message' => null,
            'success' => true
        ]);
    }
}
