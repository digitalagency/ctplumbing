<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $form = 'edit';
        $contact = new Contact;
        $search = $contact->query();

        if ($con_name = $request->con_name) {
            $search->where('con_name', 'like', '%' . $con_name . '%');
        }
        $contacts = $search->orderBy('id', 'desc')->paginate(10);
        return view('backend.contact.index', compact('contacts', 'request', 'form'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = 'create';
        return view('backend.contact.form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //   dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
        ]);
        $contact = new Contact();
        $contact->con_name = $request->input('name');
        $contact->con_email = $request->input('email');
        $contact->con_phone = $request->input('contact');
        $contact->save();
       //return redirect()->route('home')->with('con_success', 'Your message has been sent.');
        return redirect(route('contact.index') . '#contact_form')->with('con_success', 'Your message has been sent.');
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact Deleted Successfully');
    }
}
