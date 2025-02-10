<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $unreadCount = auth()->user()->notifications->count();
        return view('order', compact('orders', 'unreadCount'));
    }

    public function shipOrder($orderId)
    {
        $order = Order::findOrFail($orderId);

        Mail::to($order->email)->send(new OrderShipped($order));

        return back()->with('success', 'Email thông báo đã được gửi!');
    }
}
