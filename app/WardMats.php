<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WardMats extends Model
{
    protected $table = 'jhay.linen_wardmats';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'ward_id', 'item_issued', 'created_at', 'updated_at'
    ];

    public function Wardprice()
    {
        return $this->hasMany('App\Wardprice','wardmats_id','id');
    }

    public function Warddetails()
    {
        return $this->hasOne('App\Warddetails','wardmats_id','id');
    }

    public function Wards()
    {
        return $this->hasOne('App\Wards', 'id','id');
    }
}