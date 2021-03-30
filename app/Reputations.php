<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reputations extends Model
{
    protected $fillable = array('reputation');

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function domains()
    {
        return $this->belongsToMany(Domains::class);
    }
}
