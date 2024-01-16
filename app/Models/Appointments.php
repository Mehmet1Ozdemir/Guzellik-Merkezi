<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    public function getDentist(){
        return $this->belongsTo('App\Models\Dentist','dentist_id','id');
    }

}
