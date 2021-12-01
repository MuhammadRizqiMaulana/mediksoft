@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
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
                                <h3>Anamnesa Paisen Rawat Inap</h3>
                                <div class="form-group">
                                    <label for="nama">Faktur Rawat Inap</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="" name=""
                                                placeholder="Faktur Rawat Inap">
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <label for="">Anamnesa</label>
                                <div class="col">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Anamnesa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                    </table>
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