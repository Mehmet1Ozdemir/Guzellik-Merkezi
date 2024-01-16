<?php

namespace App\Http\Controllers\Panel\Patients;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class AppointmentsController extends Controller
{

    public function appointmentsList(){
        $dentists = Dentist::where('deleted_at',NULL)->get();
        return view('panel.pages.appointments.appointmentsList',compact('dentists'));
    }


    public function appointmentsFetch(){
        //Randevuların listesini döndüren fonksiyon
        $appointments = Appointments::where('deleted_at',NULL)->get();
        return DataTables::of($appointments)
            ->editColumn('dentist_name', function ($data) {
                return $data->getDentist->title . " " . $data->getDentist->name . " " . $data->getDentist->surname;
            })
            ->editColumn('patient_name', function ($data) {
                return $data->name . " " . $data->surname;
            })
            ->editColumn('date', function ($data) {
                $due_time = explode(' ',$data->due_date);
                return $data->start_date . " - " . $due_time[1];
            })
            ->editColumn('status', function ($data) {
                if($data->is_attended == 1){
                    return '<input id="is_attended" name="is_attended" onclick="changeAttandance('.$data->id.')" type="checkbox" checked>';
                }
                return '<input id="is_attended" name="is_attended" onclick="changeAttandance('.$data->id.')" type="checkbox" >';

            })
            ->addColumn('detail', function ($data) {
                return "<button onclick='updateAppointment(" . $data->id . ")' class='btn btn-info'>Detay</button>";
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteAppointment(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['status','detail', 'delete'])
            ->make(true);

    }

    public function appointmentsAttendance(Request $request){
        //Randevu durumunu değiştiren fonksiyon
        $appointment = Appointments::find($request->id);
        if($appointment->is_attended == 1){
            $appointment->is_attended = 0;
            $appointment->save();
            return response()->json(['Success' => 'success']);
        }

        $appointment->is_attended = 1;
        $appointment->save();
        return response()->json(['Success' => 'success']);
    }

    public function appointmentsAdd(Request $request){
        //Randevu ekleme fonksiyonu (create)
        $validator = Validator::make($request->all(),[
                'dentist_id' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'required',
                'operation' => 'required',
                'start_date' => 'required',
                'due_date' => 'required',
            ],[
                'dentist_id.required' => 'Lütfen dişçi seçiniz.',
                'name.required' => 'Hasta Adı boş bırakılamaz.',
                'surname.required' => 'Hasta Soyadı boş bırakılamaz.',
                'phone.required' => 'Hasta telefon numarası boş bırakılamaz.',
                'operation.required' => 'İşlem alanı boş bırakılamaz.',
                'start_date.required' => 'Randevu başlangıç saati boş bırakılamaz.',
                'due_date.required' => 'Randevu bitiş saati boş bırakılamaz.',
            ]
        );

        $startDate = str_replace('T',' ',Security::scriptStripper($request->start_date));
        $dueDate = str_replace('T',' ',Security::scriptStripper($request->due_date));
        $dentistId = Security::scriptStripper($request->dentist_id);

        $startDateCheck = Appointments::where(function ($query) use ($startDate,$dentistId) {
            $query->where('dentist_id', '=', $dentistId)
                ->where('start_date', '<=', $startDate)
                ->where('due_date', '>=', $startDate);
        })->get();

        $dueDateCheck = Appointments::where(function ($query) use ($dueDate,$dentistId) {
            $query->where('dentist_id', '=', $dentistId)
                ->where('start_date', '>=', $dueDate)
                ->where('due_date', '<=', $dueDate);
        })->get();

        if ($startDateCheck->isNotEmpty() || $dueDateCheck->isNotEmpty()) {
            throw ValidationException::withMessages([
                'start_date' => 'Randevu saati diğer randevu saatleri ile aynı zamanda olamaz.',
            ]);
        }

        if(!$validator->fails()){

            $security = new Security();

            $appointment = new Appointments();
            $appointment->dentist_id = $security->scriptStripper($request->dentist_id);
            $appointment->name = $security->scriptStripper($request->name);
            $appointment->surname = $security->scriptStripper($request->surname);
            $appointment->phone_number = $security->scriptStripper($request->phone);
            $appointment->operation = $security->scriptStripper($request->operation);
            $appointment->description = $security->scriptStripper($request->description);
            $appointment->start_date = $security->scriptStripper($request->start_date);
            $appointment->due_date = $security->scriptStripper($request->due_date);

            $appointment->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => $validator->errors()]);
        }

    }

    public function appointmentsDetail(Request $request){

        $appointment = Appointments::find($request->id);
        $dentists = Dentist::where('deleted_at',NULL)->get();
        return response()->json([
            'dentist_id' => $appointment->dentist_id,
            'name' => $appointment->name,
            'surname' => $appointment->surname,
            'phone' => $appointment->phone_number,
            'operation' => $appointment->operation,
            'start_date' => $appointment->start_date,
            'due_date' => $appointment->due_date,
            'description' => $appointment->description,
            'dentists' => $dentists,
            ]);
    }

    public function appointmentsUpdate(Request $request)
    {
        //Hasta güncelleme fonksiyonu
        $validator = Validator::make($request->all(), [
            'dentist_idUpdate' => 'required',
            'nameUpdate' => 'required',
            'surnameUpdate' => 'required',
            'phoneUpdate' => 'required',
            'operationUpdate' => 'required',
            'start_dateUpdate' => 'required',
            'due_dateUpdate' => 'required',
        ], [
                'dentist_id.required' => 'Lütfen dişçi seçiniz.',
                'name.required' => 'Hasta Adı boş bırakılamaz.',
                'surname.required' => 'Hasta Soyadı boş bırakılamaz.',
                'phone.required' => 'Hasta telefon numarası boş bırakılamaz.',
                'operation.required' => 'İşlem alanı boş bırakılamaz.',
                'start_date.required' => 'Randevu başlangıç saati boş bırakılamaz.',
                'due_date.required' => 'Randevu bitiş saati boş bırakılamaz.',
            ]
        );

        if (!$validator->fails()) {

            $security = new Security();

            $appointment = Appointments::find($request->updateId);

            $appointment->dentist_id = $security->scriptStripper($request->dentist_idUpdate);
            $appointment->name = $security->scriptStripper($request->nameUpdate);
            $appointment->surname = $security->scriptStripper($request->surnameUpdate);
            $appointment->phone_number = $security->scriptStripper($request->phoneUpdate);
            $appointment->operation = $security->scriptStripper($request->operationUpdate);
            $appointment->description = $security->scriptStripper($request->descriptionUpdate);
            $appointment->start_date = $security->scriptStripper($request->start_dateUpdate);
            $appointment->due_date = $security->scriptStripper($request->due_dateUpdate);


            $appointment->save();

            return response()->json(['Success' => 'success']);
        } else {
            return response()->json(['Error' => $validator->errors()]);
        }

    }

    public function appointmentsDelete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);
        $appointment = Appointments::find($request->id);
        $appointment->deleted_at = now();
        $appointment->save();
        return response()->json(['Success' => 'success']);
    }
}
