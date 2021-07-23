<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        if ($productView = Redis::get("product:$product->id:view")) {
            return $productView;
        }

        $view = view('products.product', compact('product'))->render();
        $set = Redis::set("product:$product->id:view", $view, 'EX', config('cache.stores.redis.lifetime'));

        if ($set) {
            return $view;
        }

        abort(404);
    }
}
