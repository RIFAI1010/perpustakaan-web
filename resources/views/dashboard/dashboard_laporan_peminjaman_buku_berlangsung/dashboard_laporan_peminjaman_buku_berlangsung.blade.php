@include('dashboard.head')
@extends('dashboard.body')
@section('main')
@if (session('success'))
    <div class="pb-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
@endif
@if (session('failed'))
  <div class="pb-2">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('failed') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
@endif
<div class="row mb-2">
    <div class="col-12 col-lg-5">
      <h5 class="card-title fw-semibold mb-4">
          Data Laporan Peminjaman Buku Berlangsung
      </h5>
    </div>
    <div class="col-12 col-lg-7">
      <div class="d-flex gap-2 justify-content-md-end">
        <div>
          <form action="" method="get">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari data" aria-label="Cari data" aria-describedby="searchButton">
              <button class="btn btn-outline-secondary" type="submit" id="searchButton">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead class="table-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ID Buku</th>
          <th scope="col">ID Peminjam</th>
          <th scope="col">Tanggal Pengajuan Peminjaman</th>
          <th scope="col">Tanggal Peminjaman Disetujui</th>
          <th scope="col">Tanggal Deadline Peminjaman</th>
          <th scope="col">Tanggal Pengambalian Peminjaman</th>
          <th scope="col">Status Pengembalian</th>
          <th scope="col">Denda</th>
          <th scope="col">Foto Buku Dikembalikan</th>
          <th scope="col">Dibuat Pada</th>
          <th scope="col">Diupdate Pada</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @forelse ($data_peminjaman_buku_berlangsung as $data)
          <tr>
            <td>{{ $data->id}}</td>
            <td>
              <p>{{ $data->buku_id }}</p>
            </td>
            <td>
              <p>{{ $data->peminjam_id }}</p>
            </td>
            <td>
              <p>{{ $data->tanggal_pengajuan_peminjaman }}</p>
            </td>
            <td>
              <p>{{ $data->tanggal_peminjaman_disetujui }}</p>
            </td>
            <td>
              <p>{{ $data->tanggal_deadline_peminjaman }}</p>
            </td>
            <td>
              <p>{{ $data->tanggal_pengembalian_peminjaman }}</p>
            </td>
            <td>
              <p>{{ $data->status_pengembalian }}</p>
            </td>
            <td>
              <p>{{ $data->denda }}</p>
            </td>
            <td>
              <p>{{ $data->foto_buku_dikembalikan }}</p>
            </td>
            <td>
              <p>{{ $data->created_at }}</p>
            </td>
            <td>
              <p>{{ $data->updated_at }}</p>
            </td>
          </tr>
          @empty
              <tr>
              <td class="text-center" colspan="12"><b>Tidak ada data</b></td>
              </tr>
          @endforelse
      </tbody>
    </table>
  </div>
@endsection
@include('dashboard.footer')