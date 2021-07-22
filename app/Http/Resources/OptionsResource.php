<?php

namespace App\Http\Resources;

use App\Models\Option;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionsResource extends JsonResource
{
    private Option $option;

    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->option = $this->resource;
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
            'id' => $this->option->id,
            'title' => $this->option->title,
            'slug' => $this->option->slug,
            'value' => $this->option->pivot->value
        ];
    }
}
