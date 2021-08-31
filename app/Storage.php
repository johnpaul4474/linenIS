<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table = 'jhay.linen_storage';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'stockroom_id', 'storage_name', 'created_at', 'updated_at'
    ];

}