<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CounselorController extends Controller
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


        $user->load('training', 'education', 'experience');

        $countNull = 0;
        $countColumn = 0;

        // dd($user->getAttributes());



        foreach ($user->getAttributes() as $column => $value) {

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
                    // case 'pp_name':
                    //     break;
                    // case 'pp_location':
                    //     break;


                default:
                    if ($value === null) {
                        $countNull++;
                    }
                    $countColumn++;
                    break;
            }
        }

        // $countColumn += 4; // for expert table column

        $countColumn += 6;
        if ($user->education->isEmpty()) {
            $countNull += 6;
        }

        $countColumn += 6;
        if ($user->training->isEmpty()) {
            $countNull += 6;
        }

        $countColumn += 5;
        if ($user->experience->isEmpty()) {
            $countNull += 5;
        }



        $progress =  round((100 - (floatval($countNull) / floatval($countColumn)) * 100)) . '%';
        /**
         * End account progress here
         */
        $page_title = 'Counselor dashboard';

        // return view('doctor.dashboard',compact('user','progress','page_title'));
        return view('counselor.dashboard', compact('user', 'progress', 'page_title'));
    }
    public function show_profile()
    {
        $user = Auth::user();

        $user->load('expert', 'training', 'education', 'experience');

        $countNull = 0;
        $countColumn = 0;



        foreach ($user->getAttributes() as $column => $value) {

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
                    // case 'pp_name':
                    //     break;
                    // case 'pp_location':
                    //     break;

                default:
                    if ($value === null) {
                        $countNull++;
                    }
                    $countColumn++;
                    break;
            }
        }

        // $countColumn += 4; // for expert table column

        $countColumn += 6;
        if ($user->education->isEmpty()) {
            $countNull += 6;
        }

        $countColumn += 6;
        if ($user->training->isEmpty()) {
            $countNull += 6;
        }

        $countColumn += 5;
        if ($user->experience->isEmpty()) {
            $countNull += 5;
        }



        $progress =  round((100 - (floatval($countNull) / floatval($countColumn)) * 100)) . '%';
        /**
         * End account progress here
         */
        $page_title = 'Counselor Profile';

        return view('counselor.profile', compact('user', 'progress', 'page_title'));
    }

    public function counselor_profile_wizard_step()
    {
        $user = Auth::user();
        $country_phone = json_decode(file_get_contents(public_path('data/countries.json')), true);
        // dd($country_phone);
        return view('wizard_step_form.counselor_form', compact('user', 'country_phone'));
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
}
