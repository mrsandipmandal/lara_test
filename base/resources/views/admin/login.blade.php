<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kapella Bootstrap Admin Dashboard Template</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{url('/')}}/assets//vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('/')}}/assets//vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('/')}}/assets//css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('/')}}/assets//images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="{{url('/')}}/assets//images/logo.svg" alt="logo">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>

                <form class="pt-3" method="POST" action="{{url('/')}}/login">
                  @csrf
                <p class="card-title text-center text-danger">
                    @if ($resp['error'])
                        {{ $resp['message'] }}
                    @endif
                </p>

                  <div class="form-group">
                    <span class="form-label-description">
                        @error("username")
                        {{$message}}
                        @enderror
                      </span>
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder = "Username" name = "username"  value="{{old('username')}}">
                  </div>
                  <div class="form-group">
                    <span class="form-label-description">
                        @error("password")
                            {{$message}}
                        @enderror
                      </span>
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder = "Password" name = "password" @error("password") data-validate="Enter password  {{$message}}" @enderror>
                  </div>
                  {{-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div> --}}
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                  </div>
                </form>

                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="{{url('/')}}/forget_password" class="auth-link text-black">Forgot password?</a>
                  </div>
                  {{-- <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook me-2"></i>Connect using facebook
                    </button>
                  </div> --}}
                  <div class="text-center mt-4 font-weight-light">
                    Don't have an account? <a href="register.html" class="text-primary">Sign Up</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{url('/')}}/assets//vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{url('/')}}/assets//js/template.js"></script>
  <!-- endinject -->
</body>

</html>
