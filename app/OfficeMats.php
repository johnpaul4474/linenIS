<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeMats extends Model
{
    protected $table = 'jhay.linen_officemats';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'office_id', 'item_datereceived', 'created_at', 'updated_at'
    ];

    public function OfficePrice()
    {
        return $this->hasMany('App\OfficePrice','officemats_id','id');
    }

    public function OfficeDetails()
    {
        return $this->hasOne('App\OfficeDetails','officemats_id','id');
    }
}
