<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'patients';

    public function getCountry(){
        return $this->belongsTo('App\Models\Country','country_id','id');
    }

    public function getCity(){
        return $this->belongsTo('App\Models\City','city_id','id');
    }

    public function getPatientTreatment(){
        return $this->hasMany('App\Models\PatientTreatment','patient_id','id');
    }
}
