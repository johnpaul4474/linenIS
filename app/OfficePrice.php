<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficePrice extends Model
{
    protected $table = 'jhay.linen_officeprice';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'officemats_id', 'item_price', 'price_stat'
    ];

    public function Officeprice() {
        return $this->belongsTo('App\OfficeMats','officemats_id','id');
      }
}
