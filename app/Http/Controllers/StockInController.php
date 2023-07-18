<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $stock_ins = StockIn::with('products','suppliers')->get();
        // return $stock_ins;

        return view('layouts.admin.stock_in', compact('stock_ins', 'products', 'suppliers'));
    }

    public function report()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $stock_ins = StockIn::with('products', 'suppliers')->get();
        
        // return $stock_ins;
        return view('layouts.admin.report', compact('stock_ins'));;
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
        $stock_ins = new StockIn;
        $stock_ins->nota = $request->nota;
        $stock_ins->product_id = $request->product_id;
        $stock_ins->supplier_id = $request->supplier_id;
        $stock_ins->qty = $request->qty;
        $stock_ins->price = $request->price + ($request->price * 11/100);
        $stock_ins->save();

        $products = Product::find($request->product_id);
        $products->stock = $products->stock + $stock_ins->qty;
        $products->save();

        return redirect('stock_ins');
    }

    /**
     * Display the specified resource.
     */
    public function show(StockIn $stockIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockIn $stockIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockIn $stockIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockIn $stockIn)
    {
        //
    }
}
