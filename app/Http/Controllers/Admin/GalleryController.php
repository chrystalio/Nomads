<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\GalleryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Prologue\Alerts\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::with('travel_package')->get();

        return view('pages.admin.gallery._index', [
            'items' => $items,
        ]);
    }

    public function create()
    {
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery._create',[
            'travel_packages' => $travel_packages,
        ]);
    }

    public function store(GalleryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        DB::beginTransaction();
        try {
            Gallery::create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput($request->all());
        }
        DB::commit();

        // Add alert message here using Prologue Alerts
        Alert::success('Image has been created successfully')->flash();

        return redirect()->route('gallery.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $item = Gallery::findOrFail($id);

        return view('pages.admin.gallery._edit', [
            'item' => $item,
        ]);
    }

    public function update(GalleryRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $item = Gallery::findOrFail($id);

        DB::beginTransaction();
        try {
            $item->update($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput($request->all());
        }
        DB::commit();

        // Add alert message here using Prologue Alerts
        Alert::success('Image has been updated successfully')->flash();

        return redirect()->route('gallery.index');
    }

    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);

        DB::beginTransaction();
        try {
            $item->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
        DB::commit();

        // Add alert message here using Prologue Alerts
        Alert::success('Image has been deleted successfully')->flash();

        return redirect()->route('gallery.index');
    }
}
