<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class TechnicalManagerResource extends JsonResource
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
        'arabyka_credential' => $this->arabyka_credential,
        'councyl_register' => $this->councyl_register,
        'status' => $this->status,
        'user' => User::findOrFail($this->user_id),

      ];
    }
}
