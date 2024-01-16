<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentistComment extends Model
{
    use HasFactory;

    protected $table = 'dentist_comment';

    protected $fillable = [
        'name', 'email', 'comments', 'dentist_id', 'stairs'
    ];
    public function dentist()
    {
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }
}
