<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="card card-primary card-sm ">
                <div class="card-header">
                    <h5 class="card-title">Pengaturan</h5>
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
                        <a class="users-list-name" href="{{url('/Program')}}">
                            <img src="{{asset('images/icon/program.png')}}"><br>
                            Program</a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name">
                            <img src="{{asset('images/icon/database.png')}}"><br>
                            DB Akuntansi</a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name">
                            <img src="{{asset('images/icon/database.png')}}"><br>
                            Database</a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Data Pengguna</h5>
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
                        <a class="users-list-name" href="{{url('/LevelPengguna')}}">
                            <img src="{{asset('images/icon/Level_Pengguna.png')}}"><br>
                            Level Pengguna
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Pengguna')}}">
                            <img src="{{asset('images/icon/Pengguna.png')}}"><br>
                            Pengguna
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/UbahPassword'.auth()->user()->iduser )}}">
                            <img src="{{asset('images/icon/Ganti_Password.png')}}"><br>
                            Ganti Password
                        </a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">Login User</h5>
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
                        <a class="users-list-name" href="{{url('/Login')}}">
                            <img src="{{asset('images/icon/Login.png')}}"><br>
                            Login
                        </a>
                    </button>
                    <button class="btn btn-default text-center">
                        <a class="users-list-name" href="{{url('/Logout')}}">
                            <img src="{{asset('images/icon/Logout.png')}}"><br>
                            Logout
                        </a>
                    </button>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title"></h5>
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
                        <a class="users-list-name" href="{{url('/Keluar')}}">
                            <img src="{{asset('images/icon/Keluar.png')}}"><br> Keluar
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