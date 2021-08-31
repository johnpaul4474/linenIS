<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warddetails extends Model
{
    protected $table = 'jhay.linen_wardmatsdetails';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'wardmats_id', 'item_name', 'item_qty', 'item_unit', 'created_at'
    ];

    public function Warddetails() {
        return $this->belongsTo('App\WardMats','wardmats_id','id');
      }
}