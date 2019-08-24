<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductiveRegion extends Model
{
  protected $fillable = [

    'name',
    'status',
    'state_id',

  ];

  public function counties()
  {
    return $this->hasMany(County::class);
  }

  public function state()
  {
    return $this->belongsTo(State::class);
  }

}
