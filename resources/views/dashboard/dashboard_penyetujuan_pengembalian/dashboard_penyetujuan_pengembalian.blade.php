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
          Data Penyetujuan pengembalian
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
  <table class="table table-hover table-striped">
    <thead class="table-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">ID Buku</th>
        <th scope="col">ID Peminjam</th>
        <th scope="col">Tanggal Deadline</th>
        <th scope="col">Tanggal Pengembalian</th>
        <th scope="col">Status Pengembalian</th>
        <th scope="col">Foto Buku Dikembalikan</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @forelse ($data_antri_pengembalian as $data)
        <tr>
          <td>{{ $data->id}}</td>
          <td>
            <p>{{ $data->buku_id }}</p>
          </td>
          <td>
            <p>{{ $data->peminjam_id }}</p>
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
            <p>{{ $data->foto_buku_dikembalikan }}</p>
          </td>
          <td>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="/dashboard_penyetujuan_pengembalian/setuju/{{ $data->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-success w-100">
                  <i class="ti ti-trash"></i>
                  Setuju
              </button>
            </form>
            <button type="button" class="d-block btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#beriDendaModal">
                <i class="ti ti-edit"></i>
                Beri denda
            </button>
            <form action="/dashboard_penyetujuan_pengembalian/beri_denda/{{ $data->id }}" method="post">
              @csrf
              @method('PUT')
              <div class="modal fade" id="beriDendaModal" tabindex="-1" aria-labelledby="beriDendaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="beriDendaModalLabel">Beri Denda Pengembalian Buku</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <label for="jumlah_denda" class="form-label">Jumlah Denda</label>
                      <input type="number" class="form-control @error('jumlah_denda') is-invalid @enderror" id="jumlah_denda" name="jumlah_denda" value="{{ old('jumlah_denda') }}" required @required(true)>
                      @error('jumlah_denda')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Berikan denda</button>
                    </div>
                  </div>
                </div>
              </div>  
            </form>
          </td>
        </tr>
        @empty
            <tr>
            <td class="text-center" colspan="8"><b>Tidak ada data</b></td>
            </tr>
        @endforelse
    </tbody>
  </table>
@endsection
@include('dashboard.footer')