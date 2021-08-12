<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>sosyal medya ekle</title>
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
                    <h3 class="page-title">Sosyal Medya Ekleme </h3>
                </div>
                <div class="row" >
                    <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body"style="background: lightgrey">
                                @csrf
                                <input type="hidden" id="medyaid" value="{{ isset($guncelle->medyaid) ? $guncelle->medyaid : ""}}">
                                <div class="form-group">
                                    <label for="medyaadi">Sosyal Medya Adı</label>
                                    <input type="text" class="form-control" name="medyaadi" id="medyaadi" placeholder="Sosyal Medya Adı" value="{{ isset($guncelle->medyaadi) ? $guncelle->medyaadi : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="link">link</label>
                                    <input type="text" class="form-control" name="link" id="link" placeholder="link" value="{{ isset($guncelle->link) ? $guncelle->link : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">İcon</label>
                                    <input type="text" class="form-control" name="icon" id="icon" placeholder="icon" value="{{ isset($guncelle->icon) ? $guncelle->icon : ""}}">
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
                medyaid:$("#medyaid").val(),
                medyaadi: $('#medyaadi').val(),
                link: $('#link').val(),
                icon: $('#icon').val(),
            }
            let errorMsg = "";
            if(data.medyaadi == "") errorMsg += "- sosyal medya adı boş bırakılamaz.<br>";
            if(data.link == "" ) errorMsg += "- link boş bırakılamaz.<br>";
            if(data.icon == "") errorMsg += "-  icon boş bırakılamaz.<br>";

            if(errorMsg != "") {
                return Swal.fire({
                    title: "Hata",
                    html: errorMsg,
                    icon: "error"
                })
            };
            $.ajax({
                type: 'POST'
                ,url: '{{route('sosyalmedyaEklendi')}}'
                ,data : data
                ,success: function(success){
                    if(success.islemDurum == 1) {
                        window.location.href = '{{route('sosyalmedya')}}'
                    }else{
                        alert("sosyal medya eklenemedi.")
                    }

                }
            })

        })
    })


</script>
</body>
</html>
