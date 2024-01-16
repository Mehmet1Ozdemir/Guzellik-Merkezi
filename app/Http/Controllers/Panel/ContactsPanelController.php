<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ContactMail;
use App\Models\Contacts;
use App\Models\Country;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ContactsPanelController extends Controller
{
    public function fetch(){
        //iletişim sayfası listesini döndüren fonksiyon
        $contacts = Contacts::get();
        return DataTables::of($contacts)
            ->editColumn('address', function ($data) {
                return $data->address . " " . $data->town . " " . $data->getCity->name . " " . $data->zip_code . " " . $data->getCountry->name;
            })
            ->addColumn('detail', function ($data) {
                return '<a class="btn btn-info" href="' . route('panel.contactDetail', ['id'=>$data->id]) . '">' . 'Detay</a>';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteContact(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['address', 'detail', 'delete'])
            ->make(true);

    }

    public function listContact(){
        $countries = Country::get();
        return view('panel.pages.siteSettings.contact.contact',compact('countries'));
    }

    public function contactAdd(Request $request){
        //iletişim sayfası iletişim bilgileri ekleme fonksiyonu (create)
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'phone_1' => 'required',
            'email' => 'required | email',
            'address' => 'required',
        ],
            [
                'title.required' => 'Başlık alanı boş bırakılamaz.',
                'description.required' => 'Açıklama alanı boş bırakılamaz.',
                'email.required' => 'E-mail alanı boş bırakılamaz.',
                'email.email' => 'Lütfen E-mail alanı geçerli bir E-mail giriniz.',
                'address.required' => 'Adres alanı boş bırakılamaz.',
            ]
        );

        if($validatedData){

            $security = new Security();

            $contents = new Contacts();
            $contents->country_id = $security->scriptStripper($request->country_id);
            $contents->city_id = $security->scriptStripper($request->city_id);
            $contents->title = $security->scriptStripper($request->title);
            $contents->description = $security->scriptStripper($request->description);
            $contents->email = $security->scriptStripper($request->email);
            $contents->phone_1 = $security->scriptStripper($request->phone_1);
            $contents->phone_2 = $security->scriptStripper($request->phone_2);
            $contents->town = $security->scriptStripper($request->town);
            $contents->address = $security->scriptStripper($request->address);
            $contents->zip_code = $security->scriptStripper($request->zip_code);

            $contents->save();
            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => 'error']);
        }

    }

    public function contactDetail(Request $request){
        $countries = Country::get();
        $cities = City::get();
        $contact = Contacts::find($request->id);
        return view('panel.pages.siteSettings.contact.detail',compact('contact','countries','cities'));

    }

    public function contactUpdate(Request $request){
        //iletişim güncelleme fonksiyonu
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'phone_1' => 'required',
            'email' => 'required',
            'address' => 'required',
        ],
            [
                'title.required' => 'Başlık alanı boş bırakılamaz.',
                'description.required' => 'Açıklama alanı boş bırakılamaz.',
                'phone_1.required' => 'Telefon 1 alanı boş bırakılamaz.',
                'email.required' => 'E-mail alanı boş bırakılamaz.',
                'address.required' => 'Adres alanı boş bırakılamaz.',

            ]
        );



        if($validatedData){
            $security = new Security();

            $contents = Contacts::find($request->contactID);
            $contents->country_id = $security->scriptStripper($request->country_id);
            $contents->city_id = $security->scriptStripper($request->city_id);
            $contents->title = $security->scriptStripper($request->title);
            $contents->description = $security->scriptStripper($request->description);
            $contents->email = $security->scriptStripper($request->email);
            $contents->phone_1 = $security->scriptStripper($request->phone_1);
            $contents->phone_2 = $security->scriptStripper($request->phone_2);
            $contents->town = $security->scriptStripper($request->town);
            $contents->address = $security->scriptStripper($request->address);
            $contents->zip_code = $security->scriptStripper($request->zip_code);

            $contents->save();
            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => 'error']);
        }
    }

    function contactDelete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);
        Contacts::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }

    public function contactDownload(){
        if(Auth::user()){

            $contactID = \request('id');

            if(ContactMail::find($contactID) != null){

                $pdfdown=ContactMail::where('id',$contactID)->first();
                return response()->download(public_path($pdfdown->file));

            }else{
                return response()->json(['Error'=>'error']);
            }


        }else{
            return response()->json(['Error'=>'error']);
        }


    }

}
