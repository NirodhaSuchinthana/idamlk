<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictArea extends Model
{
	protected $fillable = [
		'name', 'hits'
	];

	// district associated with the area
    public function district()
    {
        return $this->belongsTo('App\District');
    }
}
