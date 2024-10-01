<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SaleItem;

class SalesController extends Controller
{
    public function POS()
    {

        $customers = Customer::select('id', 'name')->get();

        $products = Product::select('id', 'name', 'price')->get();

        return view('sales.create', compact('customers', 'products'));
    }


    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $sale = Sale::create([
                'customer_id' => $request->customer_id,
                'subtotal' => $request->sub_total,
                'tax_amount' => $request->tax_amount,
                'total_amount' => $request->total_amount,
            ]);

            foreach ($request->product as $index => $productId) {
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $productId,
                    'quantity' => $request->qty[$index],
                    'price' => $request->price[$index],
                    'total' => $request->total[$index],
                ]);
            }
        });

        return redirect()->route('sales.index')->with('success', 'Sale created successfully!');
    }

    public function index()
    {
        $sales = Sale::with('customer', 'saleItems.product')->get();

        return view('sales.view', compact('sales'));
    }


    public function Sales()
    {
        return view('sales.view');
    }
}
