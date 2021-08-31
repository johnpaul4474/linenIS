<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finishdetails extends Model
{
    protected $table = 'jhay.linen_finishmatsdetails';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'finishmats_id', 'item_name', 'item_qty', 'item_unit'
    ];

    public function Finishdetails() {
        return $this->belongsTo('App\FinishMats','finish_id','id');
      }
}