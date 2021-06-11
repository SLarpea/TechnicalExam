<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = ContactInformation::all();
        return view('contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'number' => 'required|unique:contact_information',
            'company' => 'required'
        ]);

        $contacts = ContactInformation::create($request->all());
        return redirect()->route('contact_informations.index')->with('success', 'Added New Contact!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function show(ContactInformation $contactInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactInformation $contactInformation)
    {
        return view('contacts.edit')->with(compact('contactInformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactInformation $contactInformation)
    {
        $request->validate([
            'title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'number' => 'required',
            'company' => 'required'
        ]);

        $contactInformation->update($request->all());
        return redirect()->route('contact_informations.index')->with('info', 'Updated Contact!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactInformation $contactInformation)
    {
        $contactInformation->delete();
        return redirect()->route('contact_informations.index')->with('success', 'Contact deleted successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        return view('contacts.import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import_file(Request $request)
    {
        $file = $request->file('file');

        $rows = array_map(function($v){return str_getcsv($v, ",");}, file($file));
        $header = array_shift($rows);
        $csv    = [];
        foreach($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        
        foreach($csv as $data){
            ContactInformation::firstOrCreate($data);
        }

        return redirect()->route('contact_informations.index')->with('success', 'Added New Contacts!');  
    }
}
