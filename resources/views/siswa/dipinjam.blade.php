<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="../assets/css/styles2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />

    <style>
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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <h3>Perpustakaan</h3>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="bi bi-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="bi bi-list nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./dashboard" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="bi bi-list nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Aktifitas</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./dipinjam" aria-expanded="false">
                                <span>
                                    <i class="bi bi-journal-arrow-down"></i>
                                </span>
                                <span class="hide-menu">peminjaman</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="bi bi-list nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Personal</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../ditandai" aria-expanded="false">
                                <span>
                                    <i class="bi bi-heart"></i>
                                </span>
                                <span class="hide-menu-arrow-down">Ditandai</span>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="bi bi-list"></i>
                            </a>
                        </li>
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
            <div class="container-fluid min-vh-100" style="padding-top: 100px">
                <div class="row">
                    <div class="col-12">

                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 gap-3">
                                <a href="./proses" type="button" class="btn btn-light text-primary m-1 flex-grow-1">Proses</a>
                                <a href="./dipinjam" type="button"
                                    class="btn btn-primary m-1 flex-grow-1">Dipinjam</a>
                                <a href="./antrian" type="button"
                                    class="btn btn-light m-1 text-primary flex-grow-1">Antrian</a>
                                <a href="./selesai" type="button"
                                    class="btn btn-light m-1 text-primary flex-grow-1">Selesai</a>
                                    @if (session('success'))                    
                                    <div class="alert alert-success alert-dismissible fade show mb-0 position-fixed" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>              
                                    @endif
                                    @if (session('failed'))
                                    <div class="alert alert-danger alert-dismissible fade show mb-0 position-fixed" role="alert">
                                        {{ session('failed') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card bg-transparent">
                                    <div class="card-body py-0 px-3 d-md-flex text-center">
                                        <div class="col-md-2">
                                            <h5 class="fw-semibold">Buku</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="fw-semibold">Judul</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="fw-semibold">Tanggal Pengajuan</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="fw-semibold">Tanggal Disetujui</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="fw-semibold">Tanggal Deadline</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="fw-semibold">Aksi</h5>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div>
                                    @forelse ($is_dipinjam as $buku)
                                    <div class="card" style="background-color: #e9ecef">
                                        <div class="card-body p-3 d-md-flex text-center">
                                            <div class="col-md-2 d-flex justify-content-center"
                                                style="height: 180px;">
                                                <a href="../detail/{{ $buku->slug }}">
                                                <img class="mx-auto mh-100"
                                                    src="{{ asset('/storage/buku/'. $buku->image) }}"
                                                    alt="{{ $buku->judul }}">
                                                </a>                                                
                                            </div>
                                            <div class="d-md-flex col-md-2">
                                                <h3 class="card-title text-truncate">{{ $buku->judul }}</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="card-title text-truncate">
                                                    {{ $buku->tanggal_pengajuan_peminjaman }}</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="card-title text-truncate">
                                                    {{ $buku->tanggal_peminjaman_disetujui }}</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <h3 class="card-title text-truncate">
                                                    {{ $buku->tanggal_deadline_peminjaman }}</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <a class="btn btn-success" href="/mengantri-pengembalian/{{ $buku->slug }}">Kembalikan</a>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="card" style="background-color: #e9ecef">
                                        <div class="card-body p-3 d-flex text-center">
                                            <div class="col-12 justify-content-center align-content-center" style="min-height: 200px">
                                                <h3 class="card-title text-truncate">Tidak Ada Transaksi</h3>
                                            </div>
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