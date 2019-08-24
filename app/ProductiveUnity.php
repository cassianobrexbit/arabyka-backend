<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Farm;
use App\User;

class ProductiveUnity extends Model
{
  protected $fillable = [

    'plant_date',
    'estimated_production',
    'variety',
    'planted_area',
    'lat',
    'long',
    'specie_id',
    //responsavel pelo cadastro
    'insert_user_id',
    //responsavel tecnico da propriedade
    'technical_manager_id',
    //fazenda
    'farm_id',
    'status',

  ];

  public function farm()
  {
    return $this->belongsTo(Farm::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
