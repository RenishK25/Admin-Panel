<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Mar 2023 06:14:46 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Sign In | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('public/assets/admin/')}}/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="{{url('public/assets/admin/')}}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{url('public/assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('public/assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{url('public/assets/admin/')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{url('public/assets/admin/')}}/css/custom.min.css" rel="stylesheet" type="text/css" />

    <script src="{{url('public/assets/admin/js/scripts/sweetalert2.all.js') }}"></script>


</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index-2.html" class="d-inline-block auth-logo">
                                    <img src="{{url('public/assets/admin/')}}/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Velzon.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form>
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Enter Email">
                                            <div class="error"><span id="email" class="text-danger"></span></div>
                                            
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Enter password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                
                                            </div>
                                            <div class="error"><span id="password" class="text-danger"></span></div>


                                        </div>

                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div> --}}

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100">Sign In</button>
                                            <button type="button" id="login" class="btn btn-success w-100 submit">Login</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JAVASCRIPT -->
    <script src="{{url('public/assets/admin/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('public/assets/admin/')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{url('public/assets/admin/')}}/libs/node-waves/waves.min.js"></script>
    <script src="{{url('public/assets/admin/')}}/libs/feather-icons/feather.min.js"></script>
    <script src="{{url('public/assets/admin/')}}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{url('public/assets/admin/')}}/js/plugins.js"></script>
    

    <!-- particles js -->
    <script src="{{url('public/assets/admin/')}}/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="{{url('public/assets/admin/')}}/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="{{url('public/assets/admin/')}}/js/pages/password-addon.init.js"></script>
</body>


{{-- <script type="text/javascript">
    $(document).ready( function () {
      $(".submit").on("click",function(e){
        alert();
      e.preventDefault(); 
        $("form").serialize();
        $('div.error span.text-danger').html("");
        $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': "{{@csrf_token()}}"
              },
          });
        $.ajax({
            url :"{{url('admin/login_login')}}",
            method:"get",
            data: $("form").serialize(),
            dataType: "json",
          success : function (data) {
          if(data.status == 'success'){
              swal("  ", {icon:"success",  title:"Login Successful",  buttons: false})
                setTimeout(myGreeting, 900);
                function myGreeting() {
                window.location.href="{{url('/admin/dashboard/')}}";  
                }
              }else if(data.status == 'error') {
              $.each(data.error,function(key,val){
                $('div.error span#' + key).html(val);
              });
            }else if(data.status == 'faile'){
              swal(data.message, "Please Try Again!", "error");
              } 
          }
        })
      });
    });
  </script> --}}

<script type="text/javascript">
    $(document).ready( function () {
      $(".submit").on("click",function(e){
            alert();
      });

      $("form").on("submit",function(e){
      e.preventDefault(); 
        $("form").serialize();
        $('div.error span.text-danger').html("");
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        });
        $.ajax({
          url : "{{url('admin/login')}}",
          method:"POST",
          data: $("form").serialize(),
          dataType: "json",
          success : function (data) {
            if(data.status == 'success'){
              swal("  ", {icon:"success",  title:"Login Successful",  buttons: false})
                setTimeout(myGreeting, 900);
                function myGreeting() {
                window.location.href="{{url('/admin/dashboard/')}}";  
                }
              }else if(data.status == 'error') {
              $.each(data.error,function(key,val){
                $('div.error span#' + key).html(val);
              });
            }else if(data.status == 'faile'){
              swal(data.message, "Please Try Again!", "error");
              }  
          }
        })
      });
    });
  </script>
  

<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Mar 2023 06:14:46 GMT -->
</html>