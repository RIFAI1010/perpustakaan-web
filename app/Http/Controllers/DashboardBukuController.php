<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Category;
use App\Models\Penerbit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dashboard_buku.dashboard_buku', [
            'bukus' => Buku::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard_buku.dashboard_buku_create', [
            'penuliss' => Penulis::all(),
            'penerbits' => Penerbit::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required','image','mimes:jpeg,jpg,png','max:4096'],
            'judul' => ['required'],
            'penulis_id' => ['required'],
            'penerbit_id' => ['required'],
            'category_id' => ['required'],
            'deskripsi' => ['required'],
            'isbn' => ['required', 'min:10',' max:10'],
            'jumlah_halaman' => ['required'],
            'bahasa' => ['required'],
            'tanggal_terbit' => ['required'],
            'tipe' => ['required'],
            'status_ketersediaan' => ['required'],
            'category_id' => ['required'],
            'penulis_id' => ['required'],
        ]);

        $image = $request->file('image');
        $image->storeAs('public/buku', $image->hashName());

        $createdBuku = Buku::create([
            'image' => $image->hashName(),
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'penerbit_id' => $request->penerbit_id,
            'deskripsi' => $request->deskripsi,
            'isbn' => $request->isbn,
            'jumlah_halaman' => $request->jumlah_halaman,
            'bahasa' => $request->bahasa,
            'tanggal_terbit' => now(),
            'tipe' => $request->tipe,
            'status_ketersediaan' => $request->status_ketersediaan,
        ]);

        DB::table('penulis_buku')->insert([
            'penulis_id' => $request->penulis_id,
            'buku_id' => $createdBuku->id,
        ]);
        
        DB::table('category_buku')->insert([
            'category_id' => $request->category_id,
            'buku_id' => $createdBuku->id,
        ]);

        return redirect()->route('dashboard_buku.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('dashboard.dashboard_buku.dashboard_buku_show', [
            'buku' => Buku::all()->firstWhere('slug', $slug),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('dashboard.dashboard_buku.dashboard_buku_edit', [
            'buku' => Buku::all()->firstWhere('slug', $slug),
            'penuliss' => Penulis::all(),
            'penerbits' => Penerbit::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => ['image','mimes:jpeg,jpg,png','max:4096'],
            'judul' => ['required'],
            'penulis_id' => ['required'],
            'penerbit_id' => ['required'],
            'category_id' => ['required'],
            'deskripsi' => ['required'],
            'isbn' => ['required', 'min:10',' max:10'],
            'jumlah_halaman' => ['required'],
            'bahasa' => ['required'],
            'tanggal_terbit' => ['required'],
            'tipe' => ['required'],
            'status_ketersediaan' => ['required'],
            'category_id' => ['required'],
            'penulis_id' => ['required'],
        ]);

        $buku = Buku::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/buku', $image->hashName());

            Storage::delete('public/buku/'.$buku->image);

            $buku->update([
                'image' => $image->hashName(),
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'penerbit_id' => $request->penerbit_id,
                'deskripsi' => $request->deskripsi,
                'isbn' => $request->isbn,
                'jumlah_halaman' => $request->jumlah_halaman,
                'bahasa' => $request->bahasa,
                'tanggal_terbit' => now(),
                'tipe' => $request->tipe,
                'status_ketersediaan' => $request->status_ketersediaan,
            ]);

            DB::table('penulis_buku')
                ->where('penulis_id', $buku->penulis()->get()[0]->id)
                ->where('buku_id', $buku->id)->update([
                'penulis_id' => $request->penulis_id
            ]);
            
            DB::table('category_buku')
                ->where('category_id', $buku->category()->get()[0]->id)
                ->where('category_id', $buku->id)->update([
                'category_id' => $request->category_id
            ]);
        } else {
            $buku->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'penerbit_id' => $request->penerbit_id,
                'deskripsi' => $request->deskripsi,
                'isbn' => $request->isbn,
                'jumlah_halaman' => $request->jumlah_halaman,
                'bahasa' => $request->bahasa,
                'tanggal_terbit' => now(),
                'tipe' => $request->tipe,
                'status_ketersediaan' => $request->status_ketersediaan,
            ]);
            
            DB::table('penulis_buku')
                ->where('penulis_id', $buku->penulis()->get()[0]->id)
                ->where('buku_id', $buku->id)->update([
                'penulis_id' => $request->penulis_id
            ]);
            
            DB::table('category_buku')
                ->where('category_id', $buku->category()->get()[0]->id)
                ->where('category_id', $buku->id)->update([
                'category_id' => $request->category_id
            ]);
        }

        return redirect()->route('dashboard_buku.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        Storage::delete('public/buku/'. $buku->image);

        $buku->delete();

        return redirect()->route('dashboard_buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}