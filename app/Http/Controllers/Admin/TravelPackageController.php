<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TravelPackageRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Prologue\Alerts\Facades\Alert;

class TravelPackageController extends Controller
{
    public function index()
    {
        $items = TravelPackage::all();

        return view('pages.admin.travel-package._index', [
            'items' => $items,
        ]);
    }

    public function create()
    {
        return view('pages.admin.travel-package._create');
    }

    public function store(TravelPackageRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        DB::beginTransaction();
        try {
            TravelPackage::create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput($request->all());
        }
        DB::commit();

        // Add alert message here using Prologue Alerts
        Alert::success('Travel Package has been created successfully')->flash();

        return redirect()->route('travel-package.index');



    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
