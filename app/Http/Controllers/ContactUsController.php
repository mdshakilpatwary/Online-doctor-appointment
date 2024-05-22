<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{


    public function store(Request $request) :RedirectResponse
    {
        $request->validate([
            'first_name' => ['required',],
            'last_name' => ['required'],
            'email' => ['required','email'],
            'message' => ['required','min:10'],
        ]);

        $contact = ContactUs::create($request->all());

        return back()->with('status', 'Your query has been sent successfully!');


//        $this->validator($request->all())->validate();

    }
}
