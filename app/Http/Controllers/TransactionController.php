<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $products = Product::all();
        $transaction_details = TransactionDetail::all();
        $transactions = Transaction::with('users','transaction_details', 'transaction_details', 'transaction_details.products')->get();
        // return $transactions;

        return view('layouts.admin.transaction', compact('transactions', 'users','transaction_details', 'products'));
    }

    public function api()
    {
        $transactions = Transaction::with(['transaction_details.products'])
        ->join('users', 'user_id', 'transactions.user_id')->get();

        return $transactions;
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
        $this->validate($request, [
            'user_id' => 'required',
            'total' => 'required',
        ]);

        $transaction = Transaction::create($request->all());

        foreach ($request->multiple as $multi){
            $transaction_details = new TransactionDetail();
            $transaction_details->transaction_id = $multi;
            $transaction_details->qty = $multi;
            $products = Product::find($multi);
            $products->stock = $products->stock - $transaction_details->qty;
            $products->save();
            $transaction->transaction_details()->save($transaction_details);
        }

        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
