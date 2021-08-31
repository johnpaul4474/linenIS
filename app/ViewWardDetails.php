<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewWardDetails extends Model
{
    protected $table = 'jhay.vw_linenWardDetails';
    protected $primaryKey ='id';
    public $timestamps = false ;

    public function wardsDetails()
    {
        return $this->belongsTo('App\Model\Wards');
    }
}
