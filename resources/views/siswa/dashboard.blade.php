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
        .scrollable-y {
            overflow-x: auto;
            white-space: nowrap;
            --sb-track-color: #00000000;
            --sb-thumb-color: #cfcfcf;
            --sb-size: 5px;
            scroll-behavior: smooth;

        }

        .scrollable-y::-webkit-scrollbar {
            height: var(--sb-size)
        }

        .scrollable-y::-webkit-scrollbar-track {
            background: var(--sb-track-color);
            border-radius: 4px;
        }

        .scrollable-y::j-webkit-scrollbar-thumb {
            background: var(--sb-thumb-color);
            border-radius: 4px;

        }

        @supports not selector(::-webkit-scrollbar) {
            .scrollable-y {
                scrollbar-color: var(--sb-thumb-color) var(--sb-track-color);
            }
        }

        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
                            <a class="sidebar-link" href="./proses" aria-expanded="false">
                                <span>
                                    <i class="bi bi-journal"></i>
                                </span>
                                <span class="hide-menu-arrow-down">peminjaman</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="bi bi-list nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Personal</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ditandai" aria-expanded="false">
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
            <div class="container-fluid">

                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9" style="min-height: 60px">
                    <div class="mb-3 mb-sm-0 d-flex">
                        <div class="mx-3 justify-content-center align-content-center">
                            <h4 class="fw-semibold text-white mb-0">Buku</h4>
                        </div>
                    </div>
                    @if (session('success'))                    
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>              
                    @endif
                    @if (session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div>
                        <a href="dashboard/buku">
                            <i class="bi bi-arrow-right-circle" style="font-size: 30px; color: white; cursor: pointer;"></i>                        
                        </a>
                    </div>
                </div>




            <div class="scrollable-y mb-7 pb-2 d-flex row-cols-1 row-cols-md-3 g-4" id="scrollable-card">
                @forelse($bukus as $buku)
                <div class="col-md-4 mx-3 mb-2">
                    <div class="card m-0" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-lg-4 justify-content-center align-content-center">
                                <a href="/detail/{{ $buku->slug }}">
                                    <img src="{{ asset("storage/buku/$buku->image") }}" class="card-img" alt="Image 1">
                                </a>


                            </div>
                            <div class="col-lg-8">

                                <div class="card-body p-3">
                                    <a href="/detail/{{ $buku->slug }}">
                                        <h5 class="card-title text-truncate">{{ $buku->judul }}</h5>
                                    </a>
                                    <p class="card-text text-truncate">{{ $buku->deskripsi }}
                                    </p>
                                    <div class="d-sm-flex d-block align-items-center justify-content-between">
                                        <div>
                                            <a href="/menandai-buku/{{ $buku->slug }}"
                                                class="d-inline-flex p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle"
                                                style="width: 32px; height: 32px;">
                                                <i class="bi bi-{{ $buku->is_ditandai() ? 'heart-fill' : 'heart'}} fs-4"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <p
                                                class="text-end card-text text-truncate  {{ $buku->status_ketersediaan ? 'text-success' : 'text-danger'}}">
                                                {{ $buku->status_ketersediaan ? 'Tersedia' : 'Tidak Tersedia'}}
                                            </p>
                                            <p class="card-text text-truncate">
                                                @if ($buku->is_rating_ratarata($buku->slug) == 0.0)
                                                    belum ada rating
                                                @else
                                                    <i class="bi bi-star-fill" style="color: orange"></i>
                                                    {{ $buku->is_rating_ratarata($buku->slug) }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                @empty

                <div style="width: 100%; height: 250px; align-content: center; text-align: center"><b>Tidak ada data
                        buku</b></div>

                @endforelse
            </div>
            <!--<div class="row row-cols-1 row-cols-md-3 g-4"></div>-->
            <div class="row">
                <div class="col-12">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h4 class="fw-semibold">Kategori</h4>
                                </div>
                                <div>
                                    <!-- beetwen hole -->
                                </div>
                            </div>
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">

                                    <i id="left" class="bi bi-caret-left-fill mx-2 text-primary"
                                        style="font-size: 30px; cursor: pointer;"></i>

                                </div>
                                <div class="scrollable-y" id="scrollable-button" style="overflow: hidden; width: 100%">
                                    @foreach($categories as $category)
                                    <button onclick="categoryShowHide({{ $category->id }})"
                                        id="category-button-{{ $category->id }}" type="button"
                                        class="btn btn-outline-primary mx-2 d-inline-block">{{ $category->nama }}</button>
                                    @endforeach
                                </div>
                                <div>
                                    <i id="right" class="bi bi-caret-right-fill mx-2 text-primary"
                                        style="font-size: 30px; cursor: pointer;"></i>
                                </div>
                            </div>

                            <div class="scrollable-y mb-9 pb-2 d-flex rounded-2" style="background-color: #e9ecef"
                                id="scrollable-cover">
                                @forelse($bukus as $buku)
                                <div class="col-sm-6 col-lg-2 category-display-{{ $buku->category()->get()[0]->id}}"
                                    id="category-display-{{ $buku->category()->get()[0]->id}}">
                                    <div class="card overflow-hidden rounded-2 mx-3 mt-3 shadow">
                                        <div class="position-relative">
                                            <a href="/detail/{{ $buku->slug }}"><img
                                                    src="{{ asset("storage/buku/$buku->image") }}" class="card-img-top"
                                                    alt="{{ $buku->judul }}">
                                            </a>

                                            <a href="/menandai-buku/{{ $buku->slug }}"
                                                class="d-inline-flex p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle position-absolute bottom-0 end-0 mb-n3 me-2"
                                                style="width: 32px; height: 32px;">
                                                <i class="bi bi-{{ $buku->is_ditandai() ? 'heart-fill' : 'heart'}} fs-4"></i>

                                            </a>
                                        </div>

                                        <div class="card-body px-2 py-2">
                                            <h5 class="card-title text-truncate">{{ $buku->judul }}</h5>
                                            <p
                                                class="text-end card-text text-truncate m-0 {{ $buku->status_ketersediaan ? 'text-success' : 'text-danger'}}">
                                                {{ $buku->status_ketersediaan ? 'Tersedia' : 'Tidak Tersedia'}}
                                            </p>
                                            <p class="card-text text-truncate">
                                                @if ($buku->is_rating_ratarata($buku->slug) == 0.0)
                                                    belum ada rating
                                                @else
                                                    <i class="bi bi-star-fill" style="color: orange"></i>
                                                    {{ $buku->is_rating_ratarata($buku->slug) }}
                                                @endif
                                            </p>

                                        </div>

                                    </div>
                                </div>


                                <div style="width: 100%; height: 270px; align-content: center; text-align: center; display: none;"
                                    id="catch"><b>Tidak ada data untuk kategori ini</b>
                                </div>
                                @empty


                                <div style="width: 100%; height: 270px; align-content: center; text-align: center">
                                    <b>Tidak ada data
                                        buku</b>
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
        const scrollableButton = document.getElementById('scrollable-button');
        document.getElementById("left").addEventListener("click", function () {
            scrollableButton.scrollLeft -= 100;
        });
        document.getElementById("right").addEventListener("click", function () {
            scrollableButton.scrollLeft += 100;
        });

        @foreach($bukus as $buku)
        $(window).on('load', function () {
            categoryShowHide({{$buku->category()->get()[0]->id}})
        });
        @endforeach



        function categoryShowHide(id) {
            $(document).ready(function () {
                @foreach($categories as $category)
                $(".category-display-{{ $category->id }}").css("display", "none");
                @endforeach
                document.getElementById("catch").style.display = "none";
                $(`.category-display-` + id + ``).css("display", "block")
                // trycatch untuk message data tidak ada
                try {
                    document.getElementById(`category-display-` + id + ``).style.display = "block";
                } catch (error) {
                    document.getElementById("catch").style.display = "block";
                }
                @foreach($categories as $category)
                $("#category-button-{{ $category->id }}").removeClass("btn-primary text-white");
                @endforeach
                $(`#category-button-` + id + ``).addClass("btn-primary text-white");
            })
        }

        const scrollableCover = document.getElementById('scrollable-cover');
        scrollableCover.addEventListener('wheel', (event) => {
            if (event.deltaY !== 0) {
                event.preventDefault();
                scrollableCover.scrollLeft += event.deltaY;
            }
        });

        const scrollableCard = document.getElementById('scrollable-card');
        scrollableCard.addEventListener('wheel', (event) => {
            if (event.deltaY !== 0) {
                event.preventDefault();
                scrollableCard.scrollLeft += event.deltaY;
            }
        });
    </script>
</body>

</html>