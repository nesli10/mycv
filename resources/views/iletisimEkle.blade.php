<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>iletişim ekle</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <link rel="stylesheet" href="{{asset("assets/sweet-alert/sweetalert2.css")}}">
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
@include("shared.header")
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
    @include("shared.sidebar")
    <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" >
                <div class="page-header">
                    <h3 class="page-title">İletişim Ekleme </h3>
                </div>
                <div class="row" >
                    <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body"style="background: lightgrey">
                                @csrf
                                <input type="hidden" id="iletisimid" value="{{ isset($guncelle->iletisimid) ? $guncelle->iletisimid : ""}}">
                                <div class="form-group">
                                    <label for="adres">Adres</label>
                                    <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" value="{{ isset($guncelle->adres) ? $guncelle->adres : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="telefon">Telefon</label>
                                    <input type="text" class="form-control" name="telefon" id="telefon" placeholder="Telefon" value="{{ isset($guncelle->telefon) ? $guncelle->telefon : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ isset($guncelle->email) ? $guncelle->email : ""}}">
                                </div>
                                <button type="submit" class="btn btn-dark" id="kaydet">kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="{{asset("assets/sweet-alert/sweetalert2.js")}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->

<script >
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        })
        $('#kaydet').on('click', function(){

            let data = {
                iletisimid:$("#iletisimid").val(),
                adres: $('#adres').val(),
                telefon: $('#telefon').val(),
                email: $('#email').val(),
            }
            let errorMsg = "";
            if(data.adres == "") errorMsg += "- adres alanı boş bırakılamaz.<br>";
            if(data.email == "") errorMsg += "- email alanı boş bırakılamaz.<br>";

            if(errorMsg != "") {
                return Swal.fire({
                    title: "Hata",
                    html: errorMsg,
                    icon: "error"
                })
            };
            $.ajax({
                type: 'POST'
                ,url: '{{route('iletisimEklendi')}}'
                ,data : data
                ,success: function(success){
                    if(success.islemDurum == 1) {
                        window.location.href = '{{route('iletisim')}}'
                    }else{
                        alert("iletisim eklenemedi.")
                    }

                }
            })

        })
    })


</script>
</body>
</html>
