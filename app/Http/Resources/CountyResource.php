<?php

namespace App\Http\Resources;

use App\ProductiveRegion;
use Illuminate\Http\Resources\Json\JsonResource;

class CountyResource extends JsonResource
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
        'status' => $this->status,
        'ibge_code' => $this->ibge_code,
        'region' => ProductiveRegion::findOrFail($this->productive_region_id),
        'farms' => $this->farms,

      ];
    }
}
