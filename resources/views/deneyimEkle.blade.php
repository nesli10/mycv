<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>deneyim ekle</title>
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
                    <h3 class="page-title">Deneyim Ekleme </h3>
                </div>
                <div class="row" >
                    <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body"style="background: lightgrey">
                                @csrf
                                <input type="hidden" id="deneyimid" value="{{ isset($guncelle->deneyimid) ? $guncelle->deneyimid : ""}}">
                                <div class="form-group">
                                    <label for="pozisyon">Pozisyon</label>
                                    <input type="text" class="form-control" name="pozisyon" id="pozisyon" placeholder="pozisyon" value="{{ isset($guncelle->pozisyon) ? $guncelle->pozisyon : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="calismayeri">??al????ma Yeri</label>
                                    <input type="text" class="form-control" name="calismayeri" id="calismayeri" placeholder="??al????ma Yeri" value="{{ isset($guncelle->calismayeri) ? $guncelle->calismayeri : ""}}">
                                </div>
                                <div class="form-group" >
                                    <label for="tarih">Tarih</label>
                                    <input type="text" class="form-control"name="tarih" id="tarih" placeholder="Tarih" value="{{ isset($guncelle->tarih) ? $guncelle->tarih : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="A????klama">A????klama</label>
                                    <textarea  class="form-control" rows="5" name="A????klama" id="A????klama" placeholder="A????klama">{{ isset($guncelle->aciklama) ?  strip_tags($guncelle->aciklama) : ""}} </textarea>


                                </div>
                                <button type="submit" class="btn btn-dark" id="kaydet">kaydet</button>
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
                deneyimid:$("#deneyimid").val(),
                pozisyon: $('#pozisyon').val(),
                calismayeri: $('#calismayeri').val(),
                tarih: $('#tarih').val(),
                aciklama: $('#A????klama').val()
            }
            let errorMsg = "";
            if(data.pozisyon == "") errorMsg += "- pozisyon alan?? bo?? b??rak??lamaz.<br>";
            if(data.calismayeri == "") errorMsg += "- ??al????ma yeri alan?? bo?? b??rak??lamaz.<br>";
            if(data.tarih== "") errorMsg += "- tarih bo?? b??rak??lamaz.<br>";
            if(errorMsg != "") {
                return Swal.fire({
                    title: "Hata",
                    html: errorMsg,
                    icon: "error"
                })
            };
            $.ajax({
                type: 'POST'
                ,url: '{{route('deneyimEklendi')}}'
                ,data : data
                ,success: function(success){
                    if(success.islemDurum == 1) {
                        window.location.href = '{{route('deneyim')}}'
                    }else{
                        alert("deneyim eklenemedi.")
                    }

                }
            })

        })
    })


</script>
</body>
</html>
