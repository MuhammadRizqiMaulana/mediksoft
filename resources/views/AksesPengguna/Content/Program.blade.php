@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('AksesPengguna.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Settings Program</h4>
        </div>
    </div>

    @if(\Session::has('alert-success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fas fa-sign-out-alt"></i><b> Success!!</b></h6>
        {{Session::get('alert-success')}}
    </div>
    @endif
    @if(\Session::has('alert-danger'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fas fa-sign-out-alt"></i><b> Gagal!!</b></h6>
        {{Session::get('alert-danger')}}
    </div>
    @endif

    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-perusahaan-tab" data-toggle="pill"
                                        href="#custom-tabs-one-perusahaan" role="tab"
                                        aria-controls="custom-tabs-one-perusahaan" aria-selected="false">Perusahaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-nota-tab" data-toggle="pill"
                                        href="#custom-tabs-one-nota" role="tab" aria-controls="custom-tabs-one-nota"
                                        aria-selected="false">Nota</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-pengaturan-tab" data-toggle="pill"
                                        href="#custom-tabs-one-pengaturan" role="tab"
                                        aria-controls="custom-tabs-one-pengaturan" aria-selected="true">Pengaturan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-ndatabase-tab" data-toggle="pill"
                                        href="#custom-tabs-one-ndatabase" role="tab"
                                        aria-controls="custom-tabs-one-ndatabase" aria-selected="false">Nama Database
                                        Lain</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-perusahaan" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-perusahaan-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <!-- /.col -->
                                                <div class="col">
                                                    <!-- general form elements -->
                                                    <div class="card card-success card-outline">
                                                        <!-- /.card-header -->
                                                        <!-- form start -->
                                                        <form>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label for="nama">Nama
                                                                                        Perusahaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id=""
                                                                                        name=""
                                                                                        placeholder="Nama Perusahaan">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label for="">Alamat</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id=""
                                                                                        name="" placeholder="Alamat">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Kecamatan</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name=""
                                                                                        placeholder="Kecamatan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <!-- select -->
                                                                                <div class="form-group">
                                                                                    <label for="">Kabupaten</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id=""
                                                                                        name="" placeholder="Kabupaten">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Telp</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name=""
                                                                                        placeholder="Telp">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <!-- select -->
                                                                                <div class="form-group">
                                                                                    <label for="">Fax</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id=""
                                                                                        name="" placeholder="Fax">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label for="">Kode Penomoran
                                                                                        Surat</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id=""
                                                                                        name=""
                                                                                        placeholder="Kode Penomoran Surat">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="col">
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <h5 class="card-title">
                                                                                        Logo
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="card-content">
                                                                                    <div class="card-body">
                                                                                        <input type="file" name="img"
                                                                                            class="image-preview-filepond">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                    </section>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-nota" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-nota-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="example1"
                                                                class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nama Nota</th>
                                                                        <th>Nomor Nota</th>
                                                                        <th>Awalan Nota</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                            </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                    </section>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-pengaturan" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-pengaturan-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col">
                                                    <form>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="nama">URL API
                                                                                    Antrian</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="" name=""
                                                                                    placeholder="URL API Antrian">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">KEY API Antrian</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="" name=""
                                                                                    placeholder="KEY API Antrian">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">Aplikasi Akuntansi</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="" name=""
                                                                                    placeholder="Aplikasi Akuntansi">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </section>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-ndatabase" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-ndatabase-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col">
                                                    <form>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-3"><label>LAB / RAD</label>
                                                                        </div>
                                                                        <input type="text" class="form-control" id=""
                                                                            name="" placeholder="LAB / RAD">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="1" id="" name="">
                                                                            <label class="form-check-label" for="">
                                                                                Tanpa Aplikasi Laboratorium / Radiologi
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-3"><label>Farmasi</label></div>
                                                                        <input type="text" class="form-control" id=""
                                                                            name="" placeholder="URL API Antrian">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="1" id="" name="">
                                                                            <label class="form-check-label" for="">
                                                                                Tanpa Aplikasi Farmasi
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </section>
                                </div>
                                <!-- /.container-fluid -->
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection