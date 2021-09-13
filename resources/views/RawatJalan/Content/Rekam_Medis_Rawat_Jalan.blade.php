@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800"><img src="{{asset('images/application.ico')}}" width="30px"> Rekam Medis
                Rawat Jalan</h4>
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="datetime" class="form-control" id="Tanggal" placeholder="Tanggal"
                                        value="{{$rawatjalan->tglmasuk}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-3"><button class="btn btn-outline-primary">Riwayat Medis Pasien</button></div>
                        <div class="col-3"><label class="col-form-label">NO RM : <span
                                    class="text-info">{{$rawatjalan->norm}} </span></label></div>
                        <div class="col-3"><label class="col-form-label">NAMA : <span
                                    class="text-info">{{$rawatjalan->Pasien->namapasien}} [
                                    {{$rawatjalan->Perusahaan->namaprsh}} ] </span></label></div>
                    </div>
                </div>
            </div>

            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3"></li>
                        <li class="nav-item">
                            <a class="nav-link active" id="rujukan-unit-tab" data-toggle="pill" href="#rujukan-unit"
                                role="tab" aria-controls="rujukan-unit" aria-selected="true">RUJUKAN & UNIT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="anamnesa-tab" data-toggle="pill" href="#anamnesa" role="tab"
                                aria-controls="anamnesa" aria-selected="false">ANAMNESA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pemeriksaan-gt-fisik-tab" data-toggle="pill"
                                href="#pemeriksaan-gt-fisik" role="tab" aria-controls="pemeriksaan-gt-fisik"
                                aria-selected="false">PEMERIKSAAN GT / FISIK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pemeriksaan-penunjang-diagnostik-tab" data-toggle="pill"
                                href="#pemeriksaan-penunjang-diagnostik" role="tab"
                                aria-controls="pemeriksaan-penunjang-diagnostik" aria-selected="false">PEMERIKSAAN
                                PENUNJANG / DIAGNOSTIK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tindakan-prosedur-diagnosa-tab" data-toggle="pill"
                                href="#tindakan-prosedur-diagnosa" role="tab" aria-controls="tindakan-prosedur-diagnosa"
                                aria-selected="false">TINDAKAN (PROSEDUR / DIAGNOSA)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="terapi-tab" data-toggle="pill" href="#terapi" role="tab"
                                aria-controls="terapi" aria-selected="false">TERAPI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="edukasi-tab" data-toggle="pill" href="#edukasi" role="tab"
                                aria-controls="edukasi" aria-selected="false">EDUKASI</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="rujukan-unit" role="tabpanel"
                            aria-labelledby="rujukan-unit-tab">
                            <div class="row">
                                <label>RUJUKAN</label>
                                <div class="col ml-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Tidak
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">RS</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">BP/RB</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">Pusk</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">Dokter</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">Bidan</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">Perawat</label>
                                            </div>
                                            <div class="form-group">
                                                <label for=""></label>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="idfaskes" name=""
                                                            placeholder="" value="" hidden>
                                                        <input type="text" class="form-control" id="namafaskes" name=""
                                                            placeholder="" value="">
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="button" class="btn btn-outline-info"
                                                            data-toggle="modal" data-target="#modal-fasilitaskesehatan">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Lain - lain
                                        </label>
                                        <label for=""></label>
                                        <div class="row ">
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="" name="" placeholder=""
                                                    value="" hidden>
                                                <input type="text" class="form-control" id="" name="" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label>UNIT</label>
                                <div class="col ml-5">
                                    <select class="form-control col-7" width="100%" name="poliklinik" id="poliklinik">
                                        @foreach ($poliklinik as $item)
                                        <option value="{{$item->kode}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                        function fasilitaskesehatan($idfaskes, $namafaskes) {
                            document.getElementById("idfaskes").value = $idfaskes;
                            document.getElementById("namafaskes").value = $namafaskes;
                            $(".close").click();
                        }
                        </script>

                        <div class="tab-pane fade" id="anamnesa" role="tabpanel" aria-labelledby="anamnesa-tab">
                            <!---ANAMNESA--->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="keluhanutama">Keluhan Utama</label>
                                        <textarea class="form-control" id="keluhanutama"
                                            placeholder="Keluhan Utama"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="keluhanutama">Keluhan Utama</label>
                                        <textarea class="form-control" id="keluhanutama"
                                            placeholder="Keluhan Utama"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!---ANAMNESA--->.
                        </div>
                        <div class="tab-pane fade" id="pemeriksaan-gt-fisik" role="tabpanel"
                            aria-labelledby="pemeriksaan-gt-fisik-tab">
                            PEMERIKSAAN GT / FISIK.
                        </div>
                        <div class="tab-pane fade" id="pemeriksaan-penunjang-diagnostik" role="tabpanel"
                            aria-labelledby="pemeriksaan-penunjang-diagnostik">
                            PEMERIKSAAN PENUNJANG / DIAGNOSTIK.
                        </div>
                        <div class="tab-pane fade" id="tindakan-prosedur-diagnosa" role="tabpanel"
                            aria-labelledby="tindakan-prosedur-diagnosa-tab">
                            TINDAKAN (PROSEDUR / DIAGNOSA).
                        </div>
                        <div class="tab-pane fade" id="terapi" role="tabpanel" aria-labelledby="terapi-tab">
                            TERAPI.
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">DataTable with default features</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dt-buttons btn-group flex-wrap">
                                                            <button class="btn btn-secondary buttons-csv buttons-html5"
                                                                tabindex="0" aria-controls="example1"
                                                                type="button"><span>Racikan</span></button>
                                                        </div>
                                                        <div class="dt-buttons btn-group flex-wrap ml-1">
                                                            <button class="btn btn-secondary buttons-csv buttons-html5"
                                                                tabindex="0" aria-controls="example1"
                                                                type="button"><span>Ubah Racikan</span></button>
                                                        </div>
                                                        <div class="dt-buttons btn-group flex-wrap ml-1">
                                                            <button class="btn btn-secondary buttons-csv buttons-html5"
                                                                tabindex="0" aria-controls="example1"
                                                                type="button"><span>Hapus</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example1"
                                                        class="table table-bordered table-striped dataTable dtr-inline"
                                                        role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting sorting_asc" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-sort="ascending"
                                                                    aria-label="Rendering engine: activate to sort column descending">
                                                                    Kode**</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-label="Browser: activate to sort column ascending">
                                                                    Farmakologi</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending">
                                                                    Signa(s)</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending">
                                                                    dd</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending">
                                                                    Lama hari</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending">
                                                                    Nomuro</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending">
                                                                    Dosis Khusus*</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending">
                                                                    Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0">Gecko
                                                                </td>
                                                                <td>Firefox 1.0</td>
                                                                <td>Win 98+ / OSX.2+</td>
                                                                <td>1.7</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="even">
                                                                <td class="dtr-control sorting_1" tabindex="0">Gecko
                                                                </td>
                                                                <td>Firefox 1.5</td>
                                                                <td>Win 98+ / OSX.2+</td>
                                                                <td>1.8</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0">Gecko
                                                                </td>
                                                                <td>Firefox 2.0</td>
                                                                <td>Win 98+ / OSX.2+</td>
                                                                <td>1.8</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="even">
                                                                <td class="dtr-control sorting_1" tabindex="0">Gecko
                                                                </td>
                                                                <td>Firefox 3.0</td>
                                                                <td>Win 2k+ / OSX.3+</td>
                                                                <td>1.9</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="odd">
                                                                <td class="sorting_1 dtr-control">Gecko</td>
                                                                <td>Camino 1.0</td>
                                                                <td>OSX.2+</td>
                                                                <td>1.8</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="even">
                                                                <td class="sorting_1 dtr-control">Gecko</td>
                                                                <td>Camino 1.5</td>
                                                                <td>OSX.3+</td>
                                                                <td>1.8</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="odd">
                                                                <td class="sorting_1 dtr-control">Gecko</td>
                                                                <td>Netscape 7.2</td>
                                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                                <td>1.7</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="even">
                                                                <td class="sorting_1 dtr-control">Gecko</td>
                                                                <td>Netscape Browser 8</td>
                                                                <td>Win 98SE+</td>
                                                                <td>1.7</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="odd">
                                                                <td class="sorting_1 dtr-control">Gecko</td>
                                                                <td>Netscape Navigator 9</td>
                                                                <td>Win 98+ / OSX.2+</td>
                                                                <td>1.8</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr class="even">
                                                                <td class="sorting_1 dtr-control">Gecko</td>
                                                                <td>Mozilla 1.0</td>
                                                                <td>Win 95+ / OSX.1+</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th rowspan="1" colspan="1">Rendering engine</th>
                                                                <th rowspan="1" colspan="1">Browser</th>
                                                                <th rowspan="1" colspan="1">Platform(s)</th>
                                                                <th rowspan="1" colspan="1">Engine version</th>
                                                                <th rowspan="1" colspan="1">CSS grade</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    < </div>
                                        <div class="col-sm-4">
                                            <div class="card border-success mb-3">
                                                <div class="card-header bg-transparent border-success">
                                                    <div class="row">
                                                        Tanggal
                                                    </div>
                                                    <div class="row">
                                                        Dr
                                                    </div>
                                                </div>
                                                <div class="card-body text-success">
                                                    <h5 class="card-title">Success card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and
                                                        make up the bulk of the card's content.</p>
                                                </div>
                                                <div class="card-footer bg-transparent border-success">
                                                    <div class="row">
                                                        Pro :
                                                    </div>
                                                    <div class="row">
                                                        No RM
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="edukasi" role="tabpanel" aria-labelledby="edukasi-tab">
                                EDUKASI.
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
                <div class="row">
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection