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
                <a href="{{url('AksesPengguna')}}" class="nav-link">
                    <img src="{{asset('images/icon/Akses_Pengguna.png')}}">&nbsp;&nbsp;Akses Pengguna
                </a>
            </li>
            <li class="nav-item {{ Request::is('Setup')? "active":""}}">
                <a href="{{url('Setup')}}" class="nav-link">
                    <img src="{{asset('images/icon/Setup.png')}}">&nbsp;&nbsp;Setup
                </a>
            </li>
            <li class="nav-item {{ Request::is('RekamMedis')? "active":""}}">
                <a href="{{url('RekamMedis')}}" class="nav-link">
                    <img src="{{asset('images/icon/Rekam_Medis.png')}}">&nbsp;&nbsp;Rekam Medis
                </a>
            </li>
            <li class="nav-item {{ Request::is('RawatJalan')? "active":""}}">
                <a href="{{url('RawatJalan')}}" class="nav-link">
                    <img src="{{asset('images/icon/Rawat_Jalan.png')}}">&nbsp;&nbsp;Rawat Jalan
                </a>
            </li>
            <li class="nav-item {{ Request::is('RawatInap')? "active":""}}">
                <a href="{{url('RawatInap')}}" class="nav-link">
                    <img src="{{asset('images/icon/Rawat_Inap.png')}}">&nbsp;&nbsp;Rawat Inap
                </a>
            </li>
            <li class="nav-item {{ Request::is('Operasi')? "active":""}}">
                <a href="{{url('Operasi')}}" class="nav-link">
                    <img src="{{asset('images/icon/Operasi.png')}}">&nbsp;&nbsp;Operasi
                </a>
            </li>
            <li class="nav-item {{ Request::is('Billing')? "active":""}}">
                <a href="{{url('Billing')}}" class="nav-link">
                    <img src="{{asset('images/icon/Billing.png')}}">&nbsp;&nbsp;Billing
                </a>
            </li>
            <li class="nav-item {{ Request::is('Laporan')? "active":""}}">
                <a href="{{url('Laporan')}}" class="nav-link">
                    <img src="{{asset('images/icon/Laporan.png')}}">&nbsp;&nbsp;Laporan
                </a>
            </li>
            <li class="nav-item {{ Request::is('BPJS')? "active":""}}">
                <a href="{{url('BPJS')}}" class="nav-link">
                    <img src="{{asset('images/icon/BPJS.png')}}">&nbsp;&nbsp;BPJS
                </a>
            </li>
            <li class="nav-item {{ Request::is('Akuntansi')? "active":""}}">
                <a href="{{url('Akuntansi')}}" class="nav-link">
                    <img src="{{asset('images/icon/Akuntansi.png')}}">&nbsp;&nbsp;Akuntansi
                </a>
            </li>
            <li class="nav-item {{ Request::is('Panduan')? "active":""}}">
                <a href="{{url('Panduan')}}" class="nav-link">
                    <img src="{{asset('images/icon/Panduan.png')}}">&nbsp;&nbsp;Panduan
                </a>
            </li>
        </ul>

    </div>

</nav>
<!-- /.navbar -->