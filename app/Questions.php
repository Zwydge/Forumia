<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = array('content');

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function domains()
    {
        return $this->belongsToMany(Relations::class);
    }
}
