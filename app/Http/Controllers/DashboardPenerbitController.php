<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class DashboardPenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dashboard_penerbit.dashboard_penerbit_index', [
            'penerbits' => Penerbit::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard_penerbit.dashboard_penerbit_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'penerbit_name' => ['required'],
        ]);

        Penerbit::create([
            'nama' => $request->penerbit_name
        ]);

        return redirect()->route('dashboard_penerbit.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('dashboard.dashboard_penerbit.dashboard_penerbit_edit', [
            'penerbit' => Penerbit::where('slug', $slug)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'penerbit_name' => ['required'],
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->slug = null;

        $penerbit->update([
            'nama' => $request->penerbit_name,
        ]);

        return redirect()->route('dashboard_penerbit.index')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penerbit::findOrFail($id)->delete();

        return redirect()->route('dashboard_penerbit.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
