<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMats extends Model
{


    protected $table = 'jhay.linen_rawmats';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'storage_id', 'date_received','is_available', 'created_at', 'updated_at'
    ];

    public function Rawprice()
    {
        return $this->hasMany('App\Rawprice','rawmats_id','id');
    }

    public function Rawdetails()
    {
        return $this->hasOne('App\Rawdetails','rawmats_id','id');
    }
}