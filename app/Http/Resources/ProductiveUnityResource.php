<?php

namespace App\Http\Resources;

use App\user;
use App\Farm;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductiveUnityResource extends JsonResource
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
        'plant_date' => $this->plant_date,
        'estimated_production' => $this->estimated_production,
        'variety' => $this->variety,
        'planted_area' => $this->planted_area,
        'lat' => $this->lat,
        'long' => $this->long,
        'status' => $this->status,
        'specie_id' => $this->specie_id,
        'technical_manager_id' => $this->technical_manager_id,
        'farm_id' => Farm::findOrFail($this->farm_id),
        'insert_user_id' => User::findOrFail($this->insert_user_id),

      ];
    }
}
