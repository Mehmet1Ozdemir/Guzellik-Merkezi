<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contacts;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\directoryExists;

class ContactsFrontController extends Controller
{
    public function listContact()
    {
        $c = Contacts::first();
        return view('front.pages.contact.contact', compact('c'));
    }

    public function saveContactMail(Request $request)
    {

            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'comments' => 'required',
            ], [
                'name.required' => 'İsim alanı zorunludur.',
                'email.required' => 'E-mail alanı zorunludur.',
                'subject.required' => 'Başlık alanı zorunludur.',
                'comments.required' => 'Açıklama alanı zorunludur.',
            ]);

            if ($validateData) {


                $security = new Security();

                $contactMail = new \App\Models\ContactMail();

                $contactMail->name = $security->ScriptStripper($request->name);
                $contactMail->email = $security->ScriptStripper($request->email);
                $contactMail->subject = $security->ScriptStripper($request->subject);
                $contactMail->comments = $security->ScriptStripper($request->comments);

                $contactMail->save();

                if($request->file){

                    if (!directoryExists(public_path() . '/contactFiles/')) {
                        mkdir(public_path() . '/contactFiles/', 0777, true);
                        if (!directoryExists(public_path() . '/contactFiles/' . $contactMail->id)) {
                            mkdir(public_path() . '/contactFiles/' . $contactMail->id, true);
                        }
                    }
                    $imageName = time() . rand(0, 100) . "." . $request->file->getClientOriginalExtension();
                    $contactMail->file = '/contactFiles/' . $contactMail->id . "/" . $imageName;
                    $contactMail->save();
                    $path = '/contactFiles/' . $contactMail->id;
                    $request->file->move(public_path($path), $imageName);
                }
                if ($contactMail->save()) {
                    try {
                    Mail::to('220541302@firat.edu.tr')->send(new ContactMail($contactMail));
                        return response()->json(['Success' => 'success']);
                    }
                    catch (\Exception $e) {
                            return response()->json(['Error' => $e->getMessage()]);
                    }
                } else {
                    return response()->json(['Error' => 'Veri tabanına kaydetme işlemi başarısız oldu']);
                }
            } else {
                return response()->json(['Error' => 'Gönderilen veriler eksik veya hatalı']);
            }

    }

}
