<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Queue\Connectors\NullConnector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\DoctorDepartment;
use App\Models\DoctorSchedule;
use App\Models\DoctorAppointment;
use Illuminate\Validation\Rule;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // doctor profile section
    public function show_dashboard(){
        $user = Auth::user();

        /**
         *  account progress point
         */
        $user->load('expert','training','education','experience');

        $countNull = 0;
        $countColumn = 0;



        foreach($user->getAttributes() as $column=>$value){

            switch ($column) {
                case 'additional_phone_code':
                    break;
                case 'additional_phone':
                    break;

                case 'religion':
                    break;

                case 'blood_group_id':
                    break;

                case 'remember_token':
                    break;
                case 'deleted_at':
                    break;
                case 'email_verified_at':
                    break;
                case 'is_verified':
                    break;
                case 'is_active':
                    break;

                default:
                    if($value === null){
                        $countNull++;
                    }
                    $countColumn++;
                    break;

            }


        }

        $countColumn += 4; // for expert table column

        $countColumn += 6;
        if($user->education->isEmpty()){
            $countNull += 6;
        }

        $countColumn += 6;
        if($user->training->isEmpty()){
            $countNull += 6;
        }

        $countColumn += 5;
        if($user->experience->isEmpty()){
            $countNull += 5;
        }



        $progress =  round((100 - (floatval($countNull) / floatval($countColumn)) * 100)) . '%' ;
        /**
         * End account progress here
         */
        $page_title = 'Doctor dashboard';

        return view('doctor.dashboard',compact('user','progress','page_title'));
    }

    public function show_profile(){
        $user = Auth::user();

         /**
         *  account progress point
         */
        $user->load('expert','training','education','experience');

        $countNull = 0;
        $countColumn = 0;

        foreach($user->getAttributes() as $column=>$value){

            switch ($column) {
                case 'additional_phone_code':
                    break;
                case 'additional_phone':
                    break;

                case 'religion':
                    break;

                case 'blood_group_id':
                    break;

                case 'remember_token':
                    break;
                case 'deleted_at':
                    break;
                case 'email_verified_at':
                    break;
                case 'is_verified':
                    break;
                case 'is_active':
                    break;

                default:
                    if($value === null){
                        $countNull++;
                    }
                    $countColumn++;
                    break;
            }
        }

        $countColumn += 4; // for expert table column

        $countColumn += 6;
        if($user->education->isEmpty()){
            $countNull += 6;
        }

        $countColumn += 6;
        if($user->training->isEmpty()){
            $countNull += 6;
        }

        $countColumn += 5;
        if($user->experience->isEmpty()){
            $countNull += 5;
        }

        $progress =  round((100 - (floatval($countNull) / floatval($countColumn)) * 100)) . '%' ;
        /**
         * End account progress here
         */
        $page_title = 'Doctor profile';


        return view('doctor.profile',compact('user','progress','page_title'));
    }

    public function doctor_profile_wizard_step(){
        $user = Auth::user();
        $country_phone = json_decode(file_get_contents(public_path('data/countries.json')),true);



        return view('wizard_step_form.doctor_form',compact('user','country_phone'));
    }

    public function request_for_verification(){
        $user = Auth::user();
        $page_title = 'Request for verification';

        $user->update(
            [
                'is_verified'=> 2,
            ]
        );

        return  response()->json(['success' => 'Request has been sent wait for response. Our team will let you know the decition in between next 48 hours.', 'user' => $user]);
    }



    // doctor schedule add controller method start

    public function doctorSchedule(){
        $department= DoctorDepartment::where('status',1)->get();
        return view('doctor.doctorschedule',compact('department'));
    }
    public function doctorDepartmentAdd(Request $request){
        $request->validate([
            'doctor_department' => 'required|unique:doctor_departments',
            
        ],
        [
            'doctor_department.required' => 'Department name is required',
            'doctor_department.unique' => 'This department name already exist',
            
        ]);
        $department =new DoctorDepartment;
        $department->doctor_department = $request->doctor_department;

        $msg = $department->save();

        if($msg){
            return redirect()->back()->with('success', 'Doctor\'s department successfully added');

        }
        else{
            return redirect()->back()->with('error', 'opps! Doctor\'s department not add');

        }


    }

    public function doctorScheduleAdd(Request $request){
        $userId =Auth::user()->id;
        
        $request->validate([
            'set_date' => [
                'required',
                'date',
                Rule::unique('doctor_schedules')->where(function ($query) use ($userId) {
                    return $query->where('user_id', $userId);
                }),                'date',
                'after_or_equal:today', 
                'before:'. now()->addDays(30)->toDateString(), 
                'after:'.Carbon::now(), 
                
             ],
            'set_time' => ['required'],
            'patient_qty' => [
                'required',
                'integer',
                'max:15',
                'min:1',
            ],
            'patient_fee' => [
                'required',
                'integer',
                'max:5000',
                'min:1',
        ],
            'specialist' => ['required'],
            'meeting_link' => [
                'required',
                'url'
            ],
            'department_id' => ['required'],
            
        ],
        [
            'set_date.required' => 'Date Select is required',
            'set_date.unique' => 'This date already exist',
            'set_date.before' => 'this date must be accepted for 30 days',
            'set_date.after' => 'please select tomorrow data',
            'set_time.required' => 'Time select is required',
            'patient_qty.required' => 'Patient Quantity limit is required',
            'patient_qty.max' => 'Patient Quantity maximum 15 required',
            'patient_fee.required' => 'Fee is required',
            'specialist.required' => 'speciality is required',
            'department_id.required' => 'Department select is required',
            
        ]);
        $doctorSchedule =new DoctorSchedule;
        $doctorSchedule->user_id = $request->user_id;
        $doctorSchedule->department_id = $request->department_id;
        $doctorSchedule->set_date = $request->set_date;
        $doctorSchedule->patient_qty = $request->patient_qty;
        $doctorSchedule->patient_fee = $request->patient_fee;
        $doctorSchedule->specialist = $request->specialist;
        $doctorSchedule->meeting_link = $request->meeting_link;
        $doctorSchedule->description = $request->description;

        $times = array();
        $set_time = $request->set_time;
        foreach($set_time as $time){
            $times[] = $time;
        }
        $doctorSchedule->set_time =implode("|",$times);

        $msg = $doctorSchedule->save();

        if($msg){
            return redirect('/doctor/doctor/schedule/manage')->with('success', 'Doctor\'s schedule successfully added');

        }
        else{
            return redirect()->back()->with('error', 'opps! Doctor\'s schedule not add');

        }


    }


    // doctor Schedule edit part 
        
    function doctorScheduleEdit($id){
        $scheduleData =DoctorSchedule::findOrFail($id);
        $department= DoctorDepartment::where('status',1)->get();

        return view('doctor.doctorscheduleEdit', compact('scheduleData','department'));

      
    }
    // doctor Schedule Delete part 
        
    function doctorScheduleDelete($id){
        // Check if there are related appointments
        $appointmentsCount = DoctorAppointment::where('doctor_schedule_id', $id)->count();
    
        if ($appointmentsCount > 0) {
            return redirect()->back()->with('error', 'Cannot delete the schedule because it has related appointments.');
        }
    
        // No related appointments, proceed with deletion
        DoctorSchedule::destroy($id);
    
        return redirect()->back()->with('success', 'Schedule deleted successfully');
    }
    



    // schedule update 
    public function doctorScheduleUpdate(Request $request,$id){
        $userId =Auth::user()->id;
        
        $request->validate([
            'set_date' => [
                'required',
                'date',
                'after_or_equal:today', 
                'before:'. now()->addDays(30)->toDateString(), 
                'after:'.Carbon::now(), 
                
             ],
            'set_time' => ['required'],
            'patient_qty' => [
                'required',
                'integer',
                'max:15',
                'min:1',
            ],
            'patient_fee' => [
                'required',
                'integer',
                'max:5000',
                'min:1',
        ],
            'specialist' => ['required'],
            'meeting_link' => [
                'required',
                'url'
            ],
            'department_id' => ['required'],
            
        ],
        [
            'set_date.required' => 'Date Select is required',
            'set_date.unique' => 'This date already exist',
            'set_date.before' => 'this date must be accepted for 30 days',
            'set_date.after' => 'please select tomorrow data',
            'set_time.required' => 'Time select is required',
            'patient_qty.required' => 'Patient Quantity limit is required',
            'patient_qty.max' => 'Patient Quantity maximum 15 required',
            'patient_fee.required' => 'Fee is required',
            'specialist.required' => 'speciality is required',
            'department_id.required' => 'Department select is required',
            
        ]);



        $appointmentsCount = DoctorAppointment::where('doctor_schedule_id', $id)->count();
    
        if ($appointmentsCount > 0) {
            return redirect()->back()->with('error', 'Cannot Edit the schedule because it has related appointments.');
        }
        else{
                $doctorSchedule =DoctorSchedule::findOrFail($id);
                $doctorSchedule->user_id = $request->user_id;
                $doctorSchedule->department_id = $request->department_id;
                $doctorSchedule->set_date = $request->set_date;
                $doctorSchedule->patient_qty = $request->patient_qty;
                $doctorSchedule->patient_fee = $request->patient_fee;
                $doctorSchedule->specialist = $request->specialist;
                $doctorSchedule->meeting_link = $request->meeting_link;
                $doctorSchedule->description = $request->description;

                $times = array();
                $set_time = $request->set_time;
                foreach($set_time as $time){
                    $times[] = $time;
                }
                $doctorSchedule->set_time =implode("|",$times);

                $msg = $doctorSchedule->update();

                if($msg){
                    return redirect('/doctor/doctor/schedule/manage')->with('success', 'Doctor\'s schedule successfully added');

                }
                else{
                    return redirect()->back()->with('error', 'opps! Doctor\'s schedule not add');

                }

            }






    }
    // Manage 
    public function doctorScheduleManage(){
        $id = Auth::user()->id;

        $scheduleData= DoctorSchedule::where('user_id',$id)->orderBy('id', 'DESC')->get();
        $patientData =DoctorAppointment::where('doctor_id',$id)->orderBy('id', 'DESC')->get();

        return view('doctor.doctorschedulemanage',compact('scheduleData','patientData'));
 
        
        
        
    }

// doctor Schedule status part 

function changestatus($id){
    $status =DoctorSchedule::find($id);
    if($status->status == 1){
       $status->update(['status' => 0]);
       return redirect()->back()->with('success', 'Product Inactive successfully Done');
    }
    else{
        $status->update(['status' => 1]);
        return redirect()->back()->with('success', 'Product Active successfully done');
    }
}

// delete appointment 
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

function patientAppointmentView($id){
    $data =DoctorAppointment::findOrFail($id);

    return view('doctor.appointmentDetails',compact('data'));


}







}

