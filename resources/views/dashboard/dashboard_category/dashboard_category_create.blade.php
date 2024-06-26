@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<a href="/dashboard_category" class="btn btn-outline-primary mb-3">
  <i class="bi bi-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Tambah Category</h5>
    <form action="{{ route('dashboard_category.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-12 mb-3 mt-4">
          <label for="category_name" class="form-label">Nama Category</label>
          <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{ old('category_name') }}" required @required(true)>
          @error('category_name')
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