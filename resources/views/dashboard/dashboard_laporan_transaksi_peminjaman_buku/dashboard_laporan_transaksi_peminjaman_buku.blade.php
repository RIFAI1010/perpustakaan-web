<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  </head>

<body>
  
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
          Data Laporan Transaksi Peminjaman Buku
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
    <table class="table table-hover table-striped" id="myTable" class="display">
      <thead class="table-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ID Buku</th>
          <th scope="col">ID Peminjam</th>
          <th scope="col">Tanggal Pengajuan Peminjaman</th>
          <th scope="col">Tanggal Peminjaman Disetujui</th>
          <th scope="col">Tanggal Deadline Peminjaman</th>
          <th scope="col">Tanggal Pengambalian Peminjaman</th>
          <th scope="col">Tanggal Pengambalian Disetujui</th>
          <th scope="col">Status Pengembalian</th>
          <th scope="col">Denda</th>
          <th scope="col">Foto Buku Dikembalikan</th>
          <th scope="col">Dibuat Pada</th>
          <th scope="col">Diupdate Pada</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @forelse ($data_transaksi_peminjaman_buku as $data)
          <tr>
            <td>{{ $data->judul_buku}}</td>
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
              <p>{{ $data->tanggal_pengembalian_disetujui }}</p>
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
              <td class="text-center" colspan="13"><b>Tidak ada data</b></td>
              </tr>
          @endforelse
      </tbody>
    </table>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script>
  $(document).ready( function () {
    // alert("Hello! I am an alert box!!");
    $('#myTable').DataTable();

  } );
</script>
</body>

</html>