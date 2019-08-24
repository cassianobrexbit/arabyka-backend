<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $fillable = [
      'name',
      'code',
      'status',
      'country_id',
  ];

  public function country()
  {
    return $this->belongsTo(Country::class);
  }

  public function productiveRegions()
  {
    return $this->hasMany(ProductiveRegion::class);
  }

}
