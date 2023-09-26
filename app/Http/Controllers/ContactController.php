<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('contact.index', [
            'contacts' => $contacts,
        ]);
    }

    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect('/contact');

    }
}
