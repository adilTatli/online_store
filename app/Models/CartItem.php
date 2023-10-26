<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function scopeConfirmedOrders($query, $user)
    {
        return $query->whereHas('cart', function ($query) {
            $query->where('status', 'confirmed');
        })->whereHas('product', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    public function scopePendingOrdersForSeller($query, $user)
    {
        return $query->whereHas('product', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('cart', function ($query) {
            $query->where('status', 'pending');
        });
    }
}
