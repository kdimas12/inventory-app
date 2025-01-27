<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $title = 'Hapus barang!';
        $text = "Apa kamu yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('product.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'unit' => 'required',
            'sell_price' => 'required',
        ]);

        Product::create($request->all());
        return redirect()->route('product.index')->with('toast_success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('product.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'unit' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
        ]);

        $product->update($request->all());
        return redirect()->route('product.index')->with('toast_success', 'Barang berhasil diubah!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('toast_success', 'Barang berhasil dihapus!');
        // echo json_decode($product);
    }
}
