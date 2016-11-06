<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table= 'autori';

	public function video()
		{
		return $this->hasMany('App\Video');
		}
}
