<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contacts;
use App\Models\Dentist;
use App\Models\Gallery;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index() {
        $dentists = Dentist::whereNull('deleted_at')->get();
        $blogs = Blog::all()->take(5);
        $c = Contacts::first();
        return view('front.pages.index', compact('blogs', 'dentists','c'));
    }


    public function aboutFront(){
        $c = Contacts::first();
        return view('front.pages.about.about',compact('c'));
    }



    public function plasticIndex(){

        $dentists = Dentist::whereNull('deleted_at')->where('unit_id',1)->get();
        $c = Contacts::first();

        return view('front.pages.services.plastic-surgery', compact( 'dentists','c'));

    }

    public function dermatologyIndex(){
        $dentists = Dentist::whereNull('deleted_at')->where('unit_id',2)->get();
        $c = Contacts::first();

        return view('front.pages.services.dermatology', compact( 'dentists','c'));

    }


    public function galleryIndex(){
        $photos = Gallery::get();



        return view('front.pages.gallery.gallery',compact('photos'));
    }

}
