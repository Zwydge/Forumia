<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    public function domains()
    {
        return $this->belongsToMany(Domains::class);
    }

    public function answers()
    {
        return $this->belongsToMany(Answers::class);
    }
}
