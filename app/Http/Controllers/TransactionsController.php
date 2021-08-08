<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(Contact $contact): View
    {
        return view('transactions.index', [
            'transactions' => $contact->transactions()->orderByDesc('id')->paginate(10),
            'contact' => $contact,
        ]);
    }

    public function store(Contact $contact, Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'amount' => ['required', 'numeric'],
        ]);

        $amount = intval($request->input('amount'));
        $total = $amount + $contact->total;

        $transaction = new Transaction();
        $transaction->contact_id = $contact->id;
        $transaction->title = $request->input('title');
        $transaction->amount = $amount;
        $transaction->total = $total;
        $transaction->save();

        return back()->with('success', 'Transaction added.');
    }
}
