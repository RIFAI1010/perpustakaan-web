<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dashboard_petugas.dashboard_petugas_index', [
            'petugass' => User::where('role', 'staff')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard_petugas.dashboard_petugas_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image','mimes:jpeg,jpg,png','max:4096'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email', 'email:dns'],
            'no_telp' => ['required', 'unique:users,no_telp', 'min:8'],
            'password' => ['required', 'min:8'],
        ]);

        $image = $request->file('image');
        $image->storeAs('public/petugas', $image->hashName());

        User::create([
            'image' => $image->hashName(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => $request->password,
            'role' => 'staff',
            'created_at' => now(),
        ]);

        return redirect()->route('dashboard_petugas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        return view('dashboard.dashboard_petugas.dashboard_petugas_show', [
            'petugas' => User::where('username', $username)->firstOrFail(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        return view('dashboard.dashboard_petugas.dashboard_petugas_edit', [
            'petugas' => User::where('username', $username)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => ['image','mimes:jpeg,jpg,png','max:4096'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'no_telp' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        $petugas = User::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/petugas', $image->hashName());

            Storage::delete('public/petugas/'.$petugas->image);

            $petugas->update([
                'image' => $image->hashName(),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'password' => $request->password,
                'updated_at' => now(),
            ]);
        } else {
            $petugas->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'password' => $request->password,
                'updated_at' => now(),
            ]);
        }
        
        return redirect()->route('dashboard_petugas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('dashboard_petugas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
