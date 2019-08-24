<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\County;
use App\User;

class FarmResource extends JsonResource
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
        'farm_classification' => $this->farm_classification,
        'farm_denomination' => $this->farm_denomination,
        'car_number' => $this->car_number,
        'incra_number' => $this->incra_number,
        'irf_number' => $this->irf_number,
        'farm_registry' => $this->farm_registry,
        'consumer_unity' => $this->consumer_unity,
        'total_area' => $this->total_area,
        'lat' => $this->lat,
        'long' => $this->long,
        'status' => $this->status,
        'county' => County::findOrFail($this->county_id),
        'owner' => User::findOrFail($this->user_id),
        'unities' => $this->productiveUnities,

      ];
    }
}
