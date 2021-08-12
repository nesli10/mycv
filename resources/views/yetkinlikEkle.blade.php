<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>yetkinlik ekle</title>
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
                    <h3 class="page-title">Yetkinlik Ekleme </h3>
                </div>
                <div class="row" >
                    <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body"style="background: lightgrey">
                                @csrf
                                <input type="hidden" id="yetkinlikid" value="{{ isset($guncelle->yetkinlikid) ? $guncelle->yetkinlikid : ""}}">
                                <div class="form-group">
                                    <label for="yetkinlikadi">Yetkinlik Adı</label>
                                    <input type="text" class="form-control" name="yetkinlikadi" id="yetkinlikadi" placeholder="Yetkinlik Adı" value="{{ isset($guncelle->yetkinlikadi) ? $guncelle->yetkinlikadi : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="seviye">Seviye</label>
                                    <input type="text" class="form-control" name="seviye" id="seviye" placeholder="Seviye" value="{{ isset($guncelle->seviye) ? $guncelle->seviye : ""}}">
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
                yetkinlikid:$("#yetkinlikid").val(),
                yetkinlikadi: $('#yetkinlikadi').val(),
                seviye: $('#seviye').val(),
            }
            let errorMsg = "";
            if(data.yetkinlikadi == "") errorMsg += "- yetkinlik adı alanı boş bırakılamaz.<br>";
            if(data.seviye == "" ) errorMsg += "- seviye alanı boş bırakılamaz.<br>";
            else if (data.seviye <= 0 || data.seviye > 100 || !Number.isInteger(parseInt(data.seviye))) errorMsg += " -seviye 0 ile 100 arasında olmalıdır.<br> -seviye kısmına harf girilemez.<br>";

            if(errorMsg != "") {
                return Swal.fire({
                    title: "Hata",
                    html: errorMsg,
                    icon: "error"
                })
            };
            $.ajax({
                type: 'POST'
                ,url: '{{route('yetkinlikEklendi')}}'
                ,data : data
                ,success: function(success){
                    if(success.islemDurum == 1) {
                        window.location.href = '{{route('yetkinlik')}}'
                    }else{
                        alert("yetkinlik eklenemedi.")
                    }

                }
            })

        })
    })


</script>
</body>
</html>
