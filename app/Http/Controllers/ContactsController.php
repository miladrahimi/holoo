<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(): View
    {
        return view('contacts.index', [
            'contacts' => Contact::orderByDesc('id')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'unique:contacts']
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->save();

        return back()->with('success', 'Contact added.');
    }
}
