<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderCompleted;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function createOrder(OrderRequest $request)
    {
        $container = Product::findOrFail($request->get('container'));
        $toppings = collect($request->get('toppings'))->map(function($id) {
            return Product::findOrFail($id);
        });
        $scoops = collect($request->get('scoops'))->map(function($id) {
            return Product::findOrFail($id);
        });

        $total = $container->price
            + $toppings->pluck('price')->sum()
            + $scoops->pluck('price')->sum();

        // Email is sufficient for requirements
        $mailData = [
            'container' => $container->title,
            'scoops' => $scoops->pluck('title')->implode(', '),
            'toppings' => $scoops->pluck('title')->implode(', '),
            'subtotal' => $total,
            'total' => $total * 1.0825
        ];

         Mail::to($request->get('email'))->send(new OrderCompleted($mailData));

        // Trigger order completed email
        return response()->json(['message' => 'success'], 200);
    }
}
