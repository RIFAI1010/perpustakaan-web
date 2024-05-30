<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt=""/>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="bi bi-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="bi bi-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Dashboard Admin</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                        <span>
                            <i class="bi bi-house"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="bi bi-three-dots-vertical nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">CRUD PENGGUNA</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_siswa" aria-expanded="false">
                        <span>
                            <i class="bi bi-person-add"></i>
                        </span>
                        <span class="hide-menu">Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_petugas" aria-expanded="false">
                        <span>
                            <i class="bi bi-person-fill-gear"></i>
                        </span>
                        <span class="hide-menu">Petugas</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="bi bi-three-dots-vertical nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">CRUD SISTEM</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_buku" aria-expanded="false">
                        <span>
                            <i class="bi bi-book"></i>
                        </span>
                        <span class="hide-menu">Buku</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_category" aria-expanded="false">
                        <span>
                            <i class="bi bi-tag"></i>
                        </span>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_penulis" aria-expanded="false">
                        <span>
                            <i class="bi bi-pen"></i>
                        </span>
                        <span class="hide-menu">Penulis</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_penerbit" aria-expanded="false">
                        <span>
                            <i class="bi bi-printer"></i>
                        </span>
                        <span class="hide-menu">Penerbit</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="bi bi-three-dots-vertical nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Report</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_laporan_peminjaman_berlangsung" aria-expanded="false">
                        <span>
                            <i class="bi bi-grid-1x2-fill"></i>
                        </span>
                        <span class="hide-menu">Report Buku Berlangsung</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard_transaksi_peminjaman" aria-expanded="false">
                        <span>
                            <i class="bi bi-journal-text"></i>
                        </span>
                        <span class="hide-menu">Report Buku Final</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->