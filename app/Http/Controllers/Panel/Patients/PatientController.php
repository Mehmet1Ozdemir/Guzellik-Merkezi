<?php

namespace App\Http\Controllers\Panel\Patients;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Dentist;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    public function fetch(){
        //hastaların listesini döndüren fonksiyon
        $patients = Patient::get();
        return DataTables::of($patients)

            ->editColumn('age', function ($data) {
                return Carbon::parse($data->birth_date)->age;
            })
            ->addColumn('detail', function ($data) {
                $inputs = [
                    "id" => $data->id
                ];
                return '<a class="btn btn-info" href="' . route('patientDetail', ["data" => Security::encryptInputs($inputs)]) . '">' . 'Detay</a>';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deletePatient(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['detail', 'delete'])
            ->make(true);

    }

    public function listPage(){
        $countries = Country::get();
        return view('panel.pages.patients.list',compact('countries'));
    }

    public function patientAdd(Request $request){
        //Hasta ekleme fonksiyonu (create)
        $validatedData = \Validator::make($request->all(),
         [
            'name' => 'required',
            'surname' => 'required'
         ],
            [
                'name.required' => 'Hasta Adı boş bırakılamaz.',
                'surname.required' => 'Hasta Adı boş bırakılamaz.',

            ]
        );

        if(! $validatedData->fails()){

            $security = new Security();

            $patient = new Patient();
            $patient->country_id = $security->scriptStripper($request->country_id);
            $patient->city_id = $security->scriptStripper($request->city_id);
            $patient->name = $security->scriptStripper($request->name);
            $patient->surname = $security->scriptStripper($request->surname);
            $patient->birth_date = Carbon::createFromFormat('d/m/Y', $security->scriptStripper($request->birth_date))->format('Y-m-d');
            $patient->phone_number = $security->scriptStripper($request->phone);
            $patient->email = $security->scriptStripper($request->email);
            $patient->town = $security->scriptStripper($request->town);
            $patient->address = $security->scriptStripper($request->address);
            $patient->zip_code = $security->scriptStripper($request->zip_code);

            $patient->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => $validatedData->errors()]);
        }

    }

    public function patientDetail(Request $request){

        $data = decrypt($request->data);
        $countries = Country::get();
        $cities = City::get();
        $dentists = Dentist::where('deleted_at',NULL)->get();

        $patient = Patient::find($data["id"]);
        return view('panel.pages.patients.detail',compact('patient','countries','cities','dentists'));

    }

    public function patientUpdate(Request $request){
        //Hasta güncelleme fonksiyonu


        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'patientID' => 'required'
        ],
            [
                'name.required' => 'Hasta Adı boş bırakılamaz.',
                'surname.required' => 'Hasta Soyadı boş bırakılamaz.',

            ]
        );

        if($validatedData){

            $security = new Security();

            $patient = Patient::find($request->patientID);
            $patient->country_id = $security->scriptStripper($request->country_id);
            $patient->city_id = $security->scriptStripper($request->city_id);
            $patient->name = $security->scriptStripper($request->name);
            $patient->surname = $security->scriptStripper($request->surname);
            $patient->birth_date = Carbon::createFromFormat('d/m/Y', $security->scriptStripper($request->birth_date))->format('Y-m-d');
            $patient->phone_number = $security->scriptStripper($request->phone_number);
            $patient->email = $security->scriptStripper($request->email);
            $patient->town = $security->scriptStripper($request->town);
            $patient->address = $security->scriptStripper($request->address);
            $patient->zip_code = $security->scriptStripper($request->zip_code);

            $patient->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => 'error']);
        }


    }

    function patientDelete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);
        Patient::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }


}
