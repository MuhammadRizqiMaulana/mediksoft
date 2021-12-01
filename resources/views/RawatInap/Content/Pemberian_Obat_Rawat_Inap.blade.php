@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Pemberian Obat</h4>
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
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col"><label>Faktur Rawat Inap</label></div>
                            <div class="row">
                                <div class="col-10"><input type="text" class="form-control"
                                        value="@isset($selectrawatinap) {{$selectrawatinap->faktur_rawatinap}} @endisset"
                                        readonly>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                        data-target="#modal-rawatinap">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <!-- /.col -->
                            <div class="col"><label>Pemberian Obat</label></div>
                            <div class="col">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No Resep</th>
                                            <th>Kode Barang</th>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Perawat</th>
                                            <th>Rute</th>
                                            <th>keterangan</th>
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
                            <!-- /.col -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i>
                                            Simpan</button>
                                        <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i>
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script>
function rawatinap($faktur_rawatinap) {
    $(".close").click();
    window.location.href = "/Pemberian_Obat_Rawat_Inap/selectrawatinap" + $faktur_rawatinap;
}
</script>
@endsection