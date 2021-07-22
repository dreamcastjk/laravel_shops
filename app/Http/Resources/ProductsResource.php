<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    private Product $product;

    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->product = $this->resource;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->product->id,
            'title' => $this->product->title,
            'slug' => $this->product->slug,
            'description' => $this->product->description,
            'count' => $this->product->count,
            'price' => $this->product->price,
            'category' => new CategoriesResource($this->product->category),
            'options' => new OptionsCollection($this->product->options),
        ];
    }
}
