@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Pendataran Rawat Inap</h4>
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
        <li>{{ $error }}</li>
        @endforeach
    </ul>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <form action="{{url('/Pendaftaran_Rawat_Inap/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <h6>Rawat Jalan</h6>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="faktur_rawatjalan" name="faktur_rawatjalan"
                                    placeholder="Rawat Jalan" readonly>
                            </div>
                            <div class="col-1 text-right">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#modal-rawatjalan">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <h6>Nomor Rekam Medis</h6>
                                <input type="text" class="form-control" id="norm" name="norm"
                                    placeholder="Nomor Rekam Medis" readonly>
                            </div>
                            <div class="col-4">
                                <h6>Pasien</h6>
                                <input type="text" class="form-control" id="namapasien" name="namapasien"
                                    placeholder="Nama Pasien" readonly>
                            </div>
                            <div class="col-4">
                                <h6>Tanggal Masuk</h6>
                                <input type="text" class="form-control" id="tglmasuk" name="tglmasuk"
                                    placeholder="Tanggal Masuk" value="{{ date('Y-m-d H:i:s') }}" readonly>
                            </div>
                            <div class="col-1 align-self-end text-right">
                                <button type="button" onclick="tanggalsekarang();" class="btn btn-outline-info"
                                    readonly>
                                    <i class="fas fa-sync"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Kode Kamar</h6>
                                <input type="text" class="form-control" id="kodekamar" name="kodekamar"
                                    placeholder="Kode Kamar" readonly>
                            </div>
                            <div class="col">
                                <h6>Kamar</h6>
                                <input type="text" class="form-control" id="namakamar" name="namakamar"
                                    placeholder="Kamar" readonly>
                            </div>
                            <div class="col">
                                <h6>Kelas</h6>
                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas"
                                    readonly>
                            </div>
                            <div class="col-3">
                                <h6>Ruang</h6>
                                <input type="text" class="form-control" id="ruang" name="ruang" placeholder="Ruang"
                                    readonly>
                            </div>
                            <div class="col-1 text-right align-self-end">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#modal-kamar">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Macam Rawat</h6>
                                <select class="form-control" name="macamrawat">
                                    <option value="">Pilih Macam Rawat</option>
                                    @foreach ($macamrawat as $item)
                                    <option value="{{$item->kode}}">{{$item->macamrawat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Perusahaan / jaminan</h6>
                                <input type="text" id="idprsh" name="idprsh" hidden>
                                <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan"
                                    placeholder="Perusahaan / jaminan" readonly>
                            </div>
                            <div class="col-1 text-right align-self-end">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#modal-perusahaan">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Cara Masuk</h6>
                                <select class="form-control" name="kodemasuk">
                                    <option value="">Pilih Cara Masuk</option>
                                    @foreach ($jenismasuk as $item)
                                    <option value="{{$item->kodemasuk}}">{{$item->jenismasuk}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Dokter Penanggung Jawab</h6>
                                <input type="text" id="iddokter" name="iddokter" hidden>
                                <input type="text" class="form-control" id="namadokter" name="namadokter"
                                    placeholder="Dokter Penanggung Jawab" readonly>
                            </div>
                            <div class="col-1 text-right align-self-end">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#modal-dokter">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Diagnosa Awal</h6>
                                <input type="text" id="diagnosaawal" name="diagnosaawal" value="A00.1" hidden>
                                <input type="text" class="form-control" id="namadiagnosaawal" name="namadiagnosaawal"
                                    placeholder="Diagnosa Awal">
                            </div>
                            <div class="col-1 text-right align-self-end">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#modal-icd10">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Penanggung Jawab</h6>
                                <input type="text" class="form-control" name="penanggungjawab"
                                    placeholder="Penanggung Jawab">
                            </div>
                            <div class="col">
                                <h6>Hubungan Penanggung Jawab</h6>
                                <input type="text" class="form-control" name="hubungan_pj"
                                    placeholder="Hubungan Penanggung Jawab">
                            </div>
                            <div class="col">
                                <h6>Telp Penanggung Jawab</h6>
                                <input type="text" class="form-control" name="telp_pj"
                                    placeholder="Telp Penanggung Jawab">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Alamat Penanggung Jawab</h6>
                                <input type="text" class="form-control" name="alamat_pj"
                                    placeholder="Alamat Penanggung Jawab">
                            </div>
                            <div class="col-4">
                                <h6>Biaya Administrasi</h6>
                                <input type="text" class="form-control" name="administrasi"
                                    placeholder="Biaya Administrasi" value="{{$adm->tarif}}">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Simpan
                                </button>
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

<script type="text/javascript">
function tanggalsekarang() {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();
    var hour = d.getHours();
    var minute = d.getMinutes();
    var second = d.getSeconds();

    var output = d.getFullYear() + '-' +
        (month < 10 ? '0' : '') + month + '-' +
        (day < 10 ? '0' : '') + day + ' ' +
        (hour < 10 ? '0' : '') + hour + ':' +
        (minute < 10 ? '0' : '') + minute + ':' +
        (second < 10 ? '0' : '') + second;

    document.getElementById("tglmasuk").value = output;
}

function rawatjalan($faktur_rawatjalan, $norm, $namapasien, $tglmasuk) {
    document.getElementById("faktur_rawatjalan").value = $faktur_rawatjalan;
    document.getElementById("norm").value = $norm;
    document.getElementById("namapasien").value = $namapasien;
    document.getElementById("tglmasuk").value = $tglmasuk;
    $(".close").click();
}

function kamar($kodekamar, $keterangan, $kelas, $ruang) {
    document.getElementById("kodekamar").value = $kodekamar;
    document.getElementById("namakamar").value = $keterangan;
    document.getElementById("kelas").value = $kelas;
    document.getElementById("ruang").value = $ruang;
    $(".close").click();
}

function perusahaan($idprsh, $namaprsh) {
    document.getElementById("idprsh").value = $idprsh;
    document.getElementById("namaperusahaan").value = $namaprsh;
    $(".close").click();
}

function dokter($iddokter, $nama) {
    document.getElementById("iddokter").value = $iddokter;
    document.getElementById("namadokter").value = $nama;
    $(".close").click();
}

function icd10($kode, $nama) {
    document.getElementById("diagnosaawal").value = $kode;
    document.getElementById("namadiagnosaawal").value = $nama;
    $(".close").click();
}
</script>
@endsection