<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="card card-primary card-sm">
                <div class="card-header">
                    <h5 class="card-title">Rumah Sakit</h5>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Management')}}">
                            <img src="{{asset('images/icon/Indikator_RS.png')}}"><br>
                            Management</a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Indikator_RS')}}">
                            <img src="{{asset('images/icon/Indikator_RS.png')}}"><br>
                            Indikator RS</a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Pasien</h5>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Statistik')}}">
                            <img src="{{asset('images/icon/Statistik.png')}}"><br>
                            Statistik</a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Riwayat')}}">
                            <img src="{{asset('images/icon/Riwayat.png')}}"><br>
                            Riwayat</a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Pelayanan</h5>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Perawatan')}}">
                            <img src="{{asset('images/icon/Perawatan.png')}}"><br>
                            Perawatan</a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Kecepatan_Pelayanan')}}">
                            <img src="{{asset('images/icon/Kecepatan_Pelayanan.png')}}"><br>
                            Kecepatan Pelayanan</a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Tindakan_Dokter')}}">
                            <img src="{{asset('images/icon/Tindakan_Dokter.png')}}"><br>
                            Tindakan Dokter</a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div><!-- /.row -->
    </div>
    <hr>
</div>
<!-- /.content-header -->