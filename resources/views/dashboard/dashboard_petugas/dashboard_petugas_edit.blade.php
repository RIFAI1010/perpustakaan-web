@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<a href="/dashboard_petugas" class="btn btn-outline-primary mb-3">
  <i class="ti ti-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Edit Petugas</h5>
    <form action="{{ route('dashboard_petugas.update', $petugas->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xl-5 mb-3 p-3">
          <label for="cover" class="d-block" style="cursor: pointer;">
            <div class="d-flex justify-content-center bg-light overflow-hidden h-100 position-relative">
              <img id="bookCoverPreview" src="" alt="" height="300" class="z-1">
              <p class="position-absolute top-50 start-50 translate-middle z-0">Pilih gambar petugas</p>
            </div>
          </label>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-7">
          <div class="mb-3">
            <label for="cover" class="form-label">Gambar petugas</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="cover" name="image" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') ?? $petugas->first_name }}" required @required(true)>
            @error('first_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') ?? $petugas->last_name }}" required @required(true)>
            @error('last_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') ?? $petugas->username }}" required @required(true)>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-4 col-lg-4 mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" minlength="11" aria-describedby="emailHelp" value="{{ old('email') ?? $petugas->email }}" required @required(true)>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-3">
          <label for="no_telp" class="form-label">No Telp</label>
          <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" minlength="8" aria-describedby="no_telpHelp" value="{{ old('no_telp') ?? $petugas->no_telp }}" required @required(true)>
          @error('no_telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8" aria-describedby="passwordHelp" value="{{ old('password') ?? $petugas->password }}" required @required(true)>
          <div id="passwordHelp" class="form-text">
            Password minimum have 8 characters
          </div>
          @error('password')
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

<script>
  function previewImage() {
    const fileInput = document.querySelector('#cover');
    const imagePreview = document.querySelector('#bookCoverPreview');

    const reader = new FileReader();
    reader.readAsDataURL(fileInput.files[0]);

    reader.onload = function(e) {
      imagePreview.src = e.target.result;
    };
  }
</script>
@endsection
@include('dashboard.footer')