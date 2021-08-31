<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wardprice extends Model
{
    protected $table = 'jhay.linen_wardprice';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'wardmats_id', 'item_price', 'price_stat'
    ];

    public function Wardprice() {
        return $this->belongsTo('App\WardMats','wardmats_id','id');
      }
}