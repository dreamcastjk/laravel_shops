<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Services\ViewRedisHandler;

class ProductController extends Controller
{
    public function product(Product $product, ViewRedisHandler $viewRedisHandler): string
    {
        return $viewRedisHandler->handler($product->slug, function () use ($product) {
            return view('products.product', compact('product'))->render();
        });
    }
}
