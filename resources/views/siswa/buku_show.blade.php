<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />

    <style>
        #book-cover {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            max-width: 400px;
            height: 380px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #book-cover img {
            width: auto;
            max-width: 100%;
            max-height: 100%;
        }

        .bgb {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 0, 0);
            z-index: -1;
        }

        .bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url(" {{ asset('assets/images/backgrounds/cloud-bg.jpg') }} ");
            /* Ganti dengan URL gambar latar belakang yang diinginkan */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 0.5;
            /* Tetapkan background image */
            z-index: -2;
            /* Pastikan div background berada di latar belakang */
        }



.rating {
  margin-bottom: 20px;
  display: flex;
  flex-direction: row-reverse; /* this is the magic */
  justify-content: flex-end;
}

.rating input {
  display: none;
}

.ratingBlock input {
  display: none;
}


.rating label {
  font-size: 24px;
  cursor: pointer;
}

.rating label:hover,
.rating label:hover ~ label { /* reason why the stars are in reverse order in the html */
  color: orange;
}

.rating input:checked ~ label {
  color: orange;
}
.checked-class {
  color: orange;
}




    </style>
</head>

<body>
    <div class="bgb">
        <div class="bg"></div>
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->

        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper" style="margin-left: 0; max-width: none;">
            <!--  Header Start -->
            <header class="app-header" style="max-width: none; width: 100%">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">

                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="" target="_blank" class="btn btn-primary">button</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle"> -->
                                    <i class="bi bi-person-circle" style="color:#5D87FF; font-size: 30px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="bi bi-person fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="bi bi-envelope fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="bi bi-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-primary mx-3 mt-2 d-block"
                                                type="submit">Logout</button>
                                        </form>
                                        {{-- <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a> --}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid" style="padding-top: 100px">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9" style="min-height: 60px">
                    <a href="../dashboard">
                        <button class="btn btn-primary">kembali</button>
                    </a>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @else
                    <div></div>
                    @endif
                    <div style="display: flex">

                        <a href="/menandai-buku/{{ $buku->slug }}"
                            class="d-inline-flex me-3 p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-{{ $buku->is_ditandai() ? 'heart-fill' : 'heart'}} fs-4"></i>
                        </a>
                        @if ($buku->is_dipinjam())
                        <a class="btn btn-success" href="/mengantri-pengembalian/{{ $buku->slug }}">Kembalikan</a>
                        @elseif ($buku->is_mengantri_peminjaman())
                        <a class="btn btn-danger" href="/batal/mengantri-peminjaman/{{ $buku->slug }}">Batal antri</a>
                        @elseif ($buku->is_mengantri_pengembalian())
                        <a class="btn btn-warning">Menunggu pengembalian...</a>
                        @elseif ($buku->is_mengantri_denda())
                        <a class="btn btn-warning">Menunggu denda dibayar</a>
                        @elseif ($buku->status_ketersediaan)
                        <a class="btn btn-primary" href="/mengantri-peminjaman/{{ $buku->slug }}">Pinjam</a>
                        @elseif ($buku->status_ketersediaan =! false)
                        <a class="btn btn-outline-danger">Tidak Tersedia</a>
                        @else
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="card w-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div id="book-cover" class="my-4">
                                    <img class="mx-auto mh-100" width="100"
                                        src="{{ asset("storage/buku/$buku->image") }}" alt="{{ $buku->title }}">
                                </div>
                            </div>
                            <div class="col-md-8 pt-4">
                                <div style="min-height: 200px">
                                    <h1>{{ $buku->judul }}</h2>
                                        <div class="d-flex align-items-center mb-2">
                                            <h5>kategori: </h5>
                                            <button type="button"
                                                class="btn btn-outline-primary mx-2">{{ $buku->category()->get()[0]->nama }}</button>
                                                <p class="card-text text-truncate fs-4">
                                                    @if ($buku->is_rating_ratarata($buku->slug) == 0.0)
                                                        belum ada rating
                                                    @else
                                                        <i class="bi bi-star-fill" style="color: orange"></i>
                                                        {{ $buku->is_rating_ratarata($buku->slug) }}
                                                    @endif
                                                </p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <h5 style="">Penulis:
                                                {{ $buku->penulis()->get()[0]->nama ?? 'Tidak diketahui'}}</h5>
                                            <h5 class="mx-2">•</h5>
                                            <h5>Penerbit: {{ $buku->penerbit()->get()[0]->nama ?? 'Tidak diketahui'}}
                                            </h5>
                                        </div>
                                        <p>{{ $buku->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     @if ($buku->is_rating() and $buku->is_sudah_rating() == 0)                
                    <div class="card w-100">
                        <div class="row g-0">
                            <div class="col-md-12 py-4" style="padding-right: 24px">
                                <div style="">
                                    <form action="{{ route('rating', ['slug' => $buku->slug]) }}" method="POST">
                                        @csrf
                                    <div class="mb-3 mb-sm-0" style="padding-left: 24px"> 
                                        @error('rating')
                                        <h5 class="text-danger">{{ $message }}</h5>
                                        @enderror                                    
                                        @error('komen')
                                        <h5 class="text-danger">{{ $message }}</h5>
                                        @enderror                                    
                                    </div>
                                    <div class="mb-3 mb-sm-0" style="padding-left: 24px">
                                        <h4 class="fw-semibold">Komentar</h4>
                                    </div>
                                    <div class="pb-2">
                                        
                                            <div class="gap-2 d-flex px-4 rating">
                                                <input type="radio" id="star5" name="rating" value="5">
                                                <label for="star5" class="unblock bi bi-star-fill fs-5"></label>
                                                <input type="radio" id="star4" name="rating" value="4">
                                                <label for="star4" class="unblock bi bi-star-fill fs-5"></label>
                                                <input type="radio" id="star3" name="rating" value="3">
                                                <label for="star3" class="unblock bi bi-star-fill fs-5"></label>
                                                <input type="radio" id="star2" name="rating" value="2">
                                                <label for="star2" class="unblock bi bi-star-fill fs-5"></label>
                                                <input type="radio" id="star1" name="rating" value="1">
                                                <label for="star1" class="unblock bi bi-star-fill fs-5"></label>
                                            </div>                                        
                                            <textarea id="komen" name="komen" class="form-control border-3" style="min-height: 100px; max-height: 100px" aria-label="With textarea"></textarea>
                                            <button type="submit" class="btn btn-primary mt-4 float-end fs-4">Kirim</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    {{-- disable --}}
                    <div class="card w-100" style="background-color: #e9ecef">
                        <div class="row g-0">
                            <div class="col-md-12 py-4" style="padding-right: 24px">
                                <div style="">
                                    <div class="mb-3 mb-sm-0" style="padding-left: 24px">
                                        @if ($buku->is_sudah_rating())
                                        <h5 class="text-danger">anda sudah rating</h5>
                                        @elseif ($buku->is_rating() == 0)
                                        <h5 class="text-danger">anda belum pernah meminjam</h5>
                                        @endif
                                    </div>
                                    <div class="mb-3 mb-sm-0" style="padding-left: 24px">
                                        <h4 class="fw-semibold" style="color: #898989">Komentar</h4>
                                    </div>
                                    <div class="pb-2">
                                            <div class="gap-2 d-flex px-4 ratingBlock">
                                                    <input type="radio" id="star5" name="rating" value="5" disabled>
                                                    <label for="star5" class="bi bi-star-fill fs-5" style="color: #898989"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" disabled>
                                                    <label for="star4" class="bi bi-star-fill fs-5" style="color: #898989"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" disabled>
                                                    <label for="star3" class="bi bi-star-fill fs-5" style="color: #898989"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" disabled>
                                                    <label for="star2" class="bi bi-star-fill fs-5" style="color: #898989"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" disabled>
                                                    <label for="star1" class="bi bi-star-fill fs-5" style="color: #898989"></label>
                                            </div>
                                        <fieldset disabled>
                                            <textarea class="form-control border-3" style="min-height: 100px; max-height: 100px" aria-label="With textarea" ></textarea>
                                        </fieldset>
                                        <button class="btn btn-primary mt-4 float-end fs-4" disabled>Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif



                    <div class="card w-100">
                        <div class="row g-0">
                            <div class="col-md-12 p-4">
                                <div style="">
                                    <div class="mb-3 mb-sm-0">
                                        <h4 class="fw-semibold">Komentar</h4>
                                    </div>  
                                    @forelse ($rating as $rating)
                                    <div class="p-3 rounded-2 mb-3" style="background-color: #e9ecef">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-circle" style="color:#5D87FF; font-size: 30px; padding-right: 10px"></i>
                                            <h4>{{ $rating->username}}</h4>
                                        </div>
                                        <div class="d-flex px-3 rating gap-2" style="flex-direction: row; justify-content: flex-start;">
                                            @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating->nilai)
                                            <i class="bi bi-star-fill fs-4 checked-class"></i>
                                            @else
                                            <i class="bi bi-star-fill fs-4"></i>
                                            @endif
                                        @endfor
                                        </div>
                                        <div class="p-3 rounded-2 fs-4" style="background-color: #ffffff">
                                            <p>{{ $rating->komen }}</p>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="p-3 rounded-2 mb-3" style="background-color: #e9ecef">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <b>Belum ada komentar dan rating</b>                                        
                                        </div>
                                    </div>
                                    @endforelse  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script>

    </script>
</body>

</html>