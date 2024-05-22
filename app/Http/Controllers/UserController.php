<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\TrainingInfo;
use App\Models\ExperienceInfo;
use App\Models\Education;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use AuthenticatesUsers;



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
        // if(){

        // }
        if ($request->from_terms == 'true') {
            $user = Auth::user();
            $user->update($request->all());
            return response()->json(['message' => 'Data saved successfully']);
        }
        // terms and condition


        $user = Auth::user();
        switch ($request->btnSaveForm) {
            case "personalInfo": //=============case personal info
                if ($request->dataFrom == 'counselor') {
                    $request->validate([
                        // 'doc_title' => ['required', 'integer'],
                        'first_name' => ['required', 'string', 'max:50'],
                        'last_name' => ['required', 'string', 'max:50'],
                        'gender' => ['required', 'max:10'],
                        'date_of_birth' => ['required', 'date',],
                        'marital_status' => ['integer', 'max:3'],
                        'nationality' => ['required', 'string',],
                        'address' => ['required', 'string', 'max:255'],
                        'address2' => ['max:255'],
                        'city' => ['required', 'string', 'max:50'],
                        'state' => ['required', 'string', 'max:50'],
                        'zip_code' => ['required', 'string', 'max:20'],
                        'country' => ['required', 'string', 'max:50'],
                        'phone_code' => ['required', 'max:6',],
                        'phone' => ['required', 'numeric', 'max:99999999999999999999'],
                        'additional_phone_code' => ['numeric'],
                        'additional_phone' => ['numeric', 'max:99999999999999999999',],
                        'identity_type' => ['required', 'integer', 'max:3'],
                        'identity_no' => ['required', 'min:6', 'max:20',],
                        'identity_proof_file' => ['mimes:jpeg,jpg,png,pdf', 'max:2048'],
                        // 'license_no' => ['min:6', 'max:50'],
                        'license_attachment_file' => ['mimes:jpeg,jpg,png,pdf', 'max:2048'],
                        'religion' => ['string', 'max:10'],
                    ]);
                } else {
                    $request->validate([
                        'doc_title' => ['required', 'integer'],
                        'first_name' => ['required', 'string', 'max:50'],
                        'last_name' => ['required', 'string', 'max:50'],
                        'gender' => ['required', 'max:10'],
                        'date_of_birth' => ['required', 'date',],
                        'marital_status' => ['integer', 'max:3'],
                        'nationality' => ['required', 'string'],
                        'address' => ['required', 'string', 'max:255'],
                        'address2' => ['max:255'],
                        'city' => ['required', 'string', 'max:50'],
                        'state' => ['required', 'string', 'max:50'],
                        'zip_code' => ['required', 'string', 'max:20'],
                        'country' => ['required', 'string', 'max:50'],
                        'phone_code' => ['required', 'max:6',],
                        'phone' => ['required', 'numeric', 'max:99999999999999999999'],
                        'additional_phone_code' => ['numeric'],
                        'additional_phone' => ['numeric', 'max:99999999999999999999',],
                        'identity_type' => ['required', 'integer', 'max:3'],
                        'identity_no' => ['required', 'min:6', 'max:20',],
                        'identity_proof_file' => ['mimes:jpeg,jpg,png,pdf', 'max:2048'],
                        'license_no' => ['required', 'min:6', 'max:50'],
                        'license_attachment_file' => ['mimes:jpeg,jpg,png,pdf', 'max:2048'],
                        'religion' => ['string', 'max:10'],
                    ]);
                }


                if ($request->file('identity_proof_file')) {
                    $file = $request->file('identity_proof_file');
                    $fileName = Str::uuid() . '.' . $file->extension();
                    $fileLocation = 'uploads/important_documents/doctor_license';
                    $file->move(public_path($fileLocation), $fileName);

                    // merging info into request
                    $request->merge(['identity_proof' => $fileName]);
                    $request->merge(['identity_location' => $fileLocation]);
                }

                if ($request->file('license_attachment_file')) {
                    $file = $request->file('license_attachment_file');
                    $fileName = Str::uuid() . '.' . $file->extension();
                    $fileLocation = 'uploads/important_documents/doctor_license';
                    $file->move(public_path($fileLocation), $fileName);

                    // merging info into request
                    $request->merge(['license_attachment' => $fileName]);
                    $request->merge(['license_attachment_location' => $fileLocation]);
                }

                $user->update($request->all());
                $user->address()->updateOrCreate([], $request->all());

                if ($request->dataFrom !== 'counselor') {
                    $user->expert()->updateOrCreate([], $request->all());
                }


                return response()->json(['message' => 'Data saved successfully']);
                break;
            case "saveEdu": // case education info save
                $request->validate([
                    'institute' => ['required', 'string', 'max:100'],
                    'specialization' => ['required', 'string', 'max:50'],
                    'duration' => ['required', 'integer'],
                    'passing_year' => ['required', 'max:10', 'date'],
                    'edu_doc_title' => ['required', 'string', 'max:100'],
                    'education_certificate_file' => ['required', 'mimes:jpeg,jpg,png,pdf', 'max:2048'],

                ]);

                if ($request->file('education_certificate_file')) {
                    $file = $request->file('education_certificate_file');
                    $fileName = Str::uuid() . '.' . $file->extension();
                    $fileLocation = 'uploads/important_documents/educational_documents';
                    $file->move(public_path($fileLocation), $fileName);

                    // merging info into request
                    $request->merge(['education_certificate' => $fileName]);
                    $request->merge(['certificate_location' => $fileLocation]);
                }

                $user->education()->create($request->all());
                return response()->json(['message' => 'Your education information saved successfully', 'educations' => $user->education]);

                break;


            case 'AddTraining': // case training info save
                $request->validate([
                    'institute' => ['required', 'string', 'max:100'],
                    'specialization' => ['required', 'string', 'max:50'],
                    'from_date' => ['required', 'date'],
                    'to_date' => ['required', 'date'],
                    'training_title' => ['required', 'string', 'max:100'],
                    'training_certificate_file' => ['required', 'mimes:jpeg,jpg,png,pdf', 'max:2048'],

                ]);

                if ($request->file('training_certificate_file')) {
                    $file = $request->file('training_certificate_file');
                    $fileName = Str::uuid() . '.' . $file->extension();
                    $fileLocation = 'uploads/important_documents/training_documents';
                    $file->move(public_path($fileLocation), $fileName);

                    // merging info into request
                    $request->merge(['training_certificate' => $fileName]);
                    $request->merge(['certificate_location' => $fileLocation]);
                }

                $user->training()->create($request->all());

                return response()->json(['message' => 'Your training information saved successfully', 'trainings' => $user->training]);

            case 'saveExperienceInfo':  // case experience info save
                $request->validate([
                    'org_name' => ['required', 'string', 'max:200'],
                    'department' => ['required', 'string', 'max:50'],
                    'position' => ['required', 'string', 'max:50'],
                    'from_date' => ['required', 'date'],
                    // 'to_date'=>['date'],
                    'job_status' => ['string', 'max:10'],

                ]);

                $user->experience()->create($request->all());
                return response()->json(['message' => 'Your experience saved successfully', 'experiences' => $user->experience]);

            default:
                return redirect(route('error404'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Request $request, User $user)
    {
        return match ($request->data) {
            'basic_info' => redirect()->route('patient.edit_basic_info'),
            'address_info' => redirect()->route('patient.edit_address'),
            'contact_info' => redirect()->route('patient.edit_contact_info'),
            default => redirect()->back(),
        };
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {


        $user = Auth::user();
        //        dd($user->address()->updateOrCreate([],$request->all()));

        switch ($request->form) {
            case 'basic_info':
                $request->validate([
                    'first_name' => ['required', 'string', 'max:50'],
                    'last_name' => ['required', 'string', 'max:50'],
                ]);


                $request->merge(['is_verified' => 1]);
                if ($user->update($request->all())) {
                    return redirect(route('patient.profile'));
                } else {
                    return redirect(route('error404'));
                }

            case 'address':
                $request->validate([
                    'address' => ['required', 'string', 'max:100'],
                    'zip_code' => ['required', 'string', 'max:20'],
                    'city' => ['required', 'string', 'max:50'],
                    'state' => ['required', 'string', 'max:50'],
                    'user_id' => ['required', 'max:20']
                ]);
                if ($user->address()->updateOrCreate([], $request->all())) {
                    return redirect(route('patient.profile'));
                } else {
                    return redirect(route('error404'));
                }
                break;
            case 'imageUpload':
                // dd($request);

                $request->validate([
                    'profile_picture' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
                ]);

                $file = $request->file('profile_picture');
                $fileName = time() . '.' . $file->extension();
                $fileLocation = 'images/uploads/pp';
                $file->move(public_path($fileLocation), $fileName);
                if (
                    $user->update([
                        'pp_name' => $fileName,
                        'pp_location' => $fileLocation,
                    ])
                ) {
                    if ($user->hasRole('Admin')) {
                        return redirect(route('admin.profile'));
                    } elseif ($user->hasRole('Doctor')) {
                        return redirect(route('doctor.profile'));
                    } elseif ($user->hasRole('Counselor')) {
                        return redirect(route('counselor.profile'));
                    } elseif ($user->hasRole('Patient')) {
                        return redirect(route('patient.profile'));
                    } else {
                        return redirect(route('error404'));
                    }
                } else {
                    return redirect(route('error404'));
                }
                break;
                //                dd($file->extension());
                //                $hash_name = $file->hashName();
                //                $file_extension = $file->getClientOriginalExtension();
                //                $original_file_name = $file->getClientOriginalName();
                //                dd($file->getClientOriginalName());

            case 'contact_info':
                $request->validate([
                    'phone_code' => ['required',],
                    'phone' => ['required', 'numeric', 'max_digits:20'],
                    'additional_phone_code' => ['required'],
                    'additional_phone' => ['required', 'numeric', 'max_digits:20',],

                ]);
                $user->update($request->all());

                // dd($request);

                if ($user->hasRole('Admin')) {
                    return redirect(route('admin.profile'));
                } elseif ($user->hasRole('Doctor')) {
                    return redirect(route('doctor.profile'));
                } elseif ($user->hasRole('Counselor')) {
                    return redirect(route('counselor.profile'));
                } elseif ($user->hasRole('Patient')) {
                    return redirect(route('patient.profile'))->with('success', 'Contact info updated successfully');
                } else {
                    return redirect(route('error404'));
                }

                break;
                //            case 'medical_info':
                //                continue;
                //                break;

            default:
                return redirect(route('error404'));
                break;
        }
    }


    public function change_email(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);


        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        return response()->json(['message' => 'Email changed successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    public function delete_education(Request $request)
    {
        $user = Auth::user();
        $education = Education::find($request->id);
        $education->delete();
        return response()->json(['message' => 'Record deleted', 'educations' => $user->education]);
    }


    /**
     * Delete training info from an specific user
     */

    public function delete_training(Request $request)
    {
        $row = TrainingInfo::find($request->id);
        $row->delete();
        return response()->json(['message' => 'Record deleted',]);
    }

    /**
     * Delete experience info from an specific user
     */

    public function delete_experience(Request $request)
    {
        // return $request;
        $row = ExperienceInfo::find($request->id);
        $row->delete();
        return response()->json(['message' => 'Record deleted',]);
    }




    // show profile
    public function show_profile($user_id)
    {
        $user_details = User::find($user_id);
        $user = Auth::user();
        return view('pages.user_profile', compact('user_details', 'user'));
    }
}
