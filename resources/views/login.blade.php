<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin giris</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset("assets/vendors/mdi/css/materialdesignicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/css/vendor.bundle.base.css")}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset("assets/images/favicon.ico")}}" />
    <link rel="stylesheet" href="{{asset("assets/sweet-alert/sweetalert2.css")}}">

</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="{{asset("assets/images/logo.svg")}}">
                        </div>
                        <h4>Hello:)</h4>
                        <form class="pt-3" action="{{route('login')}}" method="post"  id="loginform">
                            @csrf
                            <div class="form-group">
                                <input type="email"  class="form-control form-control-lg" id="email" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password"  class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                            </div>
                            <div class="mt-3">
                                <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"  id="login" href="javascript:void(0)">LOGİN</a>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset("assets/vendors/js/vendor.bundle.base.js")}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset("assets/js/off-canvas.js")}}"></script>
<script src="{{asset("assets/js/hoverable-collapse.js")}}"></script>
<script src="{{asset("assets/js/misc.js")}}"></script>
<script src="{{asset("assets/sweet-alert/sweetalert2.js")}}"></script>

<script>
    $('#login').on('click', function() {
       let data= {
            email: $('#email').val(),
            password : $('#password').val()
        }
        let errorMsg = "";
        if (data.email == "") errorMsg += "- Email boş bırakılamaz.<br>";
        if (data.password == "") errorMsg += "- Şifre alanı boş bırakılamaz.<br>";
        if (errorMsg != "") {
            return Swal.fire({
                title: "Hata",
                html: errorMsg,
                icon: "error"
            })
        }
        $("#loginform").submit();
    });

</script>
<!-- endinject -->
</body>
</html>
