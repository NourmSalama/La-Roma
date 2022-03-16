<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getTotalPriceAttribute()
    {
        $orders = $this->orders()->onlyCompletedOrders()->get();
        $price = 0;
        foreach ($orders as $order) {
            $price += $order->product->price;
        }
        return $price;
    }
}

