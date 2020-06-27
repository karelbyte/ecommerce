<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' =>  number_format($this->price, 2, '.', ''),
            'status' => $this->status,
            'media' => count($this->media) > 0 ? $this->media[0]->getUrl() : ''
        ];
    }
}
