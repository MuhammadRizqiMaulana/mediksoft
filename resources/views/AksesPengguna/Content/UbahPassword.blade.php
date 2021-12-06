@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('AksesPengguna.Layout.menu')
    <!-- /.menu -->

    @if(\Session::has('alert-success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fas fa-sign-out-alt"></i><b> Success!!</b></h6>
        {{Session::get('alert-success')}}
    </div>
    @endif
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <!-- /.col -->

                <div class="col-5">
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="TambahDokter">

                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <h3>Ganti Password</h3>
                                <div class="form-group row">
                                    <label for="pwdlama" class="col-sm-4 col-form-label text-right">Password
                                        Lama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="" name=" "
                                            placeholder="Password Lama"
                                            value="@isset($selectbayarrjalan) {{$selectbayarrjalan->norm}} @endisset"
                                            readonly>
                                    </div>
                                    @if ($errors->has('norm'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('norm') }}</p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check">
                                        Simpan</i></button>
                                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times">
                                        Batal</i></button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection