<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'address', 'product_id', 'user_id', 'status'
    ];

    const PENDING_STATUS = 'pending';
    const DONE_STATUS = 'done';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
