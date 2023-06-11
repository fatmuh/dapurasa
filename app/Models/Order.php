<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'product_id',
        'users_id',
        'quantity',
        'type_of_payment',
        'proof_of_payment',
        'delivery_address',
        'delivery_time',
        'status',
    ];

    protected $hidden;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
