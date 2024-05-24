@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<a href="/dashboard_penerbit" class="btn btn-outline-primary mb-3">
  <i class="bi bi-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Edit Penerbit</h5>
    <form action="{{ route('dashboard_penerbit.update', $penerbit->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-12 mb-3 mt-4">
          <label for="penerbit_name" class="form-label">Nama Penerbit</label>
          <input type="text" class="form-control @error('penerbit_name') is-invalid @enderror" id="penerbit_name" name="penerbit_name" value="{{ old('penerbit_name') ?? $penerbit->nama }}" required @required(true)>
          @error('penerbit_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>
</div>
@endsection
@include('dashboard.footer')