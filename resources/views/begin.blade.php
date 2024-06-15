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
            background: url(" {{ asset('assets/images/backgrounds/montain-bg.jpg') }} ");
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

        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper" style="margin-left: 0; max-width: none;">
            <!--  Header Start -->
            <header class="app-header" style="max-width: none; width: 100%; background-color: rgba(0, 0, 0, 0.253)">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end gap-1">
                            <a href="{{ route('register') }}"  class="btn btn-primary mx-2">Daftar</a>
                            <a href="{{ route('login') }}"  class="btn btn-outline-primary mx-2">Masuk</a>
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid justify-content-center align-content-center d-flex vh-100" style="padding-top: 100px; height: 600px">
                <div class="justify-content-center align-content-center" style="text-align: center">
                    <div><p class="text-white mb-0" style="font-size: 60px; font-weight: bold">PERPUSTAKAAN</p></div>
                    <div style="margin-bottom: 40px"><p class="text-white mb-0" style="font-size: 30px">Perpustakaan Perpustakaan</p></div>
                    <div><a href="{{ route('register') }}" class="btn btn-primary mx-2 px-4 py-2" style="font-size: 20px">Daftar</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2 px-4 py-2" style="font-size: 20px;">Masuk</a></div>

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