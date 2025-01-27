<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $title = 'Hapus inventori!';
        $text = "Apa kamu yakin ingin menghapus?";
        confirmDelete($title, $text);

        $inventories = Inventory::orderBy('expired_date', 'asc')->get();

        return view('inventory.index', compact('inventories'));
    }
}
