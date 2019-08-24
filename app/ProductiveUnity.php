<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Farm;

class ProductiveUnity extends Model
{
  protected $fillable = [

    'specie_id',
    'plant_date',
    'estimated_production',
    'variety',
    'planted_area',
    'lat',
    'long',
    'technical_manager_id',
    'user_id',
    'farm_id',
    'status',

  ];

  public function farm()
  {
    return $this->belongsTo(Farm::class);
  }
}
