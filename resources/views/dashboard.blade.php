<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="../assets/css/styles2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
    <style>



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
                        @for ($i = 1; $i <= 20; $i++)
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./a" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @endfor
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
                                        <h4 class="fw-semibold">Kategori</h4>
                                    </div>
                                    <div>
                                        <!-- beetwen hole -->
                                    </div>
                                </div>
                                <div class="scrollable-y mb-9 pb-2" id="scrollable-card" style="overflow: hidden">
                                    <button type="button" class="btn btn-primary mx-2 d-inline-block">Button 1</button>
                                    @for ($i = 1; $i <= 15; $i++) <button type="button"
                                        class="btn btn-outline-primary mx-2 d-inline-block">Button 2</button>
                                        @endfor
                                </div>
                                <div class="scrollable-y mb-9 pb-2 d-flex" id="scrollable-cover">
                                    @for ($i = 1; $i <= 8; $i++) <div class="col-sm-6 col-md-2">
                                        <div class="overflow-hidden rounded-2 mx-3 shadow">
                                            <div class="position-relative">
                                                <a href="javascript:void(0)">
                                                    <img src="../assets/images/products/s4.jpg"
                                                        class="card-img-top rounded-0" alt="...">
                                                </a>
                                                <a href="#"
                                                    class="d-inline-flex p-2 align-items-center justify-content-center bg-primary text-white text-decoration-none rounded-circle position-absolute bottom-0 end-0 mb-n3 me-2"
                                                    style="width: 32px; height: 32px;">
                                                    <i class="bi bi-heart fs-4"></i>
                                                </a>
                                            </div>
                                            <div class="card-body pt-3 p-2">
                                                <h6 class="fw-semibold fs-3">Boat Headphone</h6>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="fw-semibold fs-2 mb-0">$50</h6>

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
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
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