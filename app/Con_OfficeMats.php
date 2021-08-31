<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Con_OfficeMats extends Model
{
    protected $table = 'jhay.linen_con_officemats';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'office_id', 'item_datereceived', 'created_at', 'updated_at'
    ];

    public function Con_OfficePrice()
    {
        return $this->hasMany('App\Con_OfficePrice','officemats_id','id');
    }

    public function Con_OfficeDetails()
    {
        return $this->hasOne('App\Con_OfficeDetails','officemats_id','id');
    }
}
