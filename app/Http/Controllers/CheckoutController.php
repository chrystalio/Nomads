<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('pages._checkout');
    }

    public function success()
    {
        return view('pages._success');
    }
}
