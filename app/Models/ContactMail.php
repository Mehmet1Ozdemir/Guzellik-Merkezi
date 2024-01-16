<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMail extends Model
{
    use HasFactory;
    protected $table = 'contacts_mail';


    public function sendContactMail()
    {
        try {
            \Illuminate\Support\Facades\Mail::to($this->email)->send(new \App\Mail\ContactMail($this));
            return response()->json(['Success' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['Error' => $e->getMessage()]);
        }
    }

}
