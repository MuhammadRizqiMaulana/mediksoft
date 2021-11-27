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
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Pendaftaran')}}">
                            <img src="{{asset('images/icon/Pendaftaran.png')}}"><br> Pendaftaran
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Pasien')}}">
                            <img src="{{asset('images/icon/Pasien.png')}}"><br> Pasien
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Keanggotaan')}}">
                            <img src="{{asset('images/icon/Keanggotaan.png')}}"><br> Keanggotaan
                        </a>
                    </button>
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
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Pendaftaran_Rawat_Jalan')}}">
                            <img src="{{asset('images/icon/RM_Rawat_Jalan.png')}}"><br> RM Rawat Jalan
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/RM_RawatInap')}}">
                            <img src="{{asset('images/icon/RM_Rawat_Inap.png')}}"><br> RM Rawat Inap
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/KamarKosong')}}">
                            <img src="{{asset('images/icon/Kamar_Kosong.png')}}"><br> Kamar Kosong
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