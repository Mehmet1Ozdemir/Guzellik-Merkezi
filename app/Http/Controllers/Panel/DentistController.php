<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\Enum\ResponseCodes;
use App\Helpers\Response\SendResponse;
use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\DenstistWorkingHour;
use App\Models\Dentist;
use App\Models\DentistServiceSpecialization;
use App\Models\EducationAndExperience;
use App\Models\ServicesAndSpecializations;
use App\Models\Unit;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use function PHPUnit\Framework\directoryExists;
use function PHPUnit\Framework\isEmpty;

class DentistController extends Controller
{

    public function dentistList(){
        return view('panel.pages.dentistPages.dentistList');
    }

    public function dentistFetch(){
        //Dişçilerin listesini döndüren fonksiyon
        $dentists = Dentist::where('deleted_at',NULL)->get();
        return DataTables::of($dentists)
            ->addColumn('detail', function ($data) {
                $inputs = [
                    "id" => $data->id
                ];
                return '<a class="btn btn-info" href="' . route('panel.dentistDetail', ["data" => Security::encryptInputs($inputs)]) . '">' . 'Detay</a>';
            })
            ->addColumn('work_time', function ($data) {
                return "<button onclick='workTime(" . $data->id . ")' class='btn btn-success'>Çalışma Saatleri</button>";
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteDentist(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['detail','work_time', 'delete'])
            ->make(true);

    }

    public function dentistAdd(){
        $services = ServicesAndSpecializations::where('type',0)->get();
        $specializations = ServicesAndSpecializations::where('type',1)->get();
        $units = Unit::where('status',1)->get();
        return view('panel.pages.dentistPages.dentistProfileSettings',compact('services','specializations','units'));
    }

    public function dentistCreate(Request $request)
    {

        //Dişçi ekleme fonksiyonu (create)
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'unit_id' => 'required',
            'surname' => 'required',
            "photo"=>  "mimes:jpg,jpeg,png|max:2048"
        ],
            [
                'name.required' => 'Dişçi Adı boş bırakılamaz.',
                'unit_id.required' => 'Dişçi Birimi boş bırakılamaz.',
                'surname.required' => 'Dişçi Soyadı boş bırakılamaz.',
                'photo.mimes' => 'Fotoğraf jpg,jpeg,png formatında olmalıdır.',
                'photo.max' => 'Fotoğraf en fazla 2mb olabilir.',
            ]
        );
        if($validator->fails()){
            return redirect()->route('panel.dentistAdd')->withInput()->with('error',$validator->errors());
        }

        try {

            DB::transaction(function () use ($request) {
                $security = new Security();

                $dentist = new Dentist();
                $dentist->name = $security->scriptStripper($request->name);
                $dentist->unit_id = $security->scriptStripper($request->unit_id);
                $dentist->surname = $security->scriptStripper($request->surname);
                $dentist->title = $security->scriptStripper($request->title);
                $dentist->birth_date = $security->scriptStripper($request->birth_date);
                $dentist->phone_number = $security->scriptStripper($request->phone);
                $dentist->email = $security->scriptStripper($request->email);
                $dentist->gender = $security->scriptStripper($request->gender);
                $dentist->about = $security->scriptStripper($request->about_me);

                $dentist->save();

                if($request->photo){
                    if ($security->isImage($request->photo)["status"] != "ok") {
                        return redirect()->route('panel.dentistAdd')->with('error',"Fotoğraf doğru formatta değil.");
                    }

                    if (!directoryExists(public_path() . '/profilePictures/')) {
                        mkdir(public_path() . '/profilePictures/', 0777, true);
                        if (!directoryExists(public_path() . '/profilePictures/' . $dentist->id)) {
                            mkdir(public_path() . '/profilePictures/' . $dentist->id, true);
                        }
                    }
                    $imageName = time() . rand(0, 100) . "." . $request->photo->getClientOriginalExtension();
                    $dentist->profile_picture_path = '/profilePictures/' . $dentist->id . "/" . $imageName;
                    $dentist->save();
                    $path = '/profilePictures/' . $dentist->id;
                    $request->photo->move(public_path($path), $imageName);
                }


                if($request->services){
                    foreach ($request->services as $service) {
                        $dentistService = new DentistServiceSpecialization();
                        $dentistService->dentist_id = $dentist->id;
                        $dentistService->service_spec_id = $service;
                        $dentistService->save();
                    }
                }

                if($request->specializations) {
                    foreach ($request->specializations as $specialization) {
                        $dentistSpecialization = new DentistServiceSpecialization();
                        $dentistSpecialization->dentist_id = $dentist->id;
                        $dentistSpecialization->service_spec_id = $specialization;
                        $dentistSpecialization->save();
                    }
                }

                if($request->education_school_name[0]) {
                    foreach ($request->education_school_name as $key => $education) {
                        $dentistEducation = new EducationAndExperience();
                        $dentistEducation->name = $security->scriptStripper($request->education_school_name[$key]);
                        $dentistEducation->title = $security->scriptStripper($request->education_degree[$key]);
                        $dentistEducation->start_date = $security->scriptStripper($request->education_start_date[$key]);
                        $dentistEducation->due_date = $security->scriptStripper($request->education_due_date[$key]);
                        $dentistEducation->dentist_id = $dentist->id;
                        $dentistEducation->type = 0;
                        $dentistEducation->save();
                    }
                }

                if ($request->work_place_name[0]) {
                    foreach ($request->work_place_name as $key => $experience) {
                        $dentistExperience = new EducationAndExperience();
                        $dentistExperience->name = $security->scriptStripper($request->work_place_name[$key]);
                        $dentistExperience->title = $security->scriptStripper($request->work_title[$key]);
                        $dentistExperience->start_date = $security->scriptStripper($request->work_start_date[$key]);
                        $dentistExperience->due_date = $security->scriptStripper($request->work_due_date[$key]);
                        $dentistExperience->dentist_id = $dentist->id;
                        $dentistExperience->type = 1;

                        $dentistExperience->save();
                    }
                }
            });

        } catch (\Exception $e) {
            return redirect()->route('panel.dentistAdd')->with('error',"Kayıt yapılırken bir hata oluştu.");
        }
        return redirect()->route('panel.dentistAdd')->with('success',"Kayıt oluşturuldu.");
    }


    public function dentistDetail(Request $request){
        //Dişçilerin detay sayfasını döndüren fonksiyon
        $data = $request->data;
        $decryptedData = decrypt($data);
        $dentist = Dentist::find($decryptedData['id']);
        $educations = $dentist->education;
        $experiences = $dentist->experience;

        $services = ServicesAndSpecializations::where('type',0)->get();
        $specializations = ServicesAndSpecializations::where('type',1)->get();
        $units = Unit::where('status',1)->get();

        return view('panel.pages.dentistPages.dentistProfileUpdate',compact('dentist','data','educations','experiences','services','specializations','units'));
    }

    public function dentistUpdate(Request $request)
    {


        //Dişçi güncelleme fonksiyonu (update)
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'unit_id' => 'required',
            'surname' => 'required',
            "photo"=>  "mimes:jpg,jpeg,png|max:2048"
        ],
            [
                'name.required' => 'Dişçi Adı boş bırakılamaz.',
                'unit_id.required' => 'Dişçi Birimi boş bırakılamaz.',
                'surname.required' => 'Dişçi Soyadı boş bırakılamaz.',
                'photo.mimes' => 'Fotoğraf jpg,jpeg,png formatında olmalıdır.',
                'photo.max' => 'Fotoğraf en fazla 2mb olabilir.',
            ]
        );


        if($validator->fails()){
            return redirect()->route('panel.dentistDetail')->withInput()->with('error',$validator->errors());
        }
        $data = $request->data;

        try {

            DB::transaction(function () use ($request) {
                $security = new Security();

                $data = $request->data;
                $dentistId = decrypt($data);
                $dentist = Dentist::find($dentistId['id']);
                $dentist->name = $security->scriptStripper($request->name);
                $dentist->unit_id = $security->scriptStripper($request->unit_id);
                $dentist->surname = $security->scriptStripper($request->surname);
                $dentist->title = $security->scriptStripper($request->title);
                $dentist->birth_date = $security->scriptStripper($request->birth_date);
                $dentist->phone_number = $security->scriptStripper($request->phone);
                $dentist->email = $security->scriptStripper($request->email);
                $dentist->gender = $security->scriptStripper($request->gender);
                $dentist->about = $security->scriptStripper($request->about_me);

                $dentist->update();
                if($request->photo){

                    if ($security->isImage($request->photo)["status"] != "ok") {
                        return redirect()->route('panel.dentistDetail',compact('data'))->with('error',"Fotoğraf doğru formatta değil.");
                    }

                    if($dentist->profile_picture_path != null){
                        unlink(public_path($dentist->profile_picture_path));
                    }



                    if (!directoryExists(public_path() . '/profilePictures/')) {
                        mkdir(public_path() . '/profilePictures/', 0777, true);
                        if (!directoryExists(public_path() . '/profilePictures/' . $dentist->id)) {
                            mkdir(public_path() . '/profilePictures/' . $dentist->id, true);
                        }
                    }


                    $imageName = time() . rand(0, 100) . "." . $request->photo->getClientOriginalExtension();
                    $dentist->profile_picture_path = '/profilePictures/' . $dentist->id . "/" . $imageName;
                    $dentist->save();
                    $path = '/profilePictures/' . $dentist->id;
                    $request->photo->move(public_path($path), $imageName);
                }

                if($request->services){
                    DentistServiceSpecialization::where('dentist_id',$dentistId)->delete();
                    foreach ($request->services as $service) {
                        $dentistService = new DentistServiceSpecialization();
                        $dentistService->dentist_id = $dentist->id;
                        $dentistService->service_spec_id = $service;
                        $dentistService->save();
                    }
                }

                if($request->specializations) {

                    foreach ($request->specializations as $specialization) {
                        $dentistSpecialization = new DentistServiceSpecialization();
                        $dentistSpecialization->dentist_id = $dentist->id;
                        $dentistSpecialization->service_spec_id = $specialization;
                        $dentistSpecialization->save();
                    }
                }
                if($request->education_school_name) {

                    EducationAndExperience::where('dentist_id',$dentistId)->delete();
                    foreach ($request->education_school_name as $key => $education) {
                        $dentistEducation = new EducationAndExperience();
                        $dentistEducation->name = $security->scriptStripper($request->education_school_name[$key]);
                        $dentistEducation->title = $security->scriptStripper($request->education_degree[$key]);
                        $dentistEducation->start_date = $security->scriptStripper($request->education_start_date[$key]);
                        $dentistEducation->due_date = $security->scriptStripper($request->education_due_date[$key]);
                        $dentistEducation->dentist_id = $dentist->id;
                        $dentistEducation->type = 0;

                        $dentistEducation->save();
                    }
                }

                if ($request->work_place_name) {

                    foreach ($request->work_place_name as $key => $experience) {
                        $dentistExperience = new EducationAndExperience();
                        $dentistExperience->name = $security->scriptStripper($request->work_place_name[$key]);
                        $dentistExperience->title = $security->scriptStripper($request->work_title[$key]);
                        $dentistExperience->start_date = $security->scriptStripper($request->work_start_date[$key]);
                        $dentistExperience->due_date = $security->scriptStripper($request->work_due_date[$key]);
                        $dentistExperience->dentist_id = $dentist->id;
                        $dentistExperience->type = 1;

                        $dentistExperience->save();
                    }
                }
            });

        } catch (\Exception $e) {
            return redirect()->route('panel.dentistDetail',compact('data'))->with('error',"Kayıt yapılırken bir hata oluştu.");
        }
        return redirect()->route('panel.dentistDetail',compact('data'))->with('success',"Kayıt oluşturuldu.");
    }

    function dentistDelete(Request $request){
        //Dişçiyi silen fonksiyon
        $request->validate([
            'id' => 'distinct'
        ]);
        $dentist = Dentist::find($request->id);
        $dentist->deleted_at = now();
        $dentist->save();

        if ($dentist){
          DenstistWorkingHour::where('dentist_id', $request->id)->delete();
        }

        return response()->json(['Success' => 'success']);
    }

    public function denemeDentistAdd(Request $request){

        #Normal bir şekilde validation yapılır
        # Ancak bu validation şeklinde bizim kullandığımızın aksine validation fail olursa ne yapacağımızı belirleyebiliyoruz

        $validator = \Validator::make($request->all(), [
            'token' => 'required',
            'slug_name' =>'required'
        ]);

        // Eğer validation fail olursa
        if ($validator->fails()) {

            //geriye bir response dön ancak bu bir error kodu olsun ve mesaj olarak validation errorlarını alsın
            //ilk parametre mesaj, 2. parametre olan response codes kısmında da hangi hata dönsün istiyorsan o
            //bu kullanım success içindeki erroru aradığımız ajax error sorununa engel oluyor çünkü hata kodu ile birlikte gönderiyorsun
            return SendResponse::sendError($validator->errors(), ResponseCodes::REQUIRED_PARAMETER);

            //hata kodu dönmek istemiyorsan mesaj da yazabilirsin
            //return SendResponse::sendError('Doğrulama tamamlanamadı', '404');

            //bir başka örnek kullanım
            //return SendResponse::sendError(['message' => "Email zaten kayıtlı, ", 'email' => $client['email']], ResponseCodes::BAD_REQUEST);
        }



        //validation patlamazsa
        //devamındaki işlemler
        //..
        //..
        //..
        return SendResponse::sendResponse("Success", "Editor group product list send has been successfully!");

        //örnek kullanım
        //
        if ($dentist->save()) {
            $response = [
                'client' => $clientUser,
                'remaining_hr_balance' => $hr->total_balance,
            ];
            if ($response) {
                return SendResponse::sendResponse($response, "User Balance Has Been Updated Successfully!");
            }
        } else {
            return SendResponse::sendError("Transaction Log Could Not Be Created!", ResponseCodes::BAD_REQUEST);

        }
    }


    //Doktor Çalışma Saatleri
    public function dentist_work_time(Request $request)
    {

    $daysData = $request->input('days');

    if (is_array($daysData)) {
        foreach ($daysData as $dayData) {
            $day = $dayData['day'];
            $start_date = $dayData['start_date'];
            $due_date = $dayData['due_date'];


            $work_time = DenstistWorkingHour::where('dentist_id', $request->dentistID)
                ->where('day', $day)
                ->first();

            if ($work_time) {
                $work_time->start_date = $start_date;
                $work_time->due_date = $due_date;
                $work_time->save();
            } else {
                $new_work_time = new DenstistWorkingHour();
                $new_work_time->day = $day;
                $new_work_time->dentist_id = $request->dentistID;
                $new_work_time->start_date = $start_date;
                $new_work_time->due_date = $due_date;
                $new_work_time->save();
            }
        }
    }

        return response()->json(['Success' => 'BAŞARILI']);
    }



    public function dentist_work_time_detail(Request $request)
    {
        $dentist_working=DenstistWorkingHour::where('dentist_id',$request->id)->get();
        $dentistID = $request->id;

        return response()->json([
            'dentistID'=>$dentistID,
            'res' => $dentist_working
        ]);
    }


}
