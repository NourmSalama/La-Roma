<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'id', 'reservation_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id' , 'product_id');
    }

    public function scopeOnlyCompletedOrders(Builder $builder)
    {
        return $builder->whereStatus(1);
    }
}
