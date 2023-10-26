<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = CartItem::PendingOrdersForSeller($user)->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function confirmed()
    {
        $user = auth()->user();
        $confirmedOrders = CartItem::ConfirmedOrders($user)->paginate(10);

        return view('admin.orders.confirmed', compact('confirmedOrders'));
    }

    public function approved($id)
    {
        $order = Cart::findOrFail($id);
        $order->updateStatus('confirmed');

        return redirect()->route('admin.orders.index')->with('success', 'Заказ успешно подтвержден.');
    }

    public function reject($id)
    {
        $order = Cart::findOrFail($id);
        $order->updateStatus('rejected');

        return redirect()->route('admin.orders.index')->with('success', 'Заказ успешно отклонен.');
    }
}
