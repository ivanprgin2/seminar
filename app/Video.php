<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    public function zanr()
		{
		return $this->belongsTo('App\Zanr');
		}

	 public function autor()
    {
        return $this->belongsTo('App\Autor');
    }
}
