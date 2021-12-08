<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="card card-primary card-sm">
                <div class="card-header">
                    <h5 class="card-title">Posting Jurnal</h5>
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
                        <a class="users-list-name" href="#" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Data_Jurnal.png')}}"><br>
                            Data Jurnal</a>
                    </button>
                    <button class="btn btn-default text-center" @guest disabled @endguest >
                        <a class="users-list-name" href="#" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/program.png')}}"><br>
                            Jurnal Setting</a>
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-sm ml-2">
                <div class="card-header">
                    <h5 class="card-title">App</h5>
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
                        <a class="users-list-name" href="#" @guest onclick="return false;"
                    @endguest>
                            <img src="{{asset('images/icon/Akuntansi_.png')}}"><br>
                            Akuntansi</a>
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