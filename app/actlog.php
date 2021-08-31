<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actlog extends Model
{


    protected $table = 'jhay.linen_actlog';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'employeeid', 'act_details', 'created_at'
    ];
}