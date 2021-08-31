<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Con_OfficePrice extends Model
{
    protected $table = 'jhay.linen_con_officeprice';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'officemats_id', 'item_price', 'price_stat'
    ];

    public function Con_Officeprice() {
        return $this->belongsTo('App\Con_OfficeMats','officemats_id','id');
      }
}
