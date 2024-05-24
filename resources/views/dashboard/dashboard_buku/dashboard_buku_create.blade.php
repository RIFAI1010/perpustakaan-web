@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<a href="/dashboard_buku" class="btn btn-outline-primary mb-3">
  <i class="bi bi-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Tambah Buku</h5>
    <form action="{{ route('dashboard_buku.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3 p-3">
          <label for="cover" class="d-block" style="cursor: pointer;">
            <div class="d-flex justify-content-center bg-light overflow-hidden h-100 position-relative">
              <img id="bookCoverPreview" src="" alt="" height="300" class="z-1">
              <p class="position-absolute top-50 start-50 translate-middle z-0">Pilih sampul</p>
            </div>
          </label>
        </div>
        <div class="col-12 col-md-6 col-lg-8 col-xl-9">
          <div class="mb-3">
            <label for="cover" class="form-label">Gambar sampul buku</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="cover" name="image" onchange="previewImage()" required @required(true)>
            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="judul" class="form-label">Judul buku</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required @required(true)>
            @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="penulis_id" class="form-label">Penulis</label>
            <select class="form-select @error('penulis_id') is-invalid @enderror" aria-label="Select penulis" id="penulis_id" name="penulis_id" value="{{ old('penulis_id') }}" required @required(true)>
              <option value="">--Pilih penulis--</option>
              @foreach ($penuliss as $penulis)
                <option value="{{ $penulis->id }}" {{ old('penulis_id') == $penulis->id ? 'selected' : '' }}>{{ $penulis->nama }}</option>
              @endforeach
            </select>
            @error('penulis_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="penerbit_id" class="form-label">Penerbit</label>
            <select class="form-select @error('penerbit') is-invalid @enderror" aria-label="Select penerbit" id="penerbit_id" name="penerbit_id" value="{{ old('penerbit_id') ?? '' }}" required @required(true)>
              <option value="">--Pilih penerbit--</option>
              @foreach ($penerbits as $penerbit)
                <option value="{{ $penerbit->id }}" {{ old('penerbit_id') == $penerbit->id ? 'selected' : '' }}>{{ $penerbit->nama }}</option>
              @endforeach
            </select>
            @error('penerbit_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3">
          <label for="category_id" class="form-label">Category</label>
            <select class="form-select @error('category') is-invalid @enderror" aria-label="Select category" id="category_id" name="category_id" value="{{ old('category_id') }}" required @required(true)>
              <option value="">--Pilih category--</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : '' }}>{{ $category->nama }}</option>
              @endforeach
            </select>
            @error('category_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" cols="30" rows="10" required @required(true)>{{ old('deskripsi') }}</textarea>
          @error('deskripsi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-4 col-lg-4 mb-3">
          <label for="isbn" class="form-label">ISBN</label>
          <input type="number" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" minlength="10" maxlength="10" aria-describedby="isbnHelp" value="{{ old('isbn') }}" required @required(true)>
          <div id="isbnHelp" class="form-text">
            ISBN 10 characters, contain only numbers.
          </div>
          @error('isbn')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-3">
          <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
          <input type="number" class="form-control @error('jumlah_halaman') is-invalid @enderror" id="jumlah_halaman" name="jumlah_halaman" minlength="4" maxlength="4" value="{{ old('jumlah_halaman') }}" required @required(true)>
          @error('jumlah_halaman')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-3">
          <label for="bahasa" class="form-label">Bahasa</label>
          <select class="form-select @error('bahasa') is-invalid @enderror" aria-label="Select bahasa" id="bahasa" name="bahasa" value="" required @required(true)>
            <option value="">--Pilih Bahasa--</option>
            <option value="Inggris" {{ old('bahasa') == 'Inggris' ? 'selected' : '' }}>Inggris</option>
            <option value="Indonesia" {{ old('bahasa') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
          </select>
          @error('bahasa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
          <label for="tanggal_terbit" class="form-label">Tanggal terbit</label>
          <input type="date" class="form-control @error('tanggal_terbit') is-invalid @enderror" id="tanggal_terbit" name="tanggal_terbit" value="{{ old('tanggal_terbit') }}" required @required(true)>
          @error('tanggal_terbit')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
          <label for="tipe" class="form-label">Tipe</label>
          <select class="form-select @error('tipe') is-invalid @enderror" aria-label="Select tipe" id="tipe" name="tipe" value="" required @required(true)>
            <option value="">--Pilih Tipe--</option>
            <option value="E-Book" {{ old('tipe') == 'E-Book' ? 'selected' : '' }}>E-Book</option>
            <option value="Buku Cetak" {{ old('tipe') == 'Buku Cetak' ? 'selected' : '' }}>Buku Cetak</option>
          </select>
          @error('tipe')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-12 col-lg-4 mb-3">
          <label for="status_ketersediaan" class="form-label">Status ketersediaan</label>
          <select class="form-select @error('tipe') is-invalid @enderror" aria-label="Select status ketersediaan" id="status_ketersediaan" name="status_ketersediaan" value="" required @required(true)>
            <option value="">--Pilih Status Ketersediaan--</option>
            <option value="1" {{ old('status_ketersediaan') == '1' ? 'selected' : '' }}>Tersedia</option>
            <option value="0" {{ old('status_ketersediaan') == '0' ? 'selected' : '' }}>Tidak tersedia</option>
          </select>
          @error('status_ketersediaan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
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