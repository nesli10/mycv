
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <meta charset="UTF-8">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/all.min.css?ver=1.2.0') }}" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>

</head>
<body id="top">
<header class="d-print-none">

    <div class="container text-center text-lg-left">
        <div class="py-3 clearfix">
            <h1 class="site-title mb-0">{{ $hakkimda->ad }}</h1>
            <div class="site-nav">
                <nav role="navigation">
                    @foreach($sosyalmedya AS $value)
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="{{ $value->link }}" title="{{ $value->medyaadi }}"><i class="{{ $value->icon }}"></i><span class="menu-title sr-only"></span></a>
                        </li>
                    </ul>
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="page-content">
    <div class="container">
        <div class="cover shadow-lg bg-white">
            <div class="cover-bg p-3 p-lg-4 text-white">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="avatar hover-effect bg-white shadow-sm p-1">
                            <img class="profile-pic" src="{{asset("assets/images/faces")}}/{{$hakkimda->foto}}" width="200" height="200"/>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 text-center text-md-start">
                        <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">{{ $hakkimda->ad }}</h2>
                        <p data-aos="fade-left" data-aos-delay="100">{{ $hakkimda->unvan }}</p>
                        <div class="d-print-none" data-aos="fade-left" data-aos-delay="200"><a class="btn btn-light text-dark shadow-sm mt-1 me-1" id="cvindir" onclick="pdf()" target="_blank">CV İNDİR</a></div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="about-section pt-4 px-3 px-lg-4 mt-1">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3">Hakkımda</h2>
                        <p>{{ $hakkimda->aciklama }}</p>

                    </div>
                </div>
            </div>
            <hr class="d-print-none"/>
            <div class="skills-section px-3 px-lg-4">
                <div class="row">
                    <h2 class="h3 mb-3">YETKİNLİK</h2>

                @foreach($yetkinlik AS $value)
                    <div class="col-md-6">
                        <div class="mb-2"><span>{{ $value->yetkinlikadi }} </span>
                            <div class="progress my-1">
                                <div class="progress-bar bg-primary" role="progressbar" data-aos="zoom-in-right" data-aos-delay="100" data-aos-anchor=".skills-section" style="width: {{ $value->seviye }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <hr class="d-print-none"/>
            <div class="work-experience-section px-3 px-lg-4">
                <h2 class="h3 mb-3">DENEYİM</h2>
                @foreach($deneyim AS $value)
                <div class="timeline">
                    <div class="timeline-card timeline-card-primary card shadow-sm">
                        <div class="card-body">
                            <div class="h5 mb-1">{{ $value->pozisyon }} <span class="text-muted h6">{{ $value->calismayeri }}</span></div>
                            <div class="text-muted text-small mb-2">{{ $value->tarih }}</div>
                            <div>{{ $value->aciklama }}</div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <hr class="d-print-none"/>
            <div class="page-break"></div>
            <div class="education-section px-3 px-lg-4 pb-4">
                <h2 class="h3 mb-3">EĞİTİM</h2>
                @foreach($egitim AS $value)
                <div class="timeline">
                            <div class="timeline-card timeline-card-success card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">{{ $value->bolum }} <span class="text-muted h6"> {{ $value->okul }} </span></div>
                                    <div class="text-muted text-small mb-2">{{ $value->tarih }}</div>
                                    <div>{!! $value->aciklama !!}</div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
            <hr class="d-print-none"/>
            <div class="contant-section pb-4" id="contact">
                <h2 class="h3 mb-3">İLETİŞİM</h2>
                @foreach($iletisim AS $value)
                <div class="row">
                    <div class="col">
                        <div class="mt-2">
                            <h3 class="h6">Adres</h3>
                            <div class="pb-2 text-secondary">{{ $value->adres }}</div>
                            <h3 class="h6">telefon</h3>
                            <div class="pb-2 text-secondary">{{ $value->telefon }}</div>
                            <h3 class="h6">Email</h3>
                            <div class="pb-2 text-secondary">{{ $value->email }}</div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div></div>
</div>
<footer class="pt-4 pb-4 text-muted text-center d-print-none">
    <div class="container">
        <div class="my-3">
            <div class="h4">{{ $hakkimda->ad }}</div>
            <div class="footer-nav">
                <nav role="navigation">
                    @foreach($sosyalmedya AS $value)
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="{{ $value->link }}" title="{{ $value->medyaadi }}"><i class="{{ $value->icon }}"></i><span class="menu-title sr-only"></span></a>
                        </li>
                    </ul>
                    @endforeach
                    <a  class="nav-link" href="/admin">
                        ADMİN
                    </a>
                </nav>
            </div>
        </div>

    </div>
</footer>
<script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
<script src="scripts/aos.js?ver=1.2.0"></script>
<script src="scripts/main.js?ver=1.2.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.2.2/html2canvas.min.js" integrity="sha512-LAy9JsHauh0F7L/awqsQUZAulUZxlnaJdvTPysAC7eip4Z0lMnKxP1rwx9kZDrQIWFOiiukaFupzaRHiyRRnxg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset("assets/js/pdf.js")}}"></script>

</body>
</html>
