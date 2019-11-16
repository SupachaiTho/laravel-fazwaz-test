<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'property_type' => $this->property_type_title,
            'status' => $this->status_title,
            'for_sale' => $this->for_sale_title,
            'for_rent' => $this->for_rent_title,
            'project' => $this->project_title,
            'country' => $this->country,
        ];
    }
}
