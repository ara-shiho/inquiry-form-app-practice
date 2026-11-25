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
        $data = $request->validated();

        return view('confirm', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function store(ContactFormRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Contact::create($data);

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
