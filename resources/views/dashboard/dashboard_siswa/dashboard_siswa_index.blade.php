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
          Data siswa
      </h5>
    </div>
    <div class="col-12 col-lg-7">
      <div class="d-flex gap-2 justify-content-md-end">
        <div>
          <form action="" method="get">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari siswa" aria-label="Cari siswa" aria-describedby="searchButton">
              <button class="btn btn-outline-secondary" type="submit" id="searchButton">Cari</button>
            </div>
          </form>
        </div>
        <div>
          <a href="/dashboard_siswa/create" class="btn btn-primary py-2">
            <i class="ti ti-plus"></i>
            Tambah siswa
          </a>
        </div>
      </div>
    </div>
  </div>
  <table class="table table-hover table-striped">
    <thead class="table-light">
      <tr>
        <th scope="col">ID Siswa</th>
        <th scope="col">Image</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @forelse ($siswas as $siswa)
        <tr>
          <td>{{ $siswa->id }}</td>
          <td>
            <div class="d-flex justify-content-center" style="max-width: 150px; height: 120px;">
              <img class="mx-auto mh-100" src="{{ asset("storage/siswa/$siswa->image") }}" alt="Image: {{ $siswa->username }}">
            </div>
          </td>
          <td>
            <p class="text-primary"><b>{{ $siswa->first_name }}</b></p>
          </td>
          <td>
            <p class="text-primary"><b>{{ $siswa->last_name }}</b></p>
          </td>
          <td>
            <p><b>{{ $siswa->username }}</b></p>
          </td>
          <td>
            <a href="/dashboard_siswa/{{ $siswa->username }}" class="d-block btn btn-primary w-100 mb-2">
              <i class="ti ti-edit"></i>
              View
            </a>
            <a href="/dashboard_siswa/{{ $siswa->username }}/edit" class="d-block btn btn-warning w-100 mb-2">
              <i class="ti ti-edit"></i>
              Edit
            </a>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard_siswa.destroy', $siswa->id) }}" method="POST">
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
@endsection
@include('dashboard.footer')