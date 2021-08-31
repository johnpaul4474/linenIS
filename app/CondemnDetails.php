<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CondemnDetails extends Model
{
    protected $table = 'jhay.linen_deductWardInv';
    protected $primaryKey ='id';
    public $timestamps = false ;

    public function CondemnDetails()
    {
        return $this->belongsTo('App\Model\Wards');
    }
}
