<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dashboard_siswa.dashboard_siswa_index', [
            'siswas' => User::where('role', 'siswa')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard_siswa.dashboard_siswa_create');
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
            // 'kelas' => ['required'],
            // 'email' => ['required', 'unique:users,email', 'email:dns'],
            // 'no_telp' => ['required', 'unique:users,no_telp', 'min:8'],
            'password' => ['required', 'min:8'],
        ]);

        $image = $request->file('image');
        $image->storeAs('public/siswa', $image->hashName());

        User::create([
            'image' => $image->hashName(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            // 'class' => $request->kelas,
            // 'email' => $request->email,
            // 'no_telp' => $request->no_telp,
            'password' => $request->password,
            'role' => 'siswa',
            'created_at' => now(),
        ]);

        return redirect()->route('dashboard_siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        return view('dashboard.dashboard_siswa.dashboard_siswa_show', [
            'siswa' => User::where('username', $username)->firstOrFail(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        return view('dashboard.dashboard_siswa.dashboard_siswa_edit', [
            'siswa' => User::where('username', $username)->firstOrFail(),
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
            // 'kelas' => ['required'],
            // 'email' => ['required'],
            // 'no_telp' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        $siswa = User::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/siswa', $image->hashName());

            Storage::delete('public/siswa/'.$siswa->image);

            $siswa->update([
                'image' => $image->hashName(),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                // 'class' => $request->kelas,
                // 'email' => $request->email,
                // 'no_telp' => $request->no_telp,
                'password' => $request->password,
                'updated_at' => now(),
            ]);
        } else {
            $siswa->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                // 'class' => $request->kelas,
                // 'email' => $request->email,
                // 'no_telp' => $request->no_telp,
                'password' => $request->password,
                'updated_at' => now(),
            ]);
        }
        
        return redirect()->route('dashboard_siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('dashboard_siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
