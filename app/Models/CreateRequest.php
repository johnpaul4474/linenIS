<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreateRequest extends Model
{
  
    protected $table = 'jhay.linen_finishmats as tb1';
    protected $fillable = [
        'finishmats_id','item_name', 'item_qty'
    ];

    
}
