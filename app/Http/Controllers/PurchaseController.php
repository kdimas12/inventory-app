<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Inventory;
use App\Models\StockMutation;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        if (auth()->user()->isOwner()) {
            $purchases = Purchase::latest()->get();
        } else {
            $purchases = Purchase::where('user_id', auth()->id())->latest()->get();
        }
        return view('purchase.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $invoiceNumber = Purchase::generateInvoiceNumber();

        return view('purchase.create', compact('products', 'suppliers', 'invoiceNumber'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'exists:products,id',
            'products.*.quantity' => 'required|integer',
            'products.*.expired_date' => 'required|date',
            'products.*.buy_price' => 'required|numeric|min:0',
            'products.*.sub_total' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'invoice_number' => 'required|string',
            'purchase_date' => 'required|date',
            'payment_status' => 'required|in:lunas,belum_lunas',
            'payment_method' => 'required|in:tunai,transfer'
        ]);

        $totalAmount = collect($request->products)->sum('sub_total');

        $purchase = Purchase::create([
            'supplier_id' => $request->supplier_id,
            'user_id' => auth()->id(),
            'invoice_number' => $request->invoice_number,
            'purchase_date' => $request->purchase_date,
            'total_amount' => $totalAmount,
            'payment_status' => $request->payment_status,
            'payment_method' => $request->payment_method
        ]);

        foreach ($request->products as $product) {
            PurchaseDetail::create([
                'purchase_id' => $purchase->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'buy_price' => $product['buy_price'],
                'subtotal' => $product['sub_total'],
                'expired_date' => $product['expired_date']
            ]);
        }

        $inventoryBatchNumber = Inventory::generateBatchNumber();

        foreach ($request->products as $product) {
            $inventory = Inventory::create([
                'product_id' => $product['id'],
                'batch_number' => $inventoryBatchNumber,
                'quantity' => $product['quantity'],
                'expired_date' => $product['expired_date'],
                'entry_date' => $request->purchase_date
            ]);

            StockMutation::create([
                'inventory_id' => $inventory->id,
                'user_id' => auth()->id(),
                'mutation_type' => 'masuk',
                'quantity' => $product['quantity'],
                'description' => 'Pembelian produk',
            ]);

            // update buy price in product table
            Product::find($product['id'])->update([
                'buy_price' => $product['buy_price']
            ]);
        }

        return redirect()->route('purchase.index')->with('toast_success', 'Product batch created successfully');
    }
}
