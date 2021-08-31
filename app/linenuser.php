<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linenuser extends Model
{

    protected $table = 'jhay.linen_user';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'employeeid', 'role_id'
    ];
}
