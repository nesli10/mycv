<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>sosyal medya</title>
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
                    <h3 class="page-title">Sosyal Medya </h3>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <a style="color:#b366ff; " href="{{route('sosyalmedyaEkle')}}" class="btn btn-gradient-dark">Yeni Sosyal Medya Ekle</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table" id="sosyalmedya">
                                    <thead>
                                    <tr>
                                        <th>Sosyal Medya Adı</th>
                                        <th>Link</th>
                                        <th>İcon</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sosyalmedya AS $value)
                                        <tr id="{{$value->medyaid}}">
                                            <td>{{ $value->medyaadi }}</td>
                                            <td>{{ $value->link }}</td>
                                            <td>{{ $value->icon }}</td>
                                            <td><button type="button" class="btn btn-dark" onclick="sosyalmedyaSil('{{ $value->medyaid}}')">X</button> </td>
                                            <td><a class="btn btn-dark"  href="{{ route('sosyalmedyaGuncellen')."/".$value->medyaid  }}">güncelle</a></td>
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

    function sosyalmedyaSil(medyaid) {
        $.ajax({
            type: "POST",
            url: "{{ route('sosyalmedyaSil') }}",
            data: {
                medyaid: medyaid
            },
            success: function(msg) {
                if(msg) {
                    $("#" + medyaid).remove();
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
