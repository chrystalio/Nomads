<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TravelPackage;

class DashboardController extends Controller
{


    public function index()
    {
        // Count Travel Packages, Transactions, And Pending/Success Status
        $travelPackagesCount = TravelPackage::count();
        $transactionsCount = Transaction::count();
        $pendingTransactionsCount = Transaction::where('transaction_status', 'PENDING')->count();
        $successTransactionsCount = Transaction::where('transaction_status', 'SUCCESS')->count();

        return view('pages.admin._dashboard',
        [
            'travelPackagesCount' => $travelPackagesCount,
            'transactionsCount' => $transactionsCount,
            'pendingTransactionsCount' => $pendingTransactionsCount,
            'successTransactionsCount' => $successTransactionsCount,
        ]);
    }
}
