<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    	'name', 'description', 'type', 'latitude', 'longitude',
    ];

    protected $casts = [
        'coords' => 'array'
    ];

    public function operators()
    {
    	return $this->belongsTo('App\Operator');
    }
}
