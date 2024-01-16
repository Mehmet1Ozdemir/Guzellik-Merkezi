<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientTreatment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'patient_treatments';


    public function getPatient(){
        return $this->belongsTo('App\Models\Patient','patient_id','id');
    }

    public function getPayments(){
        return $this->hasMany(PatientTreatmentPayment::class);
    }

    public function getDentist(){
        return $this->belongsTo('App\Models\Dentist','dentist_id','id');
    }
}
