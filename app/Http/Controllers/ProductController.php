<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ViewRedisHandler;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    public function product(Product $product, ViewRedisHandler $viewRedisHandler)
    {
        $viewRedisHandler->handler($product->slug, function () use ($product) {
            return view('products.product', compact('product'))->render();
        });

        return $viewRedisHandler->getValue();
    }
}
