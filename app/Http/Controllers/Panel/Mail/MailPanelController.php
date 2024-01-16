<?php

namespace App\Http\Controllers\Panel\Mail;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\City;
use App\Models\Contacts;
use App\Models\Country;
use App\Models\Mail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MailPanelController extends Controller
{
    public function listContactMail()
    {
        $contactMail = Mail::get();
        return view('panel.pages.siteSettings.mail.mailList', compact('contactMail'));
    }

    public function fetch()
    {
        //iletişim Mail sayfası listesini döndüren fonksiyon
        $contacts = Mail::get();
        return DataTables::of($contacts)
            ->addColumn('detail', function ($data) {
                return '<a class="btn btn-info" href="' . route('panel.contactMailDetail', ['id' => $data->id]) . '">' . 'Detay</a>';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteContactMail(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['detail', 'delete'])
            ->make(true);
    }

    public function contactMailDetail(Request $request)
    {
        $contact = Mail::find($request->id);
        return view('panel.pages.siteSettings.mail.maildetail', compact('contact'));

    }

    function contactMailDelete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);
        Mail::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }
}
