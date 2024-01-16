<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTreatmentPayment extends Model
{
    use HasFactory;

    protected $table = 'patient_treatments_payments';

    public function getPatientTreatment(){
        return $this->belongsTo('App\Models\PatientTreatment','patient_treatment_id','id');
    }
}
