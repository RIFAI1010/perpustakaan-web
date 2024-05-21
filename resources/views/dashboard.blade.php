<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .scrollable-card {
            overflow-x: auto;
            white-space: nowrap;
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
            scrollbar-width: none;
            /* Firefox */
            margin-bottom: 20px;
            scroll-behavior: smooth;


        }

        .scrollable-card .btn {
            display: inline-block;
            margin: 0 4px;

        }

        .scrollable-cover {
            overflow-x: auto;
            white-space: nowrap;
            --sb-track-color: #00000000;
            --sb-thumb-color: #cecece;
            --sb-size: 6px;
            display: flex;
            padding-bottom: 5px;
            scroll-behavior: smooth;

        }

        .scrollable-cover::-webkit-scrollbar {
            height: var(--sb-size)
        }

        .scrollable-cover::-webkit-scrollbar-track {
            background: var(--sb-track-color);
            border-radius: 4px;
        }

        .scrollable-cover::-webkit-scrollbar-thumb {
            background: var(--sb-thumb-color);
            border-radius: 4px;

        }

        @supports not selector(::-webkit-scrollbar) {
            .scrollable-cover {
                scrollbar-color: var(--sb-thumb-color) var(--sb-track-color);
            }
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
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./dashboard" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house" style="font-size: 25px"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
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
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
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
                                    {{-- <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle"> --}}
                                    <i class="bi bi-person-circle" style="color:#5D87FF; font-size: 30px"></i>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Kategori</h5>
                                    </div>
                                    <div>
                                        {{-- beetwen hole --}}
                                    </div>
                                </div>
                                <div class="scrollable-card" id="scrollable-card">
                                    <button type="button" class="btn btn-primary">Button 1</button>
                                    @for ($i = 1; $i <= 15; $i++) <button type="button" class="btn btn-outline-primary">
                                        Button 2</button>
                                        @endfor
                                </div>
                                <div class="scrollable-cover" id="scrollable-cover">
                                    @for ($i = 1; $i <= 8; $i++) <div class="col-sm-6 col-md-2">
                                        <div class="card overflow-hidden rounded-2" style="margin: 0 15px">
                                            <div class="position-relative">
                                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg"
                                                        class="card-img-top rounded-0" alt="..."></a>
                                                <a href="javascript:void(0)"
                                                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add To Cart"><i class="bi bi-heart fs-4"
                                                        style="height: 16px;"></i></a>
                                            </div>
                                            <div class="card-body pt-3 p-1">
                                                <h6 class="fw-semibold fs-3">Boat Headphone</h6>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="fw-semibold fs-2 mb-0">$50 </span>
                                                    </h6>
                                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                                    class="bi bi-star fs-2 text-warning"></i></a></li>
                                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                                    class="bi bi-star fs-2 text-warning"></i></a></li>
                                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                                    class="bi bi-star fs-2 text-warning"></i></a></li>
                                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                                    class="bi bi-star fs-2 text-warning"></i></a></li>
                                                        <li><a class="" href="javascript:void(0)"><i
                                                                    class="bi bi-star fs-2 text-warning"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endfor
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
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script>
   const scrollableCard = document.getElementById('scrollable-card');
        scrollableCard.addEventListener('wheel', (event) => {
            if (event.deltaY !== 0) {
                event.preventDefault();
                scrollableCard.scrollLeft += event.deltaY;
            }
        });
        const scrollableCover = document.getElementById('scrollable-cover');
        scrollableCover.addEventListener('wheel', (event) => {
            if (event.deltaY !== 0) {
                event.preventDefault();
                scrollableCover.scrollLeft += event.deltaY;
            }
        });
    </script>
</body>

</html>