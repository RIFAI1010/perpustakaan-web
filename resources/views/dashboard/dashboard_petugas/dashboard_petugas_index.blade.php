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
          Data Petugas
      </h5>
    </div>
    <div class="col-12 col-lg-7">
      <div class="d-flex gap-2 justify-content-md-end">
        <div>
          <form action="" method="get">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari petugas" aria-label="Cari petugas" aria-describedby="searchButton">
              <button class="btn btn-outline-secondary" type="submit" id="searchButton">Cari</button>
            </div>
          </form>
        </div>
        <div>
          <a href="/dashboard_petugas/create" class="btn btn-primary py-2">
            <i class="ti ti-plus"></i>
            Tambah Petugas
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead class="table-light">
        <tr>
          <th scope="col">ID Petugas</th>
          <th scope="col">Image</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Username</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @forelse ($petugass as $petugas)
          <tr>
            <td>{{ $petugas->id }}</td>
            <td>
              <div class="d-flex justify-content-center" style="max-width: 150px; height: 120px;">
                <img class="mx-auto mh-100" src="{{ asset("storage/petugas/$petugas->image") }}" alt="Image: {{ $petugas->username }}">
              </div>
            </td>
            <td>
              <p class="text-primary"><b>{{ $petugas->first_name }}</b></p>
            </td>
            <td>
              <p class="text-primary"><b>{{ $petugas->last_name }}</b></p>
            </td>
            <td>
              <p><b>{{ $petugas->username }}</b></p>
            </td>
            <td>
              <a href="/dashboard_petugas/{{ $petugas->username }}" class="d-block btn btn-primary w-100 mb-2">
                <i class="ti ti-edit"></i>
                View
              </a>
              <a href="/dashboard_petugas/{{ $petugas->username }}/edit" class="d-block btn btn-warning w-100 mb-2">
                <i class="ti ti-edit"></i>
                Edit
              </a>
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard_petugas.destroy', $petugas->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">
                  <i class="ti ti-trash"></i>
                  Delete
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
  </div>
@endsection
@include('dashboard.footer')