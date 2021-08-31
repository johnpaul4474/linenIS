<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeDetails extends Model
{
    protected $table = 'jhay.linen_officematsdetails';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'officemats_id', 'item_name', 'item_qty', 'item_unit'
    ];

    public function OfficeDetails() {
        return $this->belongsTo('App\OfficeMats','officemats_id','id');
      }
}
