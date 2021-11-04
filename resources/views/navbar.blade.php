<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white nav nav-tabs">

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('AksesPengguna')? "active":""}}">
                <a href="{{url('AksesPengguna')}}" class="nav-link"><img src="{{asset('images/icon/aksespengguna.png')}}">&nbsp;&nbsp;Akses Pengguna</a>
            </li>
            <li class="nav-item {{ Request::is('Setup')? "active":""}}">
                <a href="{{url('Setup')}}" class="nav-link">Setup</a>
            </li>
            <li class="nav-item {{ Request::is('RekamMedis')? "active":""}}">
                <a href="{{url('RekamMedis')}}" class="nav-link">Rekam Medis</a>
            </li>
            <li class="nav-item {{ Request::is('RawatJalan')? "active":""}}">
                <a href="{{url('RawatJalan')}}" class="nav-link">Rawat Jalan</a>
            </li>
            <li class="nav-item {{ Request::is('RawatInap')? "active":""}}">
                <a href="{{url('RawatInap')}}" class="nav-link">Rawat Inap</a>
            </li>
            <li class="nav-item {{ Request::is('Operasi')? "active":""}}">
                <a href="{{url('Operasi')}}" class="nav-link">Operasi</a>
            </li>
            <li class="nav-item {{ Request::is('Billing')? "active":""}}">
                <a href="{{url('Billing')}}" class="nav-link">Billing</a>
            </li>
        </ul>

    </div>

</nav>
<!-- /.navbar -->