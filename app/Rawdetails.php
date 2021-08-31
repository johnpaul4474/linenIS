<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawdetails extends Model
{
    protected $table = 'jhay.linen_rawmatsdetails';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'rawmats_id', 'item_name', 'item_qty', 'item_unit'
    ];

    public function Rawdetails() {
        return $this->belongsTo('App\RawMats','raw_id','id');
      }
}