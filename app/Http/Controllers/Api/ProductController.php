<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductsResource;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function products(): JsonResource
    {
        return new ProductsCollection(Product::paginate());
    }

    public function product(Product $product): JsonResource
    {
        return new ProductsResource($product);
    }
}
