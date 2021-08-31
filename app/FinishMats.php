<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishMats extends Model
{
    protected $table = 'jhay.linen_finishmats';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'rawmats_id', 'storage_id', 'item_datefinished', 'created_at', 'updated_at'
    ];

    public function Finishprice()
    {
        return $this->hasMany('App\Finishprice','finish_id','id');
    }

    public function Finishdetails()
    {
        return $this->hasOne('App\Finishdetails','finish_id','id');
    }
}