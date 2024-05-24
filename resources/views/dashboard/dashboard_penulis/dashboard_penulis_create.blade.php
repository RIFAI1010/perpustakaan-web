@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<a href="/dashboard_penulis" class="btn btn-outline-primary mb-3">
  <i class="bi bi-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Tambah Penulis</h5>
    <form action="{{ route('dashboard_penulis.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-12 mb-3 mt-4">
          <label for="penulis_name" class="form-label">Nama Penulis</label>
          <input type="text" class="form-control @error('penulis_name') is-invalid @enderror" id="penulis_name" name="penulis_name" value="{{ old('penulis_name') }}" required @required(true)>
          @error('penulis_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
  </div>
</div>
@endsection
@include('dashboard.footer')