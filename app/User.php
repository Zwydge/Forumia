<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use \Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected $fillable = array('id','name', 'username', 'email', 'password', 'roles_id', 'avatar');
=======
    protected $fillable = array('id','name', 'username', 'email', 'password', 'roles_id');
>>>>>>> 8920e49 (account management page creation and data update)
=======
    protected $fillable = array('id','name', 'username', 'email', 'password', 'roles_id');
>>>>>>> 543d51d (account management page creation and data update)
=======
    protected $fillable = array('id','name', 'username', 'email', 'password', 'roles_id', 'avatar');
>>>>>>> 8941bb2733aa58a88ad7dcff5af2d17244cc0420

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
