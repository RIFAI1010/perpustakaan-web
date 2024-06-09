<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
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
    </style>
</head>

<body>
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
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="bi bi-bell"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
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
            <div class="container-fluid">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                        <a href="../dashboard">

                            <button class="btn btn-outline-primary">kembali</button>
                        </a>
                    </div>
                    <div style="display: flex">
                        <a href="#"
                            class="d-inline-flex me-3 p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-heart fs-5"></i>
                        </a>
                        @if ($buku->is_dipinjam())
                            <a class="btn btn-success" href="/mengantri-pengembalian/{{ $buku->slug }}">Kembalikan</a>
                        @elseif ($buku->is_mengantri_peminjaman())
                            <a class="btn btn-danger" href="/batal/mengantri-peminjaman/{{ $buku->slug }}">Batal antri</a>
                        @elseif ($buku->is_mengantri_pengembalian())
                            <a class="btn btn-warning">Menunggu pengembalian...</a>
                        @elseif ($buku->is_mengantri_denda())
                            <a class="btn btn-warning">Menunggu denda dibayar...</a>
                        @elseif ($buku->status_ketersediaan)
                            <a clasJs="btn btn-primary" href="/mengantri-peminjaman/{{ $buku->slug }}">Pinjam</a>
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
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <h5 style="">Penulis:
                                                {{ $buku->penulis()->get()[0]->nama ?? 'Tidak diketahui'}}</h5>
                                            <h5 class="mx-2">|</h5>
                                            <h5>Penerbit: {{ $buku->penerbit()->get()[0]->nama ?? 'Tidak diketahui'}}
                                            </h5>
                                        </div>
                                        <p>{{ $buku->deskripsi  }}</p>
                                </div>
                                {{-- <div style="display: flex">
                                    <a href="#"
                                        class="d-inline-flex p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle"
                                        style="width: 40px; height: 40px;">
                                        <i class="bi bi-heart fs-5"></i>
                                    </a>
                                    <button type="button" class="btn btn-primary mx-2 d-inline-block">pinjam</button>
                                </div> --}}




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