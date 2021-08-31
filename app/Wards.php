<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    protected $table = 'jhay.linen_ward';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'ward_name'
    ];

    public function Wards() 
    {
        return $this->hasMany('App\ViewWardDetails');
    }

    public function CondemnDetails() 
    {
        return $this->hasMany('App\CondemnDetails');
    }
}