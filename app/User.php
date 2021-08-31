<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'hospital.dbo.user_acc';
    protected $primaryKey ='employeeid';
    public $incrementing = false;
    public $timestamps = false ;

    protected $hidden = [
        'user_pass',
    ];

    public function Hpersonal(){
        return $this->hasOne('App\Hpersonal','employeeid','employeeid');
    }

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
        parent::setAttribute($key, $value);
        }
    }
}
