<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'jhay.linen_office';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'office_name'
    ];
}
