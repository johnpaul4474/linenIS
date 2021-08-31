<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Con_WardDetails extends Model
{
    protected $table = 'jhay.linen_con_wardmatsdetails';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'wardmats_id', 'item_name', 'item_qty', 'item_unit'
    ];

    public function Con_WardDetails() {
        return $this->belongsTo('App\Con_WardMats','wardmats_id','id');
      }
}
