<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>deneyim</title>
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
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">YETKİNLİKLER </h3>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <a style="color:#b366ff; " href="{{route('yetkinlikEkle')}}" class="btn btn-gradient-dark">Yeni Yetkinlik Ekle</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table" id="yetkinlik">
                                    <thead>
                                    <tr>
                                        <th>Yetkinlik Adı</th>
                                        <th>Seviye</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($yetkinlik AS $value)
                                        <tr id="{{$value->yetkinlikid}}">
                                            <td>{{ $value->yetkinlikadi }}</td>
                                            <td>{{ $value->seviye }}</td>
                                            <td><button type="button" class="btn btn-dark" onclick="yetkinlikSil('{{ $value->yetkinlikid}}')">X</button> </td>
                                            <td><a class="btn btn-dark"  href="{{ route('yetkinlikGuncellen')."/".$value->yetkinlikid  }}">güncelle</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
<script >

    function yetkinlikSil(yetkinlikid) {
        $.ajax({
            type: "POST",
            url: "{{ route('yetkinlikSil') }}",
            data: {
                yetkinlikid: yetkinlikid
            },
            success: function(msg) {
                if(msg) {
                    $("#" + yetkinlikid).remove();
                }else{
                    alert("silinemedi");
                }
            }
        });
    }
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        })
    })

</script>
</body>
</html>
