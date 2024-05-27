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
          Data Penerbit
      </h5>
    </div>
    <div class="col-12 col-lg-7">
      <div class="d-flex gap-2 justify-content-md-end">
        <div>
          <form action="" method="get">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari penerbit" aria-label="Cari penerbit" aria-describedby="searchButton">
              <button class="btn btn-outline-secondary" type="submit" id="searchButton">Cari</button>
            </div>
          </form>
        </div>
        <div>
          <a href="/dashboard_penerbit/create" class="btn btn-primary py-2">
            <i class="bi bi-plus"></i>
            Tambah Penerbit
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead class="table-light">
        <tr>
          <th scope="col">ID Penerbit</th>
          <th scope="col">Nama Penerbit</th>
          <th scope="col">Slug</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @forelse ($penerbits as $penerbit)
          <tr>
            <td>{{ $penerbit->id }}</td>
            <td>
              <p class="text-primary-emphasis"><b>{{ $penerbit->nama }}</b></p>
            </td>
            <td>
              <p><b>{{ $penerbit->slug }}</b></p>
            </td>
            <td>
              <a href="/dashboard_penerbit/{{ $penerbit->slug }}/edit" class="d-block btn btn-warning w-100 mb-2">
                <i class="bi bi-pencil"></i>
                Edit
              </a>
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard_penerbit.destroy', $penerbit->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">
                  <i class="bi bi-trash"></i>
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