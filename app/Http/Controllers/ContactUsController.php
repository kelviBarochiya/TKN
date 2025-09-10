<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::all();
        return view('admin.contact-us.list', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact-us.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address1' => 'required|string|max:255',
            'mobile_number1' => 'required|string|max:15',
            'email1' => 'required|email|max:255',
        ]);

        ContactUs::create($request->all());
        return redirect()->route('contact-us.index')->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $contact = ContactUs::findOrFail($id);
        return view('admin.contact-us.form', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address1' => 'required|string|max:255',
            'mobile_number1' => 'required|string|max:15',
            'email1' => 'required|email|max:255',
        ]);

        $contact = ContactUs::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('contact-us.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact-us.index')->with('success', 'Contact deleted successfully.');
    }
}
