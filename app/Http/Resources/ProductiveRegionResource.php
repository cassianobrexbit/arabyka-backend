<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\State;

class ProductiveRegionResource extends JsonResource
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
        'state' => State::findOrFail($this->state_id),
        'counties' => $this->counties,

      ];
    }
}
