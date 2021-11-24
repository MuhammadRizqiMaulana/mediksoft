<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="card card-primary card-sm">
                <div class="card-header">
                    <h5 class="card-title">Personalia</h5>
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
                    <a class="btn btn-app" href="{{url('/Dokter')}}">
                    <img src="{{asset('images/icon/Dokter.png')}}"><br> 
                    Dokter
                    </a>
                    <a class="btn btn-app" href="{{url('/Karyawan')}}">
                    <img src="{{asset('images/icon/Karyawan.png')}}"><br>  
                    Karyawan
                    </a>
                    <a class="btn btn-app" href="{{url('/Jabatan')}}">
                    <img src="{{asset('images/icon/Jabatan.png')}}"><br>  
                    Jabatan
                    </a>

                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->

            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Mitra dan Faskes</h5>
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
                    <a class="btn btn-app" href="{{url('/Jaminan')}}">
                    <img src="{{asset('images/icon/Jaminan.png')}}"><br> 
                    Jaminan
                    </a>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Pengirim_Faskes')}}">
                          <img src="{{asset('images/icon/pengirim.png')}}"><br>
                          Pengirim / Faskes</a>
                    </button>
                    <a class="btn btn-app" href="{{url('/Bank')}}">
                    <img src="{{asset('images/icon/Bank.png')}}"><br></i> 
                    Bank
                    </a>
                </div>

            </div>
            <!-- /.card-tools -->


            <!-- /.card -->

            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">ICD</h5>
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
                    <a class="btn btn-app" href="{{url('/ICD_10')}}">
                    <img src="{{asset('images/icon/ICD_10.png')}}"><br> 
                    ICD 10
                    </a>
                    <a class="btn btn-app" href="{{url('/ICD_9')}}">
                    <img src="{{asset('images/icon/ICD_9.png')}}"><br>
                    ICD 9
                    </a>

                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->

            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Poli / Kelas / Ruang</h5>
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
                    <a class="btn btn-app" href="{{url('/Poli')}}">
                    <img src="{{asset('images/icon/Poli.png')}}"><br> Poli
                    </a>
                    <a class="btn btn-app" href="{{url('/Kelas')}}">
                    <img src="{{asset('images/icon/Kelas.png')}}"><br> Kelas
                    </a>
                    <a class="btn btn-app" href="{{url('/Ruang')}}">
                    <img src="{{asset('images/icon/Ruangan.png')}}"><br> Ruang
                    </a>
                    <a class="btn btn-app" onclick="Kamar();">
                    <img src="{{asset('images/icon/Kamar.png')}}"><br> Kamar
                    </a>

                </div>
                <!-- /.card-body -->

            </div>

            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Tarif Rawat</h5>
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
                    <a class="btn btn-app" href="{{url('/Dokter_Poli')}}">
                    <img src="{{asset('images/icon/Dokter_Poli.png')}}"><br> Dokter Poli
                    </a>
                    <a class="btn btn-app" href="{{url('/Dokter_Konsultasi')}}">
                    <img src="{{asset('images/icon/Dokter_Konsultasi.png')}}"><br> Dokter Konsultasi
                    </a>
                    <a class="btn btn-app" href="{{url('/Dokter_Visit')}}">
                    <img src="{{asset('images/icon/Dokter_Visit.png')}}"><br> Dokter Visit
                    </a>
                    <a class="btn btn-app" href="{{url('/Tindakan_Poli')}}">
                    <img src="{{asset('images/icon/Tindakan_Poli.png')}}"><br> Tindakan Poli
                    </a>
                    <a class="btn btn-app" href="{{url('/Tindakan_Inap')}}">
                    <img src="{{asset('images/icon/Tindakan_Inap.png')}}"><br> Tindakan Inap
                    </a>
                    <a class="btn btn-app" href="{{url('/Administrasi')}}">
                    <img src="{{asset('images/icon/Administrasi.png')}}"><br> Administrasi
                    </a>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Instalasi Gizi</h5>
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
                    <a class="btn btn-app">
                        <i class="fas fa-edit"></i> Menu
                    </a>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div><!-- /.row -->
    <hr>
</div>
<!-- /.content-header -->
<script>
    function kamar(){
      $.get("{{url('/Kamar')}}", {}, function(data, status){
        $(".wrapper").html(data);
        window.history.pushState('/Kamar');
      });
    }
</script>