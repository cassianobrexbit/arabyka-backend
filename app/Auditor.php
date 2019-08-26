<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
  protected $fillable = [

      'arabyka_credential',
      'user_id',
      'councyl_register',
      'status',
      'insert_user_id',
  ];

  public function user(){

    return $this->belongsTo(User::class);

  }
}
