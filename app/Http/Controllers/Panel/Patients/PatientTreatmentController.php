<?php

namespace App\Http\Controllers\Panel\Patients;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\PatientTreatment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PatientTreatmentController extends Controller
{
    public function fetch($id){
        //hastaların listesini döndüren fonksiyon
        $treatments = PatientTreatment::where('patient_id',$id)->where('deleted_at',NULL)->get();

        return DataTables::of($treatments)
            ->editColumn('dentist', function ($data) {
                return $data->getDentist->title . " " . $data->getDentist->name . " " . $data->getDentist->surname;
            })
            ->addColumn('payment', function ($data) {
                return '<button class="btn btn-success " data-bs-toggle="modal" onclick="setId('.$data->id.')" href="#add_patient_payment"><i class="fa fa-plus me-1"></i>Ödeme Yap</button>';
            })
            ->addColumn('paid_payment', function ($data) {
                $payments = $data->getPayments()->get();
                $total = 0;
                foreach ($payments as $payment){
                    $total += $payment->paid_payment;
                }
                return $total;
            })
            ->addColumn('detail', function ($data) {
                return 'detail';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteTreatment(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['dentist','paid_payment','payment','detail', 'delete'])
            ->make(true);

    }


    public function patientTreatmentAdd(Request $request){
        //Hasta ekleme fonksiyonu (create)
        $validatedData = $request->validate([
            'title' => 'required',
            'patient_id' => 'required',
            'dentist_id' => 'required',
            'total_payment' => 'required'
        ],
            [
                'title.required' => 'İşlem başlığı boş bırakılamaz.',
            ]
        );

        if($validatedData){

            $security = new Security();

            $treatment = new PatientTreatment();
            $treatment->patient_id = $security->scriptStripper($request->patient_id);
            $treatment->dentist_id = $security->scriptStripper($request->dentist_id);
            $treatment->title = $security->scriptStripper($request->title);
            $treatment->description = $security->scriptStripper($request->description);
            $treatment->total_payment = $security->scriptStripper($request->total_payment);

            $treatment->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => 'error']);
        }

    }


    public function patientTreatmentDelete(Request $request){
        $request->validate([
            'id' => 'distinct'
        ]);
        $appointment = PatientTreatment::find($request->id);
        $appointment->deleted_at = now();
        $appointment->save();
        return response()->json(['Success' => 'success']);
    }
}
