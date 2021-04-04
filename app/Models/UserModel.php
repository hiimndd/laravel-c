<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;






class UserModel extends Authenticatable
{

    use Notifiable;
    protected $table = 'user_models';
    protected $primaryKey = 'id';
    
    public function username()
    {
        return 'username';
    }
}
