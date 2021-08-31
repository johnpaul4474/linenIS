<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Con_WardPrice extends Model
{
    protected $table = 'jhay.linen_con_wardprice';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'wardmats_id', 'item_price', 'price_stat'
    ];

    public function Con_WardPrice() {
        return $this->belongsTo('App\Con_WardMats','wardmats_id','id');
      }
}
