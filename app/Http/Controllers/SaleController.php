<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Journal;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('product')->paginate(10);
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $data = $request->validated();

            $product = Product::findOrFail($data['product_id']);

            if ($product->current_stock < $data['quantity']) {
                return back()->withErrors(['quantity' => 'Insufficient stock']);
            }

            // Calculate amounts
            $subtotal = $product->sell_price * $data['quantity'];
            $discount = $data['discount'] ?? 0;
            $vat = ($subtotal - $discount) * 0.05; // 5% VAT
            $total_amount = $subtotal - $discount + $vat;
            $due_amount = $total_amount - $data['paid_amount'];

            // Create sale
            $sale = Sale::create([
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
                'discount' => $discount,
                'vat' => $vat,
                'total_amount' => $total_amount,
                'paid_amount' => $data['paid_amount'],
                'due_amount' => $due_amount
            ]);

            // Update stock
            $product->decrement('current_stock', $data['quantity']);

            // Create journal entries
            Journal::create([
                'sale_id' => $sale->id,
                'type' => 'sales',
                'amount' => $subtotal,
                'description' => 'Sale revenue'
            ]);

            if ($discount > 0) {
                Journal::create([
                    'sale_id' => $sale->id,
                    'type' => 'discount',
                    'amount' => -$discount,
                    'description' => 'Sale discount'
                ]);
            }

            Journal::create([
                'sale_id' => $sale->id,
                'type' => 'vat',
                'amount' => $vat,
                'description' => 'VAT collected'
            ]);

            Journal::create([
                'sale_id' => $sale->id,
                'type' => $due_amount > 0 ? 'due' : 'cash',
                'amount' => $due_amount,
                'description' => $due_amount > 0 ? 'Accounts receivable' : 'Cash received'
            ]);

            return redirect()->route('sales.index')->with('success', 'Sale recorded successfully');
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
