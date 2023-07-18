<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockOut;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $stock_outs = StockOut::with('products')->get();
        
        return view('layouts.admin.stock_out', compact('products'));
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
        $stock_outs = new StockOut;
        $stock_outs->product_id = $request->product_id;
        $stock_outs->qty = $request->qty;
        $stock_outs->description = $request->description;
        $stock_outs->save();

        $products = Product::find($request->product_id);
        $products->stock = $products->stock - $stock_outs->qty;
        $products->save();

        return redirect('stock_outs');
    }

    /**
     * Display the specified resource.
     */
    public function show(StockOut $stockOut)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockOut $stockOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockOut $stockOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockOut $stockOut)
    {
        //
    }
}
