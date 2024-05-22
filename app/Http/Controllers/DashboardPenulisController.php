<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class DashboardPenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dashboard_penulis.dashboard_penulis_index', [
            'penuliss' => Penulis::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard_penulis.dashboard_penulis_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'penulis_name' => ['required'],
        ]);

        Penulis::create([
            'nama' => $request->penulis_name
        ]);

        return redirect()->route('dashboard_penulis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('dashboard.dashboard_penulis.dashboard_penulis_edit', [
            'penulis' => Penulis::where('slug', $slug)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'penulis_name' => ['required'],
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->slug = null;

        $penulis->update([
            'nama' => $request->penulis_name,
        ]);

        return redirect()->route('dashboard_penulis.index')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penulis::findOrFail($id)->delete();

        return redirect()->route('dashboard_penulis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
