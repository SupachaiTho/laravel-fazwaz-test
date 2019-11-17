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
            'property_id' => $this->property_id,
            'property_title' => $this->property_title,
            'description' => $this->description,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'property_type_title' => $this->property_type_title,
            'status_title' => $this->status_title,
            'for_sale' => $this->for_sale,
            'for_rent' => $this->for_rent,
            'project_title' => $this->project_title,
            'country_title' => $this->country_title,
        ];
    }
}
