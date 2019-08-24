<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
  protected $fillable = [

    'name',
    'ibge_code',
    'status',
    'state_id',
    'productive_region_id',

  ];

  public function farms()
  {
    return $this->hasMany(Farm::class);
  }

  public function productiveRegion()
  {
    return $this->belongsTo(ProductiveRegion::class);
  }
}
