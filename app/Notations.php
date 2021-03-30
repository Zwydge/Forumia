<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notations extends Model
{
    protected $fillable = array('like','dislike');

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Questions::class);
    }
}
