<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.admin.transaction._index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(transaction $transactions)
    {
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
