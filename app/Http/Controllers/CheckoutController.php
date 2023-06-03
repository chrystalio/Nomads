<?php


namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(Request $request, $uuid)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($uuid);
        return view('pages._checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $uuid)
    {
        $prefix = '#NM-';
        $dateComponent = Carbon::now()->format('ymd');
        $randomComponent = Str::upper(Str::random(4));

        $travel_package = TravelPackage::findOrFail($uuid);

        $transaction = Transaction::create([
            'travel_packages_uuid' => $uuid,
            'bookingId' => $prefix . $dateComponent . $randomComponent,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART',
        ]);

        $transaction_detail = TransactionDetail::create([
            'transactions_uuid' => $transaction->uuid,
            'users_id' => Auth::user()->id,
            'username' => Auth::user()->username,
            'nationality' => 'Indonesia',
            'is_visa' => false,
            'doe_passport' => Carbon::create($transaction->user->doe_passport)->format('Y-m-d'),
        ]);

        $transaction->save();

        return redirect()->route('checkout', $transaction->uuid);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);
        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transaction_uuid);

        if ($request->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;
        $transaction->transaction_status = 'CANCELLED';

        $transaction->save();

        $item->delete();

        return redirect()->route('detail', $transaction->travel_package->slug);
    }

    public function create(Request $request, $uuid)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transactions_id'] = $uuid;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->findOrFail($uuid);

        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $uuid);
    }

    public function success(Request $request, $uuid)
    {
        $transaction = Transaction::findOrFail($uuid);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        return view('pages._success');
    }
}
