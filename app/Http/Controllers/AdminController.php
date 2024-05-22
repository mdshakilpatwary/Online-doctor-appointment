<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUs;
use App\Models\User;
use App\Models\DoctorDepartment;
use App\Models\DoctorSchedule;
use App\Models\DoctorAppointment;


class AdminController extends Controller
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

    public function show_dashboard()
    {
        $user = Auth::user();
        $users = User::role(['Patient','Doctor','Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        $pending_users = User::role(['Doctor', 'Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',2)
        ->get();

        return view('admin.dashboard', compact('users','pending_users','user'));
    }

    public function show_profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }


    // show_contact_us
    public function show_contact_us()
    {
        $user = Auth::user();
        $contact_us = ContactUs::all();
        return view('admin.contact_us_queries', compact('contact_us', 'user'));
    }


    // show_pending_user
    public function show_pending_user()
    {
        $user = Auth::user();

        $users = User::role(['Doctor', 'Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',2)
        ->get();
        return view('admin.pending_user', compact('users','user'));
    }


    // show_blocked_user
    public function show_blocked_user()
    {
        $user = Auth::user();

        $users = User::role(['Doctor', 'Counselor','Patient']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_active',0)
        ->get();
        return view('admin.blocked_user', compact('users','user'));
    }


    // show_doctor_list
    public function show_doctor_list()
    {
        $user = Auth::user();

        $users = User::role(['Doctor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.doctor_list', compact('users','user'));
    }


    // show_counselor_list
    public function show_counselor_list()
    {
        $user = Auth::user();

        $users = User::role(['Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.counselor_list', compact('users','user'));
    }

    // show_patient_list
    public function show_patient_list()
    {
        $user = Auth::user();

        $users = User::role(['Patient']) // Only get users with Patient role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.patient_list', compact('users','user'));
    }

    // show_all_users
    public function show_all_users()
    {
        $user = Auth::user();

        $users = User::role(['Patient','Doctor','Counselor']) // Only get users with 'Doctor' or 'Counselor' role
        ->where('is_verified',1)
        ->where('is_active',1)
        ->get();

        return view('admin.all_users', compact('users','user'));
    }


    // verify_user
    public function verify_user(Request $request)
    {
        $user = User::find($request->id);
        $user->is_verified = 1;
        $user->save();
        return redirect()->back()->with('success', 'User Verified Successfully');
    }

    // block_user
    public function block_user(Request $request)
    {

        // dd($request);
        $user = User::find($request->id);
        $user->is_active = 0;
        $user->save();
        return redirect()->back()->with('success', 'User Blocked Successfully');
    }


    // unblock_user
    public function unblock_user(Request $request)
    {
        $user = User::find($request->id);
        $user->is_active = 1;
        $user->save();
        return redirect()->back()->with('success', 'User Unblocked Successfully');
    }

    //show_user_profile
    public function show_user_profile(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.show_user_profile', compact('user'));
        // return redirect()->route('show_prfile',with(['user_id'=>$user_id]));
    }


    // active_appointment
    public function active_appointment()
    {
        $patientData =DoctorAppointment::orderBy('id', 'DESC')->get();
        
        $user = Auth::user();
        return view('admin.active_appointment', compact('user','patientData'));
    }
    // spacific schedule wise appointment
    public function spacificScheduleAppointment($id)
    {
        $patientData =DoctorAppointment::where('doctor_schedule_id',$id)->orderBy('id', 'DESC')->get();
        
        $user = Auth::user();
        return view('admin.spacific_schedule_appointment', compact('user','patientData'));
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

    function patientAppointmentView($id){
        $data =DoctorAppointment::findOrFail($id);
    
        return view('admin.appointmentDetails',compact('data'));
    
    
    }
        // active_schedule
        public function active_schedule()
        {
            $scheduleData= DoctorSchedule::orderBy('id', 'DESC')->get();

            
            $user = Auth::user();
            return view('admin.active_schedule', compact('user','scheduleData'));
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
// schedule status change
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



    // past_appointment
    public function past_appointment()
    {
        $user = Auth::user();
        return view('admin.past_appointment', compact('user'));
    }


}
