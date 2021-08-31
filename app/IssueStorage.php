<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueStorage extends Model
{
    protected $table = 'jhay.vw_linen_storage';
    protected $primaryKey ='id';
    public $timestamps = false ;
}
