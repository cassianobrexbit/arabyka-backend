<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

  protected $fillable = [
      'name',
      'code',
      'status',
  ];

  public function states()
  {
    return $this->hasMany(State::class);
  }

}
