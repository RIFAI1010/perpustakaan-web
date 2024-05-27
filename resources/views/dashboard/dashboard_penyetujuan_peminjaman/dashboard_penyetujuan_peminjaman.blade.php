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
          Data Penyetujuan Peminjaman
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
        <th scope="col">Tanggal Pengajuan</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @forelse ($data_antri_peminjaman as $data)
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
            <button type="button" class="d-block btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#setujuModal">
                <i class="ti ti-edit"></i>
                Setuju
            </button>
            <form action="/dashboard_penyetujuan_peminjaman/setuju/{{ $data->id }}" method="post">
              @csrf
              @method('PUT')
              <div class="modal fade" id="setujuModal" tabindex="-1" aria-labelledby="setujuModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="setujuModalLabel">Setujui Peminjaman Buku</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <label for="tanggal_deadline_peminjaman" class="form-label">Tanggal Deadline Peminjaman</label>
                      <input type="date" class="form-control @error('tanggal_deadline_peminjaman') is-invalid @enderror" id="tanggal_deadline_peminjaman" name="tanggal_deadline_peminjaman" value="{{ old('tanggal_deadline_peminjaman') }}" required @required(true)>
                      @error('tanggal_deadline_peminjaman')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Setujui</button>
                    </div>
                  </div>
                </div>
              </div>  
            </form>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="/dashboard_penyetujuan_peminjaman/tidak_setuju/{{ $data->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger w-100">
                  <i class="ti ti-trash"></i>
                  Tidak Setuju
              </button>
            </form>
          </td>
        </tr>
        @empty
            <tr>
            <td class="text-center" colspan="7"><b>Tidak ada data</b></td>
            </tr>
        @endforelse
    </tbody>
  </table>
@endsection
@include('dashboard.footer')