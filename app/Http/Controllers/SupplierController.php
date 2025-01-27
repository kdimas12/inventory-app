<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        $title = 'Hapus supplier!';
        $text = "Apa kamu yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('toast_success', 'Data supplier baru berhasil ditambahkan!');
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('toast_success', 'Data supplier berhasil diubah!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index')->with('toast_success', 'Data supplier berhasil dihapus!');
    }
}
