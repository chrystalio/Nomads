<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $items = TravelPackage::with(['galleries'])->where('slug', $slug)->get();

        return view('pages._detail', [
            'items' => $items,
        ]);
    }
}
