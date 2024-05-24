<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    @include('dashboard.sidebar_staff')
    <!--  Main wrapper -->
    <div class="body-wrapper">
        @include('dashboard.headbar')
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
</div>