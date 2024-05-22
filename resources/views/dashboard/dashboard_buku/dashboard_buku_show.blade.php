@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<style>
  #book-cover {
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    max-width: 400px;
    height: 380px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #book-cover img {
    width: auto;
    max-width: 100%;
    max-height: 100%;
  }

</style>
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between mb-4">
      <div>
        <a href="/dashboard_buku" class="btn btn-outline-primary">
          <i class="ti ti-arrow-left"></i>
          Kembali
        </a>
      </div>
      <div class="d-flex gap-2 justify-content-end">
        <div>
          <a href="/dashboard_buku/{{ $buku->slug }}/edit" class="btn btn-primary w-100">
            <i class="ti ti-edit"></i>
            Edit
          </a>
        </div>
        <div>
          <form action="" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure?');">
              <i class="ti ti-trash"></i>
              Delete
            </button>
          </form>
        </div>
      </div>
    </div>
    <h5 class="card-title fw-semibold mb-4">Detail Buku</h5>
    <div class="row">
      <div class="col-12 col-lg-4">
        <div id="book-cover" class="mb-4 bg-light">
          <img class="mx-auto mh-100" width="100" src="{{ asset("storage/buku/$buku->image") }}" alt="{{ $buku->title }}">
        </div>
      </div>
      <div class="col-12 col-lg-8 d-flex flex-wrap">
        <div class="w-100 mb-2">
          <h4 class="mb-2">{{ $buku->judul }}</h4>
          <h6>ID Buku: {{ $buku->id }}</h6>
          <h6>Author: Osama bin Laden</h6>
          <h6>Slug: {{ $buku->slug }}</h6>
          <h6>ISBN: {{ $buku->isbn }}</h6>
          <h6>Jumlah Halaman: {{ $buku->jumlah_halaman }}</h6>
          <h6>Bahasa: {{ $buku->bahasa }}</h6>
          <h6>Rata-rata Rating: {{ $buku->rata_rata_rating }}</h6>
          <h6>Jumlah Perating: {{ $buku->jumlah_rating }}</h6>
          <h6>Tanggal Publish: {{ $buku->tanggal_terbit }}</h6>
          <h6>Tipe: {{ $buku->tipe }}</h6>
          <h6>Status Ketersediaan: {{ $buku->status_ketersediaan ? 'Tersedia' : 'Tidak Tersedia'}}</h6>
          <h6>Status Approval: {{ $buku->status_approval }}</h6>
          <h6>ID Penerbit: {{ $buku->penerbit_id }}</h6>
          <h6>ID Peminjam: {{ $buku->peminjam_id }}</h6>
          <h6>Tanggal Memulai Peminjaman: {{ $buku->tanggal_memulai_peminjaman }}</h6>
          <h6>Tanggal Deadline: {{ $buku->tanggal_deadline_peminjaman }}</h6>
          <h6>Dibuat Pada: {{ $buku->created_at }}</h6>
          <h6>Diupdate Pada: {{ $buku->updated_at }}</h6>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include('dashboard.footer')