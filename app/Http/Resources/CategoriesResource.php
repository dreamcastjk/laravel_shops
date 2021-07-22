<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    private Category $category;

    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->category = $this->resource;
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
            'id' => $this->category->id,
            'title' => $this->category->title,
            'slug' => $this->category->slug,
        ];
    }
}
