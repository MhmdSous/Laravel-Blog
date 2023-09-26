<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    use  GeneralTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contact::all();
        return $this->sendResponse($data, 'successfuly!');
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

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'message' => 'required',
                'subject' => 'required',
            ],
            [
                'name.required' => 'The name field is required.',
                'name.max' => 'The name field may not be greater than 255 characters.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'phone.required' => 'The phone field is required.',
                'phone.numeric' => 'The phone field must be numeric.',
                'message.required' => 'The message field is required.',
                'subject.required' => 'The subject field is required.',

            ]
        );
        if ($validator->fails()) {
            return $this->returnError('validation Error', $validator->errors());
        }
        // store in the database
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');
        $contact->subject = $request->input('subject');
        $contact->save();
        return $this->sendResponse($contact, 'successfuly!');
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
}
