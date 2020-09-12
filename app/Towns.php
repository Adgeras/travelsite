<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Towns extends Model
{
    public $fillable = ['title', 'population', 'country_id'];

    public function country()
    {
        return $this->belongsTo('App\Countries');
    }
}
