<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Kapella Bootstrap Admin Dashboard Template' }}</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Welcome</p>
                            <a href="#" target="_blank" class="btn me-2 buy-now-btn border-0">Ok</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/kapella-admin-pro/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <x-layout.top></x-layout.top>
            <x-layout.menu></x-layout.menu>
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-wrap">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                                    href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com
                                </a>2021</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                                    href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a>
                                templates</span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ url('/') }}/assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ url('/') }}/assets/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="{{ url('/') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ url('/') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ url('/') }}/assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="{{ url('/') }}/assets/vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="{{ url('/') }}/assets/vendors/justgage/justgage.js"></script>
    <script src="{{ url('/') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="{{ url('/') }}/assets/js/dashboard.js"></script>
    <script src="{{ url('/') }}/assets/vendors/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>
    <!-- End custom js for this page-->
    <script>
        function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
            if (iKeyCode < 48 || iKeyCode > 57) {
                return false;
            }
            return true;
        }

        function isDotNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode > 45 || charCode < 45) && (charCode > 46 ||
                    charCode < 46)) {
                return false;
            }
            return true;
        }
    </script>
    {{ $scripts ?? '' }}
</body>

</html>
