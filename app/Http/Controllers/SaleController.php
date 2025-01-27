<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\StockMutation;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // $sales = Sale::where('user_id', auth()->id())->get();
        if (auth()->user()->isOwner()) {
            $sales = Sale::latest()->get();
        } else {
            $sales = Sale::where('user_id', auth()->id())->latest()->get();
        }
        return view('sale.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::with('inventories')
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'quantity' => $product->inventories->sum('quantity'),
                    'sell_price' => $product->sell_price,
                    'unit' => $product->unit,
                ];
            });

        $invoiceNumber = Sale::generateInvoiceNumber();

        return view('sale.create', compact('products', 'invoiceNumber'));
        // dd($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.quantity' => 'required|integer',
            'products.*.sub_total' => 'required|numeric|min:0',
            'invoice_number' => 'required|string',
            'sale_date' => 'required|date',
            'payment_status' => 'required|in:lunas,belum_lunas',
            'payment_method' => 'required|in:tunai,transfer'
        ]);

        $totalAmount = collect($request->products)->sum('sub_total');

        $sale = Sale::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'invoice_number' => $request->invoice_number,
            'sale_date' => $request->sale_date,
            'total_amount' => $totalAmount,
            'payment_status' => $request->payment_status,
            'payment_method' => $request->payment_method
        ]);

        foreach ($request->products as $product) {
            // find the inventory id with fefo method
            $inventory = Inventory::where('product_id', $product['id'])
                ->orderBy('expired_date')
                ->orderBy('quantity')
                ->first();

            $inventory->decrement('quantity', $product['quantity']);

            SaleDetail::create([
                'sale_id' => $sale->id,
                'inventory_id' => $inventory->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'sell_price' => $inventory->product->sell_price,
                'subtotal' => $product['sub_total']
            ]);

            StockMutation::create([
                'inventory_id' => $inventory->id,
                'user_id' => auth()->id(),
                'mutation_type' => 'keluar',
                'quantity' => $product['quantity'],
                'description' => 'Penjualan produk',
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil disimpan');
    }
}
