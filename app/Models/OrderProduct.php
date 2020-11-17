<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'order_id',
        'container_id',
        'created_at',
        'updated_at'
    ];
}
