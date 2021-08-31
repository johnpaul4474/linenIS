<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockRoom extends Model
{
    protected $table = 'jhay.linen_stockroom';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'room_name', 'created_at', 'updated_at'
    ];

    // public function subcat(){
    //     return $this->belongsTo('App\Storage', 'id');
    // }

}