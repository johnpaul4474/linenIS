<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finishprice extends Model
{
    protected $table = 'jhay.linen_finishprice';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'finishmats_id', 'item_price', 'price_stat'
    ];

    public function Finishprice() {
        return $this->belongsTo('App\FinishMats','finish_id','id');
      }
}