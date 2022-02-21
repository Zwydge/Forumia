<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use \Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
    protected $fillable = array('id','name', 'username', 'email', 'password', 'roles_id', 'avatar');
=======
    protected $fillable = array('id','name', 'username', 'email', 'password', 'roles_id');
>>>>>>> 8920e49 (account management page creation and data update)

    public function reputations()
    {
        return $this->belongsToMany(Reputations::class);
    }

    public function roles()
    {
        return $this->belongsToOne(Roles::class);
    }

    public function notations()
    {
        return $this->belongsToMany(Notations::class);
    }
}
