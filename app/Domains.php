<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domains extends Model
{
    protected $fillable = array('label');

    public function reputation()
    {
        return $this->belongsToMany(Reputations::class);
    }

    public function relations()
    {
        return $this->belongsToMany(Relations::class);
    }
}
