<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hpersonal extends Model
{

  //use Notifiable;

  protected $table = 'hospital.dbo.hpersonal';

  protected $primaryKey ='employeeid';
  public $incrementing = false;
  public $timestamps = false ;


  public function User() {
    return $this->belongsTo('App\User','employeeid','employeeid');
  }
}
