<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Con_WardMats extends Model
{
    protected $table = 'jhay.linen_con_wardmats';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'ward_id', 'item_datereceived', 'created_at', 'updated_at'
    ];

    public function Con_WardPrice()
    {
        return $this->hasMany('App\Con_WardPrice','wardmats_id','id');
    }

    public function Con_WardDetails()
    {
        return $this->hasOne('App\Con_WardDetails','wardmats_id','id');
    }
}
