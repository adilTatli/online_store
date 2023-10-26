<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

    public static function findOrNewCart($user)
    {
        $cart = self::firstOrNew(['user_id' => $user->id, 'status' => 'cart']);

        if (!$cart->exists) {
            $cart->save();
        }

        return $cart;
    }

    public static function findCartInStatus($user, $status = 'cart')
    {
        return self::where('user_id', $user->id)->where('status', $status)->first();
    }
}
