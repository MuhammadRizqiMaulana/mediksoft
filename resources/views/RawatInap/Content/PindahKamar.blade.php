@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Pindah Kamar</h4>
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


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form
                    action="@isset($selectrawatinap){{url('/PindahKamar/update'.$selectrawatinap->faktur_rawatinap)}}@endisset"
                    method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <!-- Baris ke 1-->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3 text-right"><label>No Pendaftaran</label></div>
                                        <div class="col-7"><input type="text" class="form-control"
                                                value="@isset($selectrawatinap) {{$selectrawatinap->faktur_rawatinap}} @endisset"
                                                readonly>
                                        </div>
                                        <div class="col-2 text-left">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-rawatinap">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3 text-right"><label>Nama Pasien</label></div>
                                        <div class="col-9"><input type="text" class="form-control"
                                                value="@isset($selectrawatinap) {{$selectrawatinap->Pasien->namapasien}} ({{$selectrawatinap->Pasien->norm}}) @endisset"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="col-3 text-left"><label>Kamar Lama</label></div>
                                <br>
                                <div class="row">
                                    <div class="col-3 text-right mb-3"><label>Tanggal Masuk</label></div>
                                    <div class="col-9">
                                        <div class="input-group date" name="tglmasuk" id="tglmasuk"
                                            data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#tglmasuk"
                                                value="@isset($selectrawatinap){{$selectrawatinap->tglmasuk}} @endisset"
                                                disabled />
                                            <div class="input-group-append" data-target="#tglmasuk"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3 text-right mb-3"><label>Kamar Lama</label></div>
                                    <div class="col-9"><input type="text" class="form-control"
                                            value="@isset($selectkamar){{$selectkamar->keterangan}} @endisset" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 text-right mb-3"><label>Ruangan / Kelas</label></div>
                                    <div class="col-5"><input type="text" class="form-control"
                                            value="@isset($selectkamar){{$selectkamar->Ruang->namaruang}} @endisset"
                                            readonly>
                                    </div>
                                    <div class="col-4"><input type="text" class="form-control"
                                            value="@isset($selectkamar){{$selectkamar->Kelas->nama}} @endisset"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 text-right mb-3"><label>Tarif</label></div>
                                    <div class="col-9"><input type="text" class="form-control"
                                            value="@isset($selectkamar)@rupiah($selectkamar->tarif) @endisset" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-3 text-left"><label>Kamar Baru</label></div>
                                <br>
                                <div class="row">
                                    <div class="col-3 text-right mb-3"><label>Tanggal Masuk</label></div>
                                    <div class="col-9">
                                        <input type="datetime-local" class="form-control" name="tglmasuk" value="" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3 text-right"><label>Ubah ke kamar</label></div>
                                    <div class="col-9">
                                        <select name="kodekamar" class="form-control">
                                            <option value="" hidden>Pilih Kamar</option>
                                            @foreach ($kamar as $item)
                                            <option value="{{$item->kodekamar}}">{{$item->kodekamar}} |
                                                {{$item->Ruang->namaruang}} | {{$item->Kelas->nama}} | {{$item->tarif}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 text-right mb-3"><label>Ruangan / Kelas</label></div>
                                    <div class="col-5"><input type="text" class="form-control" value="" readonly>
                                    </div>
                                    <div class="col-4"><input type="text" class="form-control" value="" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 text-right mb-3"><label>Tarif</label></div>
                                    <div class="col-9"><input type="number" class="form-control" value="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i>
                                    Simpan</button>
                                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
function rawatinap($faktur_rawatinap) {
    $(".close").click();
    window.location.href = "/PindahKamar/selectrawatinap" + $faktur_rawatinap;
}

function tombol($faktur_rawatinap) {
    //$("a#tombolubah").attr("href", "/Data_Pendaftaran/ubah"+ $faktur_rawatinap +"#UbahPendaftaranRawatJalan");
    $("a#tomboldetaildiagnosa").attr("href", "/Data_Pendaftaran_Rawat_Inap/detaildiagnosa" + $faktur_rawatinap);
    //$("a#tombolhapus").attr("href", "/Data_Pendaftaran/hapus"+ $faktur_rawatinap);
    //$("a#tombolrekammedisrj").attr("href", "/Rekam_Medis_Rawat_Jalan/index"+ $faktur_rawatinap);
    //$("option#tombolsuratketerangansehat").attr("value", "/Data_Pendaftaran/suratketerangansehat"+ $faktur_rawatinap);
    //$("option#tombolsuratketerangansakit").attr("value", "/Data_Pendaftaran/suratketerangansakit"+ $faktur_rawatinap);
}
</script>
@endsection