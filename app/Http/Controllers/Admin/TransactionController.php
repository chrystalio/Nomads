<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit($id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        return view('pages.admin.transaction._edit',[
            'item' => $item,
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);

        DB::beginTransaction();
        try {
            $item->update($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput($request->all());
        }
        DB::commit();

        // Add alert message here using Prologue Alerts
        Alert::success('Status has been updated successfully')->flash();

        return redirect()->route('transaction.index');
    }

    public function destroy(transaction $transactions)
    {
    }
}
