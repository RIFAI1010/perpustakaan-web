<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
.imgc {
    
    width: 100%;
    
    /* Ganti dengan URL gambar latar belakang yang diinginkan */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    aspect-ratio: 1 / 1;
    /* Tetapkan background image */
   
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
        <div
            class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-6 col-lg-8 col-xl-8 col-xxl-6">
                        <div class="card mb-0">
                            <div class="card-body d-lg-flex">
                                <div class="col-lg-6 justify-content-center align-content-center d-flex" style="padding-right: 10px">
                                    <div class="col-10 justify-content-center align-content-center">
                                        
                                        <img class="imgc" src="{{ asset('assets/images/hutao.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="padding-left: 10px">
                                    <a href="{{ route('begin') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <h2>Perpustakaan</h2>
                                    </a>
                                    <p class="text-center">Registrasi</p>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                            @error('username')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex">
                                            <div class="mb-4 col-6" style="padding-right: 10px">
                                                <label for="exampleInputEmail1" class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                                @error('first_name')
                                                <div class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4 col-6" style="padding-left: 10px">
                                                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                                @error('last_name')
                                                <div class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                            @error('password')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                            @if (session('error'))
                                            <div class="form-text text-danger">
                                                {{ session('error') }}
                                            </div>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <p class="fs-4 mb-0 fw-bold">Sudah punya akun</p>
                                            <a class="text-primary fw-bold ms-2"
                                                href="{{ route('login') }}">Login</a>
                                        </div>
                                    </form>
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
</body>

</html>