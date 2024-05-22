<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use Faker\Core\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\DoctorDepartment;
use App\Models\DoctorSchedule;
use App\Models\DoctorAppointment;
use Session;

class PatientController extends Controller
{
    //
//    private $user;
//
//    public function __construct()
//    {
//        // Initialize the property in the constructor if needed
//        $this->user = Auth::user();
//    }


    public function show_profile(){
        $user = Auth::user();
        return view('patient.profile',compact('user'));
    }

    //editing
    public function edit_address(){
        $user = Auth::user();
        return view('patient.edit_address',compact('user'));
    }

    public function edit_basic_info(){
        $user = Auth::user();
        $blood_groups = BloodGroup::all();
        return view('patient.edit_basic_info',compact('user','blood_groups'));
    }

   public function edit_contact(){
       $user = Auth::user();
       return view('patient.edit_contact',compact('user'));
   }
//
//    public function edit_medical_info(){
//        $user = Auth::user();
//        return view('patient.edit_medical_info',compact('user'));
//    }


    public function show_user_profile($user_id){
        // $user_details = User::find($user_id);
        return redirect()->route('show_prfile',with(['user_id'=>$user_id]));
    }

//  appointmet set 
    function appointmentSet($id){
        $doctorSchedule = DoctorSchedule::findOrFail($id);


        

        return view('patient.appointmentSet',compact('doctorSchedule'));

    }


// appointment add  
    function appointmentAdd(Request $request){
        $userId= Auth::user()->id;
        $request->validate([
            'time' => [
                'required',
                Rule::unique('doctor_appointments')->where(function ($query) use ($userId, $request) {
                    return $query->where('patient_id', $userId)
                        ->where('appointment_date', $request->appointment_date)
                        ->where('time', $request->time);
                }),
            ],
            'age' => [
                'required',
                'integer',
                'max:100',
                'min:1',
            ],
            'email' => 'required|email',
            'address' => 'required',
            'patient_name' => 'required',
            'phone' => 'required|numeric|digits:11',
            
        ],
        [
            'time.required' => 'Time select is required',
            'age.required' => 'Age is required',
            'email.required' => 'Age is required',
            'address.required' => 'Address is required',
            'patient_name.required' => 'Patient Name is required',
            'phone.required' => 'Phone Name is required',
            
        ]);
        $appointmentId =DoctorAppointment::insertGetId([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'doctor_schedule_id' => $request->doctor_schedule_id,
            'department' => $request->department,
            'appointment_date' => $request->appointment_date,
            'time' => $request->time,
            'fee' => $request->fee,
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'patient_problem' => $request->patient_problem,
            'description' => $request->description,
        ]);   

        if($appointmentId){
            Session::put('appointmentId',$appointmentId);
         
            return redirect('patient/doctor/appoinment/payment')->with('success', 'Appoinment Data Saved and now please pay your payment');

        }
        else{
            return redirect()->back()->with('error', 'opps! Your Appoinment Not saved, please try again');

        }
    }
    function paymentMethod(){
        $data =DoctorAppointment::findOrFail(Session::get('appointmentId'));

        return view('patient.appoinmentPayment',compact('data'));

    }
    function paymentMethodUpdate(Request $request, $id){
        $request->validate([
            'payment_method' => 'required',
            'tarms_checbox' => 'required',
            
        ],
        [
            'payment_method.required' => 'Select your payment method',
            'tarms_checbox.required' => 'Tranm\' and condition is required',
            
        ]);

        $data =DoctorAppointment::findOrFail($id);
        $paymentMethod = $request->payment_method;
        $scheduleId = $request->scheduleId;   


        if($paymentMethod =='cash'){
            $data->payment_status ='Cash On';
            $data->status = 1 ;
            $data->payment_method = $paymentMethod ;
            $savedata = $data->update();
            if($savedata){
                $schedule =DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty =($schedule->patient_qty- 1);
                $schedule->update();

            }
            
            return view('patient.appointmentMsg');
        }
        elseif($paymentMethod =='bkash'){
            $data->payment_status ='Paid';
            $data->status = 1 ;
            $data->payment_method = $paymentMethod ;
            $savedata = $data->update();
            if($savedata){
                $schedule =DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty =($schedule->patient_qty- 1);
                $schedule->update();

            }

            return view('patient.appointmentMsg');
        }
        elseif($paymentMethod =='nagod'){
            $data->payment_status ='Paid';
            $data->status = 1 ;
            $data->payment_method = $paymentMethod ;
            $savedata = $data->update();
            if($savedata){
                $schedule =DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty =($schedule->patient_qty- 1);
                $schedule->update();

            }            
            return view('patient.appointmentMsg');
        }
        elseif($paymentMethod =='roket'){
            $data->payment_status ='Paid';
            $data->status = 1 ;
            $data->payment_method = $paymentMethod ;
            $savedata = $data->update();
            if($savedata){
                $schedule =DoctorSchedule::findOrFail($scheduleId);
                $schedule->patient_qty =($schedule->patient_qty- 1);
                $schedule->update();

            }
            return view('patient.appointmentMsg');
        }


    }

// Appointment Rating 
    function AppointmentRatingUpadate(Request $request,$id){
        $request->validate([
            'appointment_rating' => [
                'required',
                'integer',
                'max:10',
                'min:1',
            ]
            
        ],
        [
            'appointment_rating.required' => 'Appointment Rating is required',
            
        ]);

        $data =DoctorAppointment::findOrFail($id);
        $data->appointment_rating =$request->appointment_rating;
        $msg = $data->update();
        if($msg){
            return redirect()->back()->with('success', 'Successfully You Submited Appointment Rating');

        }
        else{
            return redirect()->back()->with('error', 'opps! Appointment Rating not added');

        }

    }


    function patientAppointment(){
        $id = Auth::user()->id;
        $patientData =DoctorAppointment::where('patient_id',$id)->orderBy('id', 'DESC')->get();
        
        return view('patient.patientappointmentManage',compact('patientData'));

    }
    function patientAppointmentDelete($id){
        $patientData =DoctorAppointment::findOrfail($id);
        $msg = $patientData->delete();
        if($msg){
            return redirect()->back()->with('success', 'Data successfully delete');
        }
        else{
            return redirect()->back()->with('error', 'opps! data not delete');

        }

    }
    function patientAppointmentEdit($id){
        $data =DoctorAppointment::findOrFail($id);

        return view('patient.appoinmentPayment',compact('data'));


    }
    function patientAppointmentView($id){
        $data =DoctorAppointment::findOrFail($id);

        return view('patient.appointmentDetails',compact('data'));


    }
   


}
