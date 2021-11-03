@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RekamMedis.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Rekam Medis Rawat Inap</h4>
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
                                {{csrf_field()}}
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
                                    <div class="col">
                                        <a href="/Data_Pendaftaran/cetakdatapendaftaran"
                                            class="btn btn-block btn-outline-secondary btn-sm">
                                            <i class="fa fa-print"></i> Cetak Data Pendaftaran
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <a href="/Data_Pendaftaran/cetakdatapendaftaran"
                                            class="btn btn-block btn-outline-primary btn-sm">
                                            <i class="fas fa-edit"></i> Diagnosa Pasien
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
                                        <th>No RM</th>
                                        <th>Pasien</th>
                                        <th>JK</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
                                        <th>Diagnosa Awal</th>
                                        <th>Diagnosa Akhir</th>
                                        <th>Tgl Masuk</th>
                                        <th>Tgl Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->norm}}</td>
                                        <td>{{$item->Pasien->namapasien}}</td>
                                        <td>{{$item->Pasien->jeniskelamin}}</td>
                                        <td>{{$item->Pasien->namapasien}}</td>
                                        <td>{{$item->Pasien->alamat}}</td>
                                        <td>{{$item->diagnosaawal}}</td>
                                        <td>{{$item->diagnosaakhir}}</td>
                                        <td>{{$item->tglmasuk}}</td>
                                        <td>{{$item->tglkeluar}}</td>
                                    </tr>
                                    @endforeach

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
<script>
function tombol($faktur_rawatjalan) {
    $("a#tombolubah").attr("href", "/Data_Pendaftaran/ubah" + $faktur_rawatjalan + "#UbahPendaftaranRawatJalan");
    $("a#tombollihat").attr("href", "/Data_Pendaftaran/lihat" + $faktur_rawatjalan + "#LihatPendaftaranRawatJalan");
    $("a#tombolhapus").attr("href", "/Data_Pendaftaran/hapus" + $faktur_rawatjalan);
    $("a#tombolrekammedisrj").attr("href", "/Rekam_Medis_Rawat_Jalan/index" + $faktur_rawatjalan);
    $("option#tombolsuratketerangansehat").attr("value", "/Data_Pendaftaran/suratketerangansehat" + $faktur_rawatjalan);
    $("option#tombolsuratketerangansakit").attr("value", "/Data_Pendaftaran/suratketerangansakit" + $faktur_rawatjalan);
}
</script>
@endsection