<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    use HasFactory;

    protected $table = 'dentists';

    public function bloglar()
    {
        return $this->hasMany(Blog::class, 'dentist_id');
    }

    public function education(){
        return $this->hasMany(EducationAndExperience::class, 'dentist_id')->where('type','=', 0);
    }

    public function experience(){
        return $this->hasMany(EducationAndExperience::class, 'dentist_id')->where('type','=', 1);
    }

    public function serviceSpecialization(){
        return $this->hasMany(DentistServiceSpecialization::class, 'dentist_id');
    }

    public function dentistToSpecialisation(){
        return $this->belongsToMany(
            ServicesAndSpecializations::class,
            'dentist_services_specializations',
            'dentist_id',
            'service_spec_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }



}
