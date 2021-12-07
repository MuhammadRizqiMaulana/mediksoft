@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('AksesPengguna.Layout.menu')
    <!-- /.menu -->

    @if(\Session::has('alert-danger'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fas fa-sign-out-alt"></i><b> Gagal!!</b></h6>
        {{Session::get('alert-danger')}}
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-5">
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="">
                        <div class="card-header">
                            Ganti Password
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/UbahPassword/update'.$ubah->iduser)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="pwdlama" class="col-sm-4 col-form-label text-left">Password
                                        Lama</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="pwdlama"
                                            placeholder="Password Lama" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pwdlama" class="col-sm-4 col-form-label text-left">Password
                                        Baru</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="pwdbaru" name="pwdbaru"
                                            placeholder="Password Baru" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pwdlama" class="col-sm-4 col-form-label text-left">Ulangi Password
                                        Baru</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="ulangpwdbaru"
                                            name="ulangpwdbaru" placeholder="Ulangi Password Baru" value="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" id="btnSubmit" class="btn btn-outline-primary"><i
                                        class="fa fa-check">
                                        Simpan</i></button>
                                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times">
                                        Batal</i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
$(function() {
    $("#btnSubmit").click(function() {
        var password = $("#pwdbaru").val();
        var confirmPassword = $("#ulangpwdbaru").val();
        if (password != confirmPassword) {
            alert("Password baru tidak sama");
            return false;
        }
        return true;
    });
});
</script>
@endsection