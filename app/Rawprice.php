<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawprice extends Model
{
    protected $table = 'jhay.linen_rawprice';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'rawmats_id', 'item_price', 'price_stat'
    ];

    public function Rawprice() {
        return $this->belongsTo('App\RawMats','rawmats_id','id');
      }
}