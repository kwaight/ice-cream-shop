<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(OrderRequest $request)
    {
        // Add business logic verification on scoops per and required 1 scoop
        // Create order ID & subtotal records
        // Associate order_products
        // Trigger order completed email
        // respond 200
    }
}
