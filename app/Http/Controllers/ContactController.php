<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function confirm(ContactFormRequest $request)
    {
        $validated = $request->validated();

        return view('confirm', compact('validated'));
    }

    /**
     * Display the specified resource.
     */
    public function store(ContactFormRequest $request)
    {
        Contact::create($request->validated());
        return redirect()->route('contacts.thanks');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function thanks()
    {
        return view('thanks');
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
