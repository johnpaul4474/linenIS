<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Con_OfficeDetails extends Model
{
    protected $table = 'jhay.linen_con_officematsdetails';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'officemats_id', 'item_name', 'item_qty', 'item_unit'
    ];

    public function Con_OfficeDetails() {
        return $this->belongsTo('App\Con_OfficeMats','officemats_id','id');
      }
}
