<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use ReflectionClass;


class TransaksiController extends Controller
{
    // public function mengantri_peminjaman(string $slug){
    //     $buku = Buku::where('slug', $slug)->firstOrFail();
    //     $currentUser = Auth::user();
    //     $tableUserMengantriPeminjamanBuku = DB::table('user_mengantri_peminjaman_buku');
    //     $tableLaporanPeminjamanBukuBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung');

    //     // kalo sedang didenda tidak boleh dipinjam
        
    //     // check apakah user sudah ada di table user_mengantri_peminjaman_buku dengan idBuku sama
    //     if($tableUserMengantriPeminjamanBuku
    //         ->where('buku_id', $buku->id)
    //         ->where('peminjam_id', $currentUser->id)->get()->count()){
    //         // batal_mengantri_peminjaman
    //         // redirect
    //     }

    //     // check apakah user sedang meminjam buku yg sama
    //     if(Buku::where('slug', $slug)->where('peminjam_id', $currentUser->id)->get()->count){
    //         // redirect
    //     }

    //     // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
    //     if($tableLaporanPeminjamanBukuBerlangsung->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count){
    //         // redirect
    //     }

    //     DB::table('user_mengantri_peminjaman_buku')->insert([
    //         'buku_id' => $buku->id,
    //         'peminjam_id' => Auth::user()->id,
    //         'tanggal_pengajuan_peminjaman' => now(),
    //         'created_at' => now(),
    //     ]);

    //     // redirect with msg
    // }

    // public function batal_mengantri_peminjaman(string $slug) {
    //     $buku = Buku::where('slug', $slug)->firstOrFail();
    //     DB::table('user_mengantri_peminjaman_buku')
    //         ->where('buku_id', $buku->id)
    //         ->where('peminjam_id', Auth::user()->id)
    //         ->delete();

    //     // redirect
    // }

    // public function mengantri_pengembalian(Request $request,string $slug){
    //     $buku = Buku::where('slug', $slug)->firstOrFail();
    //     $currentUser = Auth::user();
    //     $tableUserMengantriPengembalian = DB::table('user_mengantri_pengembalian_buku');
    //     $tableLaporanPeminjamanBukuBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung');
    //     $laporanPeminjamanBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung')->where('buku_id', $buku->id)
    //     ->where('user_id', Auth::user()->id);


    //     // check apakah user sudah ada di table user_mengantri_pengembalian_buku dengan idBuku sama
    //     if($tableUserMengantriPengembalian->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count()){
    //         // redirect
    //     }

    //     // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
    //     if($tableLaporanPeminjamanBukuBerlangsung->get()->count()){
    //         // redirect
    //     }

    //     $laporanPeminjamanBerlangsung->update([
    //         'tanggal_pengembalian_peminjaman' => now(),
    //         'status_pengembalian' => $request->status_pengembalian,
    //         'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan,
    //         'updated_at' => now(),
    //     ]);

    //     DB::table('user_mengantri_pengembalian_buku')->insert([
    //         'buku_id' => $buku->id,
    //         'peminjam_id' => Auth::user()->id,
    //         'tanggal_deadline_peminjaman' => $laporanPeminjamanBerlangsung->first()->tanggal_deadline_peminjaman,
    //         'tanggal_pengembalian_peminjaman' => now(),
    //         'status_pengembalian' => $request->status_pengembalian,
    //         'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan,
    //         'created_at' => now(),
    //     ]);

    //     // redirect with msg
    // }


    
    public function mengantri_peminjaman(string $slug)
    {
        $currentUser = Auth::user();
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $tableUserMengantriPeminjamanBuku = DB::table('user_mengantri_peminjaman_buku');
        $tableLaporanPeminjamanBukuBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung');

        //fungsi memecah object
        // function getProtectedProperty($object, $property) {
        //     $reflection = new ReflectionClass($object);
        //     $property = $reflection->getProperty($property);
        //     $property->setAccessible(true);
        //     return $property->getValue($object);
        // }
        // $collection = $tableLaporanPeminjamanBukuBerlangsung->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->where('denda', '>', 0)->get();
        // $escapeWhenCastingToString = getProtectedProperty($collection, 'escapeWhenCastingToString');
        // dd($escapeWhenCastingToString);
        
        // dd($tableLaporanPeminjamanBukuBerlangsung->where('peminjam_id', $currentUser->id)->where('denda', '>', 0)->get()->count());

        
        
        // kalo denda gak bisa
        if($tableLaporanPeminjamanBukuBerlangsung->where('peminjam_id', $currentUser->id)->where('denda', '>', 0)->get()->count() != 0){
            return back()->with(['failed' => 'Anda sedang terkena denda!']);
        }

        // check apakah user sudah ada di table user_mengantri_peminjaman_buku dengan idBuku sama
        if($tableUserMengantriPeminjamanBuku->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count() > 0){
            return back()->with(['failed' => 'Anda sudah mengantri!']);
        }

        // check apakah user sedang meminjam buku yg sama
        if(Buku::where('slug', $slug)->where('peminjam_id', $currentUser->id)->get()->count()){
            return back()->with(['failed' => 'Anda sudah meminjam buku ini!']);
        }

        // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
        if($tableLaporanPeminjamanBukuBerlangsung->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count()){
            return back()->with(['failed' => 'Mengantri peminjaman gagal!']);
        }

        DB::table('user_mengantri_peminjaman_buku')->insert([
            'buku_id' => $buku->id,
            'peminjam_id' => $currentUser->id,
            'tanggal_pengajuan_peminjaman' => now(),
            'created_at' => now(),
        ]);

        return back()->with(['success' => 'Berhasil mengantri peminjaman!']);
    }

    public function batal_antri_peminjaman(string $slug)
    {
        $currentUser = Auth::user();
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $tableUserMengantriPeminjamanBuku = DB::table('user_mengantri_peminjaman_buku')
            ->where('buku_id', $buku->id)
            ->where('peminjam_id', $currentUser->id);


        // check apakah mengantri
        if($tableUserMengantriPeminjamanBuku->get()->count() == false){
            return back()->with(['failed' => 'Anda tidak mengantri!']);
        }
        
        $tableUserMengantriPeminjamanBuku->delete();

        return back()->with(['success' => 'Berhasil membatalkan antrian!']);
    }

    public function mengantri_pengembalian(Request $request, string $slug){
        $currentUser = Auth::user();
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $tableUserMengantriPengembalian = DB::table('user_mengantri_pengembalian_buku');
        $tableLaporanPeminjamanBukuBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung');
        $laporanPeminjamanBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung')->where('buku_id', $buku->id)
            ->where('peminjam_id', $currentUser->id);


        // check apakah user sudah ada di table user_mengantri_pengembalian_buku dengan idBuku sama
        if($tableUserMengantriPengembalian->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count()){
            return back()->with(['failed' => 'Anda sudah mengantri!']);
        }

        // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
        if($tableLaporanPeminjamanBukuBerlangsung->get()->count() == false){
            return back()->with(['failed' => 'Mengantri gagal!']);
        }

        // delete peminjam buku
        Buku::findOrFail($buku->id)->update([
            'peminjam_id' => null,
            'status_ketersediaan' => 1,
            'tanggal_deadline_peminjaman' => null,
            'updated_at' => now(),
        ]);

        $laporanPeminjamanBerlangsung->update([
            'tanggal_pengembalian_peminjaman' => now(),
            //
            'status_pengembalian' => 'normal',
            'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan ?? '',
            'updated_at' => now(),
        ]);

        DB::table('user_mengantri_pengembalian_buku')->insert([
            'buku_id' => $buku->id,
            'peminjam_id' => $currentUser->id,
            'tanggal_deadline_peminjaman' => $laporanPeminjamanBerlangsung->first()->tanggal_deadline_peminjaman,
            'tanggal_pengembalian_peminjaman' => now(),
            //
            'status_pengembalian' => 'normal',
            'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan,
            'created_at' => now(),
        ]);

        return back()->with(['success' => 'Berhasil mengantri pengembalian!']);
    }
}