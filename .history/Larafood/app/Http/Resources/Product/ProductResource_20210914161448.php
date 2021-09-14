<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'categories' => $this->categories->name,
            'flag' => $this->flag,
            'image' => $this->image,
            'price' => $this->price,
            'description' => $this->description,
        ];
    }
}
