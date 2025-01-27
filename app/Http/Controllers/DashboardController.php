<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPurchase = Purchase::sum('total_amount');
        $totalSale = Sale::sum('total_amount');
        $totalSupplier = Supplier::count();
        $totalProduct = Product::count();

        $data = array(
            'totalPurchase' => $totalPurchase,
            'totalSale' => $totalSale,
            'totalSupplier' => $totalSupplier,
            'totalProduct' => $totalProduct,
        );

        return view('dashboard', compact('data'));
    }
}
