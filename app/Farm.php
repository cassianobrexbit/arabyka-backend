<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
  protected $fillable = [

    'farm_classification',
    'farm_denomination',
    'car_number',
    'incra_number',
    'irf_number',
    'farm_registry',
    'consumer_unity',
    'total_area',
    'lat',
    'long',
    'status',
    'county_id',
    'user_id',

  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function county()
  {
    return $this->belongsTo(County::class);
  }

  public function productiveUnities()
  {
    return $this->hasMany(ProductiveUnity::class);
  }

}
