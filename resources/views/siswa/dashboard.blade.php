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
    </style>
</head>

<body>
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
                            <a class="sidebar-link" href="./peminjaman" aria-expanded="false">
                                <span>
                                    <i class="bi bi-journal"></i>
                                </span>
                                <span class="hide-menu-arrow-down">peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./peminjaman" aria-expanded="false">
                                <span>
                                    <i class="bi bi-journal-arrow-up"></i>
                                </span>
                                <span class="hide-menu">Pengembalian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./peminjaman" aria-expanded="false">
                                <span>
                                    <i class="bi bi-star"></i>
                                </span>
                                <span class="hide-menu">Rating</span>
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
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                        <h4 class="fw-semibold">Buku</h4>
                    </div>
                    <div>
                        <i class="bi bi-arrow-right-circle" style="font-size: 30px"></i>
                    </div>
                </div>
                <div class="scrollable-y mb-7 pb-2 d-flex row-cols-1 row-cols-md-3 g-4" id="scrollable-card">
                    @forelse($bukus as $buku)
                    <div class="col-md-4 mx-3 mb-2">
                        <div class="card m-0" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="/detail/{{ $buku->slug }}">
                                        <img src="{{ asset("storage/buku/$buku->image") }}" class="card-img"
                                            alt="Image 1">
                                    </a>


                                </div>
                                <div class="col-md-8">

                                    <div class="card-body p-3">
                                        <h5 class="card-title text-truncate">{{ $buku->judul }}</h5>
                                        <p class="card-text text-truncate">{{ $buku->deskripsi }}
                                        </p>
                                        <a href="#"
                                            class="d-inline-flex p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle"
                                            style="width: 32px; height: 32px;">
                                            <i class="bi bi-heart fs-4"></i>
                                        </a>
                                        <p class="card-text text-truncate mt-3">
                            {{ $buku->status_ketersediaan ? 'Tersedia' : 'Tidak Tersedia'}}
                        </p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    @empty

                    <div style="width: 100%; height: 100px; align-content: center; text-align: center"><b>Tidak ada data
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
                                    <div class="scrollable-y" id="scrollable-button"
                                        style="overflow: hidden; width: 100%">
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

                                <div class="scrollable-y mb-9 pb-2 d-flex" id="scrollable-cover">
                                    @forelse($bukus as $buku)


            <div class="col-sm-6 col-lg-2 category-display-{{ $buku->category()->get()[0]->id}}" id="category-display-{{ $buku->category()->get()[0]->id}}">
                <div class="card overflow-hidden rounded-2 mx-3 shadow">
                    <div class="position-relative">
                        <a href="/detail/{{ $buku->slug }}"><img src="{{ asset("storage/buku/$buku->image") }}"
                                class="card-img-top" alt="{{ $buku->judul }}">
                        </a>

                        <a href="#"
                            class="d-inline-flex p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle position-absolute bottom-0 end-0 mb-n3 me-2"
                            style="width: 32px; height: 32px;">
                            <i class="bi bi-heart fs-4"></i>
                        </a>
                    </div>

                    <div class="card-body p-2">
                        <h5 class="card-title text-truncate">{{ $buku->judul }}</h5>
                        <p class="card-text text-truncate">
                            {{ $buku->status_ketersediaan ? 'Tersedia' : 'Tidak Tersedia'}}
                        </p>

                    </div>

                </div>
            </div>


            <div style="width: 100%; height: 100px; align-content: center; text-align: center; display: none;"
                id="catch"><b>Tidak ada data untuk kategori ini</b>
            </div>
            @empty

            <div style="width: 100%; height: 100px; align-content: center; text-align: center"><b>Tidak ada data
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

        $(window).on('load', function () {
            categoryShowHide({{ $buku->category()->get()[0]->id }})
        });

        function categoryShowHide(id) {
            $(document).ready(function () {
                @foreach($categories as $category)
                $(".category-display-{{ $category->id }}").css("display", "none");
                @endforeach
                document.getElementById("catch").style.display = "none";
                $(`.category-display-` + id + ``).css("display", "block")
                // trycatch untuk message data tidak ada
                try {
                    document.getElementById(`category-display-`+ id +``).style.display = "block";
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