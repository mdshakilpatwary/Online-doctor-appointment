<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;


class PatientController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $user = auth()->user();
        return view('patient.profile',compact('user'));

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
    public function show(User $user)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    #[NoReturn] public function edit(Request $request, User $user): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        $blood_groups = BloodGroup::all();

        switch ($request->btn) {
            case 'address':
                return view('patient.edit_address',compact('user','blood_groups'));
                break;
            case 'contact_info':
                return view('patient.edit_contact_info',compact('user','blood_groups'));
                break;
            case 'medical_info':
                return view('patient.medical_info',compact('user','blood_groups'));
                break;
            default:
                return view('patient.edit_basic_info',compact('user','blood_groups'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
//        dd($request);

        $user = auth()->user();


//        switch ($request->form) {
//            case 'address':
//                $request->validate([
//                    'address' => 'required',
//                    'zip_code' => 'required',
//                    'city' => 'required',
//                    'state' => 'required',
//                    'user_id' => 'required'
//                ]);
//                $user->address()->updateOrCreate([],$request->all());
//                return redirect(route('patient.profile.index'));
//                break;
//            case 'imageUpload':
////                $validated =  $request->validate([
////                                    'profile_picture' => 'required|image'|'size:2048',
////                                ]);
//                $file = $request->file('profile_picture');
//                $fileName = time().'.'.$file->extension();
//                $fileLocation = 'images/uploads/pp';
//                $file->move(public_path($fileLocation), $fileName);
//                if(
//                    $user->update([
//                        'pp_name' => $fileName,
//                        'pp_location' => $fileLocation,
//                    ])
//                ){
//                    return redirect(route('patient.profile.index'));
//                }
//
//
//
//
//
////                dd($file->extension());
////                $hash_name = $file->hashName();
////                $file_extension = $file->getClientOriginalExtension();
////                $original_file_name = $file->getClientOriginalName();
////                dd($file->getClientOriginalName());
//                break;
////            case 'contact_info':
////
////                break;
////            case 'medical_info':
////                continue;
////                break;
//
//            default:
//                $request->validate([
//                    'first_name' => 'required',
//                    'last_name' => 'required',
//                ]);
//
//                $user->update($request->all());
//                return redirect(route('patient.profile.index'));
//        }





//        return redirect()->back()
//            ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
//        withTrash();
//        $user->delete();
        return;
//        $user->forceDelete();
    }
//    public function edit_view(){
//
////        //
//        $user = auth()->user();
////        dd('you many');
//        $blood_groups = BloodGroup::all();
//        return view('patient.edit_basic_info',compact('user',"blood_groups"));
//
//    }


    public function update_profile(Request $request){
//        dd($request);
//        $request->validate([
//            'first_name' => 'required',
//        ]);



//        $user->update($request->all());
//
//        return back()->with('success','blah blah ');
    }
    public function show_profile(){
        $user = Auth::user();
        return view('patient.profile',compact('user'));
    }
}
