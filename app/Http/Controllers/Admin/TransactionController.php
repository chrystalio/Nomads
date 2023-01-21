<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $items = Transaction::with(['details', 'travel_package', 'user'])->get();

        return view('pages.admin.transaction._index',[
            'items' => $items,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        return view('pages.admin.transaction._detail',[
            'item' => $item,
        ]);
    }

    public function edit(transaction $transactions)
    {
    }

    public function update(Request $request, transaction $transactions)
    {
    }

    public function destroy(transaction $transactions)
    {
    }
}
