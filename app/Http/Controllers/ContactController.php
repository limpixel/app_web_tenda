<?php

namespace App\Http\Controllers;

use App\Models\Dashboard\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = ContactModel::all();
        return view('contact.index', compact('contact'));
    }

    
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_telfon' => 'string',
            'gmail' => 'string',
            'instagram' => 'string',
            'facebook' => 'string',
            'twitter' => 'string',
        ]);

        ContactModel::create($request->all());

        notify('success', 'Your Contact Has been Setup');
        return redirect()->route('dashboard.contact.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = ContactModel::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_telfon' => 'string',
            'gmail' => 'string',
            'instagram' => 'string',
            'facebook' => 'string',
            'twitter' => 'string',
        ]);

        $contact = ContactModel::findOrFail($id);
        $contact->update($request->all());

        notify('success', 'Your Contact Has been Edited');
        return redirect()->route('dashboard.contact.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = ContactModel::findOrFail($id);
        $contact->delete();

        notify('success', 'Your Contact Has been Deleted');
        return redirect()->route('dashboard.contact.index');

    }
}
