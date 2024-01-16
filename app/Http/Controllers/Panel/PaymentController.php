<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\PatientTreatment;
use App\Models\PatientTreatmentPayment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    public function fetch($id){
        //ödemelerin listesini döndüren fonksiyon
        $patientPayments = PatientTreatmentPayment::whereHas('getPatientTreatment', function ($query) use ($id) {
            $query->where('patient_id', $id);
        })->get();


        return DataTables::of($patientPayments)
            ->editColumn('treatment', function ($data) {
                return $data->getPatientTreatment->title;
            })->editColumn('total_payment', function ($data) {
                return $data->getPatientTreatment->total_payment;
            })
            ->addColumn('total_paid', function ($data) {
                $payments = $data->getPatientTreatment->getPayments()->get();
                $total = 0;
                foreach ($payments as $payment){
                    $total += $payment->paid_payment;
                }
                return $total;
            })
            ->addColumn('paid_date', function ($data) {
                $date = explode(" ",$data->created_at);
                return $date[0];
            })
            ->addIndexColumn()
            ->rawColumns(['total_paid','paid_date'])
            ->make(true);

    }


    public function treatmentPaymentAdd(Request $request){
        //Ödeme ekleme fonksiyonu (create)
        $validatedData = $request->validate([
            'paid_payment' => 'required',
            'confirm' => 'required'
        ],
            [
                'paid_payment.required' => 'Ödenen tutar boş bırakılamaz.',
                'confirm.required' => 'Lütfen ödemeyi onaylayınız!',

            ]
        );

        if($validatedData){

            //şuana kadar ödenmiş toplam miktarın bulunması
            $treatment = PatientTreatment::find($request->payment_id);
            $payments = PatientTreatmentPayment::where('patient_treatment_id',$treatment->id)->get();
            $totalPayment = 0;

            foreach ($payments as $payment){
                $totalPayment += $payment->paid_payment;
            }

            //ödenen miktarın toplam miktardan az olduğunun kontrolü
            if($totalPayment + $request->paid_payment > $treatment->total_payment){
                return response()->json(['Error' => 'Ödenen tutar toplam işlem ücretinden fazladır!']);
            }

            $security = new Security();

            $payment = new PatientTreatmentPayment();
            $payment->paid_payment = $security->scriptStripper($request->paid_payment);
            $payment->confirmed = 1;
            $payment->patient_treatment_id = $security->scriptStripper($request->payment_id);


            $payment->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => 'error']);
        }

    }

}
