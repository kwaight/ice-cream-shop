<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Return all products grouped by type
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        return Product::all()->groupBy('type');
    }
}
