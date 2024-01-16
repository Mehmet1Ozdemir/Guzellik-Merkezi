<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contact';

    public function getCountry(){
        return $this->belongsTo('App\Models\Country','country_id','id');
    }

    public function getCity(){
        return $this->belongsTo('App\Models\City','city_id','id');
    }


}
