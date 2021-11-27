<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Pendataan Rekam Medis</h5>
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
                    <a class="btn btn-app" href="{{url('/Pendaftaran')}}">
                    <img src="{{asset('images/icon/Pendaftaran.png')}}"><br> Pendaftaran
                    </a>
                    <a class="btn btn-app" href="{{url('/Pasien')}}">
                    <img src="{{asset('images/icon/Pasien.png')}}"><br> Pasien
                    </a>
                    <a class="btn btn-app" href="{{url('/Keanggotaan')}}">
                    <img src="{{asset('images/icon/Keanggotaan.png')}}"><br> Keanggotaan
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Data Rekam Medis</h5>
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
                    <a class="btn btn-app" href="{{url('/RM_Rawat_Jalan')}}">
                    <img src="{{asset('images/icon/RM_Rawat_Jalan.png')}}"><br> RM Rawat Jalan
                    </a>
                    <a class="btn btn-app" href="{{url('/RM_Rawat_Inap')}}">
                    <img src="{{asset('images/icon/RM_Rawat_Inap.png')}}"><br> RM Rawat Inap
                    </a>
                    <a class="btn btn-app" href="{{url('/Kamar_Kosong')}}">
                    <img src="{{asset('images/icon/Kamar_Kosong.png')}}"><br> Kamar Kosong
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div><!-- /.row -->
    </div>
    <hr>
</div>
<!-- /.content-header -->