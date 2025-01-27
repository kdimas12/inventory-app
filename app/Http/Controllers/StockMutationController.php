<?php

namespace App\Http\Controllers;

use App\Models\StockMutation;
use Illuminate\Http\Request;

class StockMutationController extends Controller
{
    public function index()
    {
        $stockMutations = StockMutation::all()->sortByDesc('created_at');

        return view('stock-mutation.index', compact('stockMutations'));
    }
}
