<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  
 public function index(Request $request)
{
    $orders = Order::when($request->status != null, function ($q) use ($request) {

        $q->where('status_message', $request->status);

    })->paginate(10);

    return view('admin.layout.order.index', compact('orders'));
}
    public function view($order_id)
    {
        $order = Order::where('id', $order_id)
            ->first();

        if ($order) {
            return view('admin.layout.order.view', compact('order'));
        } else {
            return redirect()->back();
        }
    }
    public function updatestatus(int $order_id, Request $request)
    {
        $order = Order::where('id', $order_id)
            ->first();

        if ($order) {
            $order->update([
                'status_message' => $request->status,
            ]);
            return redirect('admin/order/' . $order->id)->with('message', "update status");
        } else {
            return redirect()->back();
        }
    }

}
