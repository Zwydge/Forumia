<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = array('content');

    public function questions()
    {
        return $this->belongsToOne(Questions::class);
    }

    public function notations()
    {
        return $this->belongsToMany(Notations::class);
    }
}
