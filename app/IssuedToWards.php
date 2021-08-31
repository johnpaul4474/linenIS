<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssuedToWards extends Model
{
    protected $table = 'jhay.vw_linenIssuedDetails';
    protected $primaryKey ='id';
    public $timestamps = false ;
    
    public function Storage()
    {
        return $this->belongsTo('App\Storage', 'id');
    }

}
