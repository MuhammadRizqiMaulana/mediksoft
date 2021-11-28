@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Operasi.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Data Operasi</h4>
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


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="TambahDataPendaftaran">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-4"><label>Dari</label></div>
                                            <div class="col-8"><input type="date" class="form-control"> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><label>Sampai</label></div>
                                            <div class="col-8"><input type="date" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <a class="btn btn-block btn-outline-info btn-lg">
                                            <i class="fas fa-filter"></i> Filter
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3"><button type="button"
                                            class="btn btn-block btn-outline-success"><i
                                                class="fas fa-calendar-minus"></i></button></div>
                                    <div class="col-6"><button type="button"
                                            class="btn btn-block btn-outline-primary"><i class="fas fa-calendar"></i>
                                            Bulan ini</button></div>
                                    <div class="col-3"><button type="button"
                                            class="btn btn-block btn-outline-success"><i
                                                class="fas fa-calendar-plus"></i></button></div>
                                </div>
                                <div class="row">
                                    <div class="col-3"><button type="button"
                                            class="btn btn-block btn-outline-success"><i
                                                class="fas fa-calendar-minus"></i></button></div>
                                    <div class="col-6"><button type="button"
                                            class="btn btn-block btn-outline-primary"><i class="fas fa-calendar"></i>
                                            Hari ini</button></div>
                                    <div class="col-3"><button type="button"
                                            class="btn btn-block btn-outline-success"><i
                                                class="fas fa-calendar-plus"></i></button></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"><a href="" id=""
                                            class="btn btn-block btn-outline-secondary btn-sm"><i
                                                class="fa fa-plus-circle"></i> Tambah</a></div>
                                    <div class="col"><button type="button"
                                            class="btn btn-block btn-outline-info btn-sm"><i
                                                class="fas fa-clipboard-list"></i> Lihat Detail</button></div>
                                </div>
                                <div class="row">
                                    <div class="col"><a href="" id="" class="btn btn-block btn-outline-info btn-sm"><i
                                                class="fas fa-edit"></i> Ubah</a></div>
                                    <div class="col"><button type="button"
                                            class="btn btn-block btn-outline-info btn-sm"><i
                                                class="fa fa-minus-circle"></i>
                                            Hapus</button></div>
                                </div>
                                <div class="row">
                                    <div class="col"><a href="" id="" class="btn btn-block btn-outline-info btn-sm"><i
                                                class="fas fa-edit"></i> Ubah Anestasi</a></div>
                                    <div class="col"><button type="button"
                                            class="btn btn-block btn-outline-info btn-sm"><i
                                                class="fas fa-clipboard-list"></i> Lihat Anestesi</button></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <a href="" class="btn btn-block btn-outline-primary btn-sm">
                                            <i class="fas fa-clipboard-list"></i> Laporan Operasi
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <a href="" class="btn btn-block btn-outline-primary btn-sm">
                                            <i class="fas fa-clipboard-list"></i> Laporan Anestesi
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.col -->
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>No RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat</th>
                                        <th>Jumalah Kunjungan</th>
                                        <th>Kunjungan Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection