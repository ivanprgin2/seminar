<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zanr extends Model
{
    protected $table= 'zanr';

    public function video()
    {
        return $this->hasMany('App\Video');
    }
}
