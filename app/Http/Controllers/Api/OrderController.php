<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $user = auth()->user();

        $cart = Cart::findOrNewCart($user);

        $cart->items()->create(['product_id' => $product->id]);

        return response()->json(['message' => 'Товар успешно добавлен в корзину']);
    }

    public function checkout()
    {
        $user = auth()->user();

        $cart = Cart::findCartInStatus($user);

        if ($cart) {
            $cart->updateStatus('pending');
        }

        return response()->json(['message' => 'Заказ успешно оформлен']);
    }
}
