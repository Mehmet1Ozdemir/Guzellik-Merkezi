<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Dentist;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class IndexPanelController extends Controller
{
    public function index(){
        $dentist_count = Dentist::count();
        $patient_count = Patient::count();

        $authUser = Auth::user();
        $appointment_count = Appointments::where('is_attended',0)->count();


        return view('panel.pages.index',compact('dentist_count','patient_count','authUser','appointment_count'));

    }
}
