<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getDomains(){
        $domains = DB::table('domains')
            ->select('*')
            ->orderBy('label', 'asc')
            ->get();
        return $domains;
    }
}
