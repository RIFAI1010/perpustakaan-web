@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<style>
  #petugas-cover {
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    max-width: 350px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #petugas-cover img {
    width: auto;
    max-width: 100%;
    max-height: 100%;
  }

</style>
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between mb-4">
      <div>
        <a href="/dashboard_petugas" class="btn btn-outline-primary">
          <i class="bi bi-arrow-left"></i>
          Kembali
        </a>
      </div>
      <div class="d-flex gap-2 justify-content-end">
        <div>
          <a href="/dashboard_petugas/{{ $petugas->username }}/edit" class="btn btn-primary w-100">
            <i class="bi bi-pencil"></i>
            Edit
          </a>
        </div>
        <div>
          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dashboard_petugas.destroy', $petugas->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">
              <i class="bi bi-trash"></i>
              Delete
            </button>
          </form>
        </div>
      </div>
    </div>
    <h5 class="card-title fw-semibold mb-4">Detail petugas</h5>
    <div class="row">
      <div class="col-12 col-lg-4">
        <div id="petugas-cover" class="mb-4 bg-light">
          <img class="mx-auto mh-100" width="100" src="{{ asset("storage/petugas/$petugas->image") }}" alt="{{ $petugas->title }}">
        </div>
      </div>
      <div class="col-12 col-lg-8 d-flex flex-wrap">
        <div class="w-100 mb-2">
          <h6>ID Petugas: {{ $petugas->id }}</h6>
          <h6>First Name: {{ $petugas->first_name }}</h6>
          <h6>Last Name: {{ $petugas->last_name }}</h6>
          <h6>Username: {{ $petugas->username }}</h6>
          <h6>Email: {{ $petugas->email }}</h6>
          <h6>No Telp: {{ $petugas->no_telp }}</h6>
          <h6>Password: {{ $petugas->password }}</h6>
          <h6>Role: {{ $petugas->role }}</h6>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include('dashboard.footer')