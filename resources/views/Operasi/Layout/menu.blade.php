<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Setup</h5>
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
                        <a class="users-list-name" href="{{url('/JenisAnestesi')}}">
                            <img src="{{asset('images/icon/Jenis_Anestesi.png')}}"><br> Jenis Anestesi
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/SpesialisBedah')}}">
                            <img src="{{asset('images/icon/Spesialis_Bedah.png')}}"><br> Spesialis Bedah
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/GolonganOperasi')}}">
                            <img src="{{asset('images/icon/Golongan_Operasi.png')}}"><br> Golongan Operasi
                        </a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Tarif</h5>
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
                        <a class="users-list-name" href="{{url('/DokterBedah')}}">
                            <img src="{{asset('images/icon/Dokter_Bedah.png')}}"><br> Dokter Bedah
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Tarif_Tindakan_Operasi')}}">
                            <img src="{{asset('images/icon/Tarif_Tindakan_Operasi.png')}}"><br> Tarif Tindakan Operasi
                        </a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Data Operasi</h5>
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
                        <a class="users-list-name" href="{{url('/Catatan_Operasi')}}">
                            <img src="{{asset('images/icon/Catatan_Operasi.png')}}"><br> Catat Operasi
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/DataOperasi')}}">
                            <img src="{{asset('images/icon/Data_Operasi.png')}}"><br> Data Operasi
                        </a>
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