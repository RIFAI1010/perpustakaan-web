@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<a href="/dashboard_category" class="btn btn-outline-primary mb-3">
  <i class="ti ti-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Edit Category</h5>
    <form action="{{ route('dashboard_category.update', $category->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-12 mb-3 mt-4">
          <label for="category_name" class="form-label">Nama Category</label>
          <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{ old('category_name') ?? $category->nama }}" required @required(true)>
          @error('category_name')
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