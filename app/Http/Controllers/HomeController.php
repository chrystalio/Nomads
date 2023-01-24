<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;

class HomeController extends Controller
{
    public function index()
    {
        $items = TravelPackage::with('galleries')->get();

        return view('pages._home', [
                'items' => $items,
            ]);
    }
}
