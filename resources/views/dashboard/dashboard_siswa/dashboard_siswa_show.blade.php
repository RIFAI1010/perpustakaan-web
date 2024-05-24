@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<style>
  #siswa-cover {
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    max-width: 350px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #siswa-cover img {
    width: auto;
    max-width: 100%;
    max-height: 100%;
  }

</style>
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between mb-4">
      <div>
        <a href="/dashboard_siswa" class="btn btn-outline-primary">
          <i class="ti ti-arrow-left"></i>
          Kembali
        </a>
      </div>
      <div class="d-flex gap-2 justify-content-end">
        <div>
          <a href="/dashboard_siswa/{{ $siswa->username }}/edit" class="btn btn-primary w-100">
            <i class="ti ti-edit"></i>
            Edit
          </a>
        </div>
        <div>
          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard_siswa.destroy', $siswa->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">
              <i class="ti ti-trash"></i>
              Delete
            </button>
          </form>
        </div>
      </div>
    </div>
    <h5 class="card-title fw-semibold mb-4">Detail siswa</h5>
    <div class="row">
      <div class="col-12 col-lg-4">
        <div id="siswa-cover" class="mb-4 bg-light">
          <img class="mx-auto mh-100" width="100" src="{{ asset("storage/siswa/$siswa->image") }}" alt="{{ $siswa->title }}">
        </div>
      </div>
      <div class="col-12 col-lg-8 d-flex flex-wrap">
        <div class="w-100 mb-2">
          <h6>ID siswa: {{ $siswa->id }}</h6>
          <h6>First Name: {{ $siswa->first_name }}</h6>
          <h6>Last Name: {{ $siswa->last_name }}</h6>
          <h6>Username: {{ $siswa->username }}</h6>
          <h6>Kelas: {{ $siswa->class }}</h6>
          <h6>Email: {{ $siswa->email }}</h6>
          <h6>No Telp: {{ $siswa->no_telp }}</h6>
          <h6>Password: {{ $siswa->password }}</h6>
          <h6>Role: {{ $siswa->role }}</h6>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include('dashboard.footer')