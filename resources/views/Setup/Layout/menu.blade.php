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
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Dokter')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Dokter.png')}}"><br>
                            Dokter
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Karyawan')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Karyawan.png')}}"><br>
                            Karyawan
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Jabatan')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Jabatan.png')}}"><br>
                            Jabatan
                        </a>
                    </button>
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
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Jaminan')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Jaminan.png')}}"><br>
                            Jaminan
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Pengirim_Faskes')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/pengirim.png')}}"><br>
                            Pengirim / Faskes</a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Bank')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Bank.png')}}"><br></i>
                            Bank
                        </a>
                    </button>
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
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Icd10')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/ICD_10.png')}}"><br>
                            ICD 10
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Icd9')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/ICD_9.png')}}"><br>
                            ICD 9
                        </a>
                    </button>
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
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Poli')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Poli.png')}}"><br> Poli
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Kelas')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Kelas.png')}}"><br> Kelas
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Ruang')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Ruangan.png')}}"><br> Ruang
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="{{url('/Kamar')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Kamar.png')}}"><br> Kamar
                        </a>
                    </button>
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
                    <button class="btn btn-default text-center" @guest disabled @endguest>
                        <a class="users-list-name" href="{{url('/DokterPoli')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Dokter_Poli.png')}}"><br> Dokter Poli
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest>
                        <a class="users-list-name" href="{{url('/DokterKonsultasi')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Dokter_Konsultasi.png')}}"><br> Dokter Konsultasi
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest>
                        <a class="users-list-name" href="{{url('/DokterVisit')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Dokter_Visit.png')}}"><br> Dokter Visit
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest>
                        <a class="users-list-name" href="{{url('/TindakanPoli')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Tindakan_Poli.png')}}"><br> Tindakan Poli
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest>
                        <a class="users-list-name" href="{{url('/TindakanInap')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Tindakan_Inap.png')}}"><br> Tindakan Inap
                        </a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest>
                        <a class="users-list-name" href="{{url('/Administrasi')}}" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Administrasi.png')}}"><br> Administrasi
                        </a>
                    </button>
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
                    <button class="btn btn-default text-center" @guest disabled @endguest>
                        <a class="users-list-name" @guest onclick="return false;"
                        @endguest>
                            <i class="fas fa-edit"></i> Menu
                        </a>
                    </button>

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
function kamar() {
    $.get("{{url('/Kamar')}}", {}, function(data, status) {
        $(".wrapper").html(data);
        window.history.pushState('/Kamar');
    });
}
</script>