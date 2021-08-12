<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <img class="nav-item nav-profile">
            <a href="{{route('hakkimdaEkle')}}" class="nav-link" >
                <div class="nav-profile-text d-flex flex-column align-items-center">
                    <img src="{{asset("assets/images/faces/foto.jpg")}}"s alt="profile" style="width:100px"> <br>

                    <a style="color: #0b0e11; ">
                    <span  class="font-weight-bold mb-2">Neslişah Ebral Durdu</span>
                    </a>
                    <span class="text-secondary text-small">Bilişim Sistemleri Mühendisi</span>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("adminn")}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('egitimm')}}">
                <span class="menu-title">Eğitim bilgileri</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('deneyim')}}">
                <span class="menu-title">İş deneyimleri</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('yetkinlik')}}">
                <span class="menu-title">Yetkinlikler</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('iletisim')}}">
                <span class="menu-title">İletişim</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('sosyalmedya')}}">
                <span class="menu-title">Sosyal Medya</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
