<?php

namespace App\Http\Controllers\Front\Dentist;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\DenstistWorkingHour;
use App\Models\Dentist;
use App\Models\DentistComment;
use Illuminate\Http\Request;

class DentistFrontController extends Controller
{
    public function dentistList()
    {
        $dentists = Dentist::get();
        $c = Contacts::first();
        return view('front.pages.dentists.dentists', compact('dentists','c'));
    }

    public function dentistDetails($id){
        $dentist = Dentist::find($id);
        $c = Contacts::first();

        $comments = DentistComment::where('dentist_id', $id)->where('status', 1)->get();

        $totalStars = 0;
        $totalComments = $comments->count();

        foreach ($comments as $comment) {
            $totalStars += $comment->stairs;
        }

        $averageStars = $totalComments > 0 ? $totalStars / $totalComments : 0;

        $dentist_working=DenstistWorkingHour::where('dentist_id',$id)->get();

        return view('front.pages.dentists.dentistsDetails', compact('c','dentist', 'comments', 'averageStars','dentist_working'));

    }




}
