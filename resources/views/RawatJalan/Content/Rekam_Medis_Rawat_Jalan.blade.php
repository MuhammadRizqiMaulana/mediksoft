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
                                        value="{{$selectrawatjalan->tglmasuk}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-3"><button class="btn btn-outline-primary">Riwayat Medis Pasien</button></div>
                        <div class="col-3"><label class="col-form-label">NO RM : <span
                                    class="text-info">{{$selectrawatjalan->norm}} </span></label></div>
                        <div class="col-3"><label class="col-form-label">NAMA : <span
                                    class="text-info">{{$selectrawatjalan->Pasien->namapasien}} [
                                    {{$selectrawatjalan->Perusahaan->namaprsh}} ] </span></label></div>
                    </div>
                </div>
            </div>

            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3"></li>
                        <li class="nav-item">
                            <a class="nav-link active" id="rujukan-unit-tab" data-toggle="pill" href="#rujukan-unit"
                                role="tab" aria-controls="rujukan-unit" aria-selected="false">RUJUKAN & UNIT</a>
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
                <!-- card Body -->
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="rujukan-unit" role="tabpanel"
                            aria-labelledby="rujukan-unit-tab">
                            <!---RUJUKAN UNIT--->
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
                            <script type="text/javascript">
                            function fasilitaskesehatan($idfaskes, $namafaskes) {
                                document.getElementById("idfaskes").value = $idfaskes;
                                document.getElementById("namafaskes").value = $namafaskes;
                                $(".close").click();
                            }
                            </script>
                            <!---RUJUKAN UNIT--->
                        </div>
                        <div class="tab-pane fade" id="anamnesa" role="tabpanel" aria-labelledby="anamnesa-tab">
                            <!---ANAMNESA--->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="keluhanutama">Keluhan Utama</label>
                                        <textarea class="form-control" id="keluhanutama"
                                            placeholder="Keluhan Utama"></textarea>
                                        <label for="lokasi">Lokasi</label>
                                        <textarea class="form-control" id="lokasi" placeholder="Lokasi"></textarea>
                                        <label for="kualitas">Kualitas/Keparahan</label>
                                        <div class="card">
                                        </div>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="checkbox" name="Tekanan" value=" " />
                                            <label class="form-check-label">Tekanan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Terbakar" value=" " />
                                            <label class="form-check-label">Terbakar</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Tajam Tusukan"
                                                value=" " />
                                            <label class="form-check-label">Tajam Tusukan</label>
                                        </div>
                                        <div class="form-check  ">
                                            <input class="form-check-input" type="checkbox" name="Tajam Diiris"
                                                value=" " />
                                            <label class="form-check-label">Tajam Diiris</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Mencengkram"
                                                value=" " />
                                            <label class="form-check-label">Mencengkram</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Melilit" value=" " />
                                            <label class="form-check-label">Melilit</label>
                                        </div>
                                    </div>

                                    <label for="onset">Onset</label>
                                    <textarea class="form-control" id="onset" placeholder="Onset"></textarea>
                                    <label for="waktu">Waktu</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Intermiten" value=" " />
                                        <label class="form-check-label">Intermiten</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Terus menerus"
                                            value=" " />
                                        <label class="form-check-label">Terus Menerus</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="saat tertentu"
                                            value=" " />
                                        <label class="form-check-label">Saat Tertentu</label>
                                    </div>
                                    <label for="faktor">Faktor Memperinggan</label>
                                    <textarea class="form-control" id="faktor"
                                        placeholder="Faktor Memperinggan"></textarea>
                                    <label for="faktormemperberat">Faktor Memperberat</label>
                                    <textarea class="form-control" id="faktormemperberat"
                                        placeholder="Faktor Memperberat"></textarea>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gejalayangmeyertai">A. Gejala yang meyertai</label>
                                        <textarea class="form-control" id="gejalayangmeyertai"
                                            placeholder="Gejala yang meyertai"></textarea>
                                        <label for="riwayatpenyakit">B. Riwayat penyakit dahulu</label>
                                        <textarea class="form-control" id="riwayatpenyakit"
                                            placeholder="Riwayat penyakit dahulu"></textarea>
                                        <label for="riwayatpenyakitkeluarga">C. Riwayat penyakit keluarga</label>
                                        <textarea class="form-control" id="riwayatpenyakitkeluarga"
                                            placeholder="Riwayat penyakit Keluarga"></textarea>
                                        <label for="riwayatalergri">D. Riwayat Alergri</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Makanan" value=" " />
                                            <label class="form-check-label">Makanan</label>
                                        </div>
                                        <textarea class="form-control" id="riwayatalergi" placeholder=""></textarea>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Obat" value=" " />
                                            <label class="form-check-label">Obat-obatan</label>
                                        </div>
                                        <textarea class="form-control" id="riwayatalergi" placeholder=""></textarea>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Lingkungan"
                                                value=" " />
                                            <label class="form-check-label">Lingkungan</label>
                                        </div>
                                        <textarea class="form-control" id="riwayatalergi" placeholder=""></textarea>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Lain" value=" " />
                                            <label class="form-check-label">Lain-lain</label>
                                        </div>
                                        <textarea class="form-control" id="riwayatalergi" placeholder=""></textarea>
                                        <label for="riwayatpengobatan">E. Riwayat Pengobatan Penyakit</label>
                                        <textarea class="form-control" id="riwayatpengobatan"
                                            placeholder="Riwayat Pengobatan"></textarea>
                                        <label for="status">F. Status Merokok</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Akif" value=" " />
                                            <label class="form-check-label">Aktif</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Pasif" value=" " />
                                            <label class="form-check-label">Pasif</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Tidak Merokok"
                                                value=" " />
                                            <label class="form-check-label">Tidak Merokok</label>
                                        </div>
                                        <label for="riwayatobat">G. Riwayat Penggunaan Obat Psikotropik</label>
                                        <textarea class="form-control" id="riwayatobat"
                                            placeholder="Riwayat Penggunaan Obat Psikotropik"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!---ANAMNESA--->
                        </div>
                        <div class="tab-pane fade" id="pemeriksaan-gt-fisik" role="tabpanel"
                            aria-labelledby="pemeriksaan-gt-fisik-tab">
                            <!--- PEMERIKSAAN GT / FISIK. --->
                            <div class="row">
                                <!-- kolom ke 1 -->
                                <div class="col ml-2 mr-2">
                                    <!-- KESADARAN -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>KESADARAN</label>
                                                <div class="row border">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="kesadaran" id="Composmentis">
                                                            <label class="form-check-label" for="Composmentis">
                                                                Composmentis
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="kesadaran" id="Apatis">
                                                            <label class="form-check-label" for="Apatis">
                                                                Apatis
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="kesadaran" id="Somnolen">
                                                            <label class="form-check-label" for="Somnolen">
                                                                Somnolen
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="kesadaran" id="Sopor">
                                                            <label class="form-check-label" for="Sopor">
                                                                Sopor
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="kesadaran" id="Coma">
                                                            <label class="form-check-label" for="Coma">
                                                                Coma
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col ml-2">
                                            <div class="row">
                                                <div class="form-group row">
                                                    <label for="suhu" class="col-sm-4 col-form-label">SUHU</label>
                                                    <div class="col-sm-7">
                                                        <input type="number" class="form-control" id="suhu"
                                                            placeholder="0">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        &ordm;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group row">
                                                    <label for="saturasi"
                                                        class="col-sm-4 col-form-label">SATURASI</label>
                                                    <div class="col-sm-7">
                                                        <input type="number" class="form-control" id="saturasi"
                                                            placeholder="0">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        &#37;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PEMERIKSAAN FISIK -->
                                    <div class="row">
                                        <label>PEMERIKSAAN FISIK</label>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span>Tinggi Badan</span>
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-4">
                                                    cm
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span>Berat Badan</span>
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-4">
                                                    kg
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span>Lingkar Perut</span>
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-4">
                                                    cm
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span>IMT</span>
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-4">
                                                    m2
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- PEMERIKSAAN FISIK LAIN -->
                                    <div class="row">
                                        <label>PEMERIKSAAN FISIK LAIN</label>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span>TD Sistole</span>
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-5">
                                                    Mmhg
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span>TD Diastole</span>
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-5">
                                                    Mmhg
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span>Respiratory Rate</span>
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-5">
                                                    x/menit
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span>Heart Rate</span>
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" placeholder="0">
                                                </div>
                                                <div class="col-sm-5">
                                                    x/menit
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <span for="tandavital" class="col-sm-3 col-form-label">Ket Tanda Vital</span>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="tandavital"
                                                placeholder="Ket Tanda Vital">
                                        </div>
                                    </div>

                                    <!-- MATA -->
                                    <div class="row">
                                        <label>MATA</label>
                                    </div>
                                    <div class="border">
                                        <ul class="nav nav-tabs ml-2" id="custom-content-above-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="mata-kiri-tab" data-toggle="pill"
                                                    href="#mata-kiri" role="tab" aria-controls="mata-kiri"
                                                    aria-selected="true">MATA KIRI</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="mata-kanan-tab" data-toggle="pill"
                                                    href="#mata-kanan" role="tab" aria-controls="mata-kanan"
                                                    aria-selected="false">MATA KANAN</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content ml-2 mr-2" id="custom-content-above-tabContent">
                                            <div class="tab-pane fade show active" id="mata-kiri" role="tabpanel"
                                                aria-labelledby="mata-kiri-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <span>Konjungtiva</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_konjungtiva"
                                                                    id="matakiri_konjungtiva_anemis" value="1">
                                                                <label class="form-check-label"
                                                                    for="matakiri_konjungtiva_anemis">Anemis</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_konjungtiva"
                                                                    id="matakiri_konjungtiva_tidakanemis" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakiri_konjungtiva_tidakanemis">Tidak
                                                                    Anemis</label>
                                                            </div>
                                                        </div>

                                                        <span>Sklera</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_sklera" id="matakiri_sklera_ikterik"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="matakiri_sklera_ikterik">Ikterik</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_sklera"
                                                                    id="matakiri_sklera_tidakikterik" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakiri_sklera_tidakikterik">Tidak
                                                                    Ikterik</label>
                                                            </div>
                                                        </div>

                                                        <span>Pupil</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_pupil" id="matakiri_pupil_isokor"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="matakiri_pupil_isokor">Isokor</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_pupil" id="matakiri_pupil_anisokor"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="matakiri_pupil_anisokor">Anisokor</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col">
                                                        <span>Refleks Cahaya</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_reflekscahaya"
                                                                    id="matakiri_reflekscahaya_positif" value="1">
                                                                <label class="form-check-label"
                                                                    for="matakiri_reflekscahaya_positif">Positif</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_reflekscahaya"
                                                                    id="matakiri_reflekscahaya_negatif" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakiri_reflekscahaya_negatif">Negatif</label>
                                                            </div>
                                                        </div>

                                                        <span>Palpebra</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_palpebra"
                                                                    id="matakiri_palpebra_normal" value="1">
                                                                <label class="form-check-label"
                                                                    for="matakiri_palpebra_normal">Normal</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakiri_palpebra"
                                                                    id="matakiri_palpebra_tidaknormal" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakiri_palpebra_tidaknormal">Tidak
                                                                    Normal</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="mata-kanan" role="tabpanel"
                                                aria-labelledby="mata-kanan-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <span>Konjungtiva</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_konjungtiva"
                                                                    id="matakanan_konjungtiva_anemis" value="1">
                                                                <label class="form-check-label"
                                                                    for="matakanan_konjungtiva_anemis">Anemis</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_konjungtiva"
                                                                    id="matakanan_konjungtiva_tidakanemis" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakanan_konjungtiva_tidakanemis">Tidak
                                                                    Anemis</label>
                                                            </div>
                                                        </div>

                                                        <span>Sklera</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_sklera"
                                                                    id="matakanan_sklera_ikterik" value="1">
                                                                <label class="form-check-label"
                                                                    for="matakanan_sklera_ikterik">Ikterik</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_sklera"
                                                                    id="matakanan_sklera_tidakikterik" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakanan_sklera_tidakikterik">Tidak
                                                                    Ikterik</label>
                                                            </div>
                                                        </div>

                                                        <span>Pupil</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_pupil" id="matakanan_pupil_isokor"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="matakanan_pupil_isokor">Isokor</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_pupil" id="matakanan_pupil_anisokor"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="matakanan_pupil_anisokor">Anisokor</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col">
                                                        <span>Refleks Cahaya</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_reflekscahaya"
                                                                    id="matakanan_reflekscahaya_positif" value="1">
                                                                <label class="form-check-label"
                                                                    for="matakanan_reflekscahaya_positif">Positif</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_reflekscahaya"
                                                                    id="matakanan_reflekscahaya_negatif" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakanan_reflekscahaya_negatif">Negatif</label>
                                                            </div>
                                                        </div>

                                                        <span>Palpebra</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_palpebra"
                                                                    id="matakanan_palpebra_normal" value="1">
                                                                <label class="form-check-label"
                                                                    for="matakanan_palpebra_normal">Normal</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="matakanan_palpebra"
                                                                    id="matakanan_palpebra_tidaknormal" value="0">
                                                                <label class="form-check-label"
                                                                    for="matakanan_palpebra_tidaknormal">Tidak
                                                                    Normal</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <!-- HIDUNG -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>HIDUNG</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content ml-2 mr-2">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <span>Septum Nasi</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_septumnasi"
                                                                    id="hidung_septumnasi_normal" value="1">
                                                                <label class="form-check-label"
                                                                    for="hidung_septumnasi_normal">Normal</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_septumnasi"
                                                                    id="hidung_septumnasi_tidaknormal" value="0">
                                                                <label class="form-check-label"
                                                                    for="hidung_septumnasi_tidaknormal">Tidak
                                                                    Normal</label>
                                                            </div>
                                                        </div>

                                                        <span>Konka</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_konka" id="hidung_konka_normal"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="hidung_konka_hiperemis">Hiperemis</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_konka" id="hidung_konka_tidaknormal"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="hidung_konka_tidakhiperemis">Tidak
                                                                    Hiperemis</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-5">
                                                        <span>Massa </span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_massa" id="hidung_massa_positif"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="hidung_massa_positif">Positif</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_massa" id="hidung_massa_negatif"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="hidung_massa_negatif">Negatif</label>
                                                            </div>
                                                        </div>

                                                        <span>Discharge</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_discharge"
                                                                    id="hidung_discharge_positif" value="1">
                                                                <label class="form-check-label"
                                                                    for="hidung_discharge_positif">Positif</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="hidung_discharge" id="hidung_massa_negatif"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="hidung_discharge_negatif">Negatif</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- TELINGA -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>TELINGA</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="border">
                                                <ul class="nav nav-tabs ml-2" id="custom-content-above-tab"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="telinga-kiri-tab"
                                                            data-toggle="pill" href="#telinga-kiri" role="tab"
                                                            aria-controls="telinga-kiri" aria-selected="true">MATA
                                                            KIRI</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="telinga-kanan-tab" data-toggle="pill"
                                                            href="#telinga-kanan" role="tab"
                                                            aria-controls="telinga-kanan" aria-selected="false">MATA
                                                            KANAN</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content ml-2 mr-2" id="custom-content-above-tabContent">
                                                    <div class="tab-pane fade show active" id="telinga-kiri"
                                                        role="tabpanel" aria-labelledby="telinga-kiri-tab">
                                                        <div class="row">
                                                            <div class="col">
                                                                <span>Kanalis Eksterna</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakiri_kanaliseksterna"
                                                                            id="telingakiri_kanaliseksterna_normal"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="telingakiri_kanaliseksterna_normal">Normal</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakiri_kanaliseksterna"
                                                                            id="telingakiri_kanaliseksterna_tidaknormal"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="telingakiri_kanaliseksterna_tidaknormal">Tidak
                                                                            Normal</label>
                                                                    </div>
                                                                </div>

                                                                <span>Membran Timpani</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakiri_membrantimpani"
                                                                            id="telingakiri_membrantimpani_normal"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="telingakiri_membrantimpani_normal">Normal</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakiri_membrantimpani"
                                                                            id="telingakiri_membrantimpani_tidaknormal"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="telingakiri_membrantimpani_tidaknormal">Tidak
                                                                            Normal</label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col">
                                                                <span>Serumen</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakiri_serumen"
                                                                            id="telingakiri_serumen_positif" value="1">
                                                                        <label class="form-check-label"
                                                                            for="telingakiri_serumen_positif">Positif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakiri_serumen"
                                                                            id="telingakiri_serumen_negatif" value="0">
                                                                        <label class="form-check-label"
                                                                            for="telingakiri_serumen_negatif">Negatif</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="telinga-kanan" role="tabpanel"
                                                        aria-labelledby="telinga-kanan-tab">
                                                        <div class="row">
                                                            <div class="col">
                                                                <span>Kanalis Eksterna</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakanan_kanaliseksterna"
                                                                            id="telingakanan_kanaliseksterna_normal"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="telingakanan_kanaliseksterna_normal">Normal</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakanan_kanaliseksterna"
                                                                            id="telingakanan_kanaliseksterna_tidaknormal"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="telingakanan_kanaliseksterna_tidaknormal">Tidak
                                                                            Normal</label>
                                                                    </div>
                                                                </div>

                                                                <span>Membran Timpani</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakanan_membrantimpani"
                                                                            id="telingakanan_membrantimpani_normal"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="telingakanan_membrantimpani_normal">Normal</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakanan_membrantimpani"
                                                                            id="telingakanan_membrantimpani_tidaknormal"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="telingakanan_membrantimpani_tidaknormal">Tidak
                                                                            Normal</label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col">
                                                                <span>Serumen</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakanan_serumen"
                                                                            id="telingakanan_serumen_positif" value="1">
                                                                        <label class="form-check-label"
                                                                            for="telingakanan_serumen_positif">Positif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="telingakanan_serumen"
                                                                            id="telingakanan_serumen_negatif" value="0">
                                                                        <label class="form-check-label"
                                                                            for="telingakanan_serumen_negatif">Negatif</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                        </div>

                                    </div>

                                </div>

                                <!-- kolom ke 2 -->
                                <div class="col ml-2 mr-2">
                                    <!-- GCS -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>GCS</label>
                                                <div class="tab-content ml-2 mr-2">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <span>EYES</span>
                                                            <div class="form-group border">
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gsc_eyes" id="gsc_eyes_tidakada"
                                                                        value="1">
                                                                    <label class="form-check-label"
                                                                        for="gsc_eyes_tidakada">Tidak Ada</label>
                                                                </div>
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gsc_eyes" id="gsc_eyes_padanyeri"
                                                                        value="0">
                                                                    <label class="form-check-label"
                                                                        for="gsc_eyes_padanyeri">Pada Nyeri</label>
                                                                </div>
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gsc_eyes" id="gsc_eyes_padaperintah"
                                                                        value="1">
                                                                    <label class="form-check-label"
                                                                        for="gsc_eyes_padaperintah">Pada
                                                                        Perintah</label>
                                                                </div>
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gsc_eyes" id="gsc_eyes_spontan" value="1">
                                                                    <label class="form-check-label"
                                                                        for="gsc_eyes_spontan">Spontan</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-5">
                                                            <span>MOTORIK</span>
                                                            <div class="form-group border">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-check ml-2 mr-1">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_motorik"
                                                                                id="gsc_motorik_tanparespon" value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_motorik_tanparespon">Tanpa
                                                                                Respon</label>
                                                                        </div>
                                                                        <div class="form-check ml-2 mr-1">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_motorik"
                                                                                id="gsc_motorik_ekstensi" value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_motorik_ekstensi">Ekstensi</label>
                                                                        </div>
                                                                        <div class="form-check ml-2 mr-1">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_motorik"
                                                                                id="gsc_motorik_fleksibnormal"
                                                                                value="0">
                                                                            <label class="form-check-label"
                                                                                for="gsc_motorik_fleksibnormal">Fleksi
                                                                                Bnormal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-check ml-2 mr-1">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_motorik"
                                                                                id="gsc_motorik_fleksimenarik"
                                                                                value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_motorik_fleksimenarik">Fleksi
                                                                                Menarik</label>
                                                                        </div>
                                                                        <div class="form-check ml-2 mr-1">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_motorik"
                                                                                id="gsc_motorik_padarangsangan"
                                                                                value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_motorik_padarangsangan">Pada
                                                                                Rangsangan</label>
                                                                        </div>
                                                                        <div class="form-check ml-2 mr-1">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_motorik"
                                                                                id="gsc_motorik_menurutperintah"
                                                                                value="0">
                                                                            <label class="form-check-label"
                                                                                for="gsc_motorik_menurutperintah">Menurut
                                                                                Perintah</label>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <span>VERBAL</span>
                                                            <div class="form-group border">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-check ml-2 mr-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_verbal"
                                                                                id="gsc_verbal_tanparespon" value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_verbal_tanparespon">Tanpa
                                                                                Respon</label>
                                                                        </div>
                                                                        <div class="form-check ml-2 mr-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_verbal"
                                                                                id="gsc_verbal_tanpaarti" value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_verbal_tanpaarti">Tanpa
                                                                                Arti</label>
                                                                        </div>
                                                                        <div class="form-check ml-2 mr-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_verbal"
                                                                                id="gsc_verbal_bicarakacau" value="0">
                                                                            <label class="form-check-label"
                                                                                for="gsc_verbal_bicarakacau">Bicara
                                                                                Kacau</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-check ml-2 mr-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_verbal"
                                                                                id="gsc_verbal_orientasiburuk"
                                                                                value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_verbal_orientasiburuk">Orientasi
                                                                                Buruk</label>
                                                                        </div>
                                                                        <div class="form-check ml-2 mr-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gsc_verbal"
                                                                                id="gsc_verbal_orientasibaik" value="1">
                                                                            <label class="form-check-label"
                                                                                for="gsc_verbal_orientasibaik">Orientasi
                                                                                Baik</label>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- OROFARING -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>OROFARING</label>
                                                <div class="tab-content ml-2 mr-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span>Tonsil</span>
                                                            <div class="form-group border">
                                                                <div class="form-check form-check-inline ml-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_tonsil" id="orofaring_tonsil_t0"
                                                                        value="0">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_tonsil_t0">T0 - T0</label>
                                                                </div>
                                                                <div class="form-check form-check-inline ml-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_tonsil" id="orofaring_tonsil_t1"
                                                                        value="1">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_tonsil_t1">T1 - T1</label>
                                                                </div>
                                                                <div class="form-check form-check-inline ml-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_tonsil" id="orofaring_tonsil_t2"
                                                                        value="2">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_tonsil_t2">T2 - T2</label>
                                                                </div>
                                                                <div class="form-check form-check-inline ml-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_tonsil" id="orofaring_tonsil_t3"
                                                                        value="3">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_tonsil_t3">T3 - T3</label>
                                                                </div>
                                                                <div class="form-check form-check-inline ml-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_tonsil" id="orofaring_tonsil_t4"
                                                                        value="4">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_tonsil_t4">T4 - T4</label>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-4">
                                                            <span>Mukosa</span>
                                                            <div class="form-group border">
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_mukosa"
                                                                        id="orofaring_mukosa_hiperemis" value="1">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_mukosa_hiperemis">Hiperemis</label>
                                                                </div>
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_mukosa"
                                                                        id="orofaring_mukosa_tidakhiperemis" value="1">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_mukosa_tidakhiperemis">Tidak
                                                                        Hiperemis</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <span>Discharge</span>
                                                            <div class="form-group border">
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_discharge"
                                                                        id="orofaring_discharge_positif" value="1">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_discharge_positif">Positif</label>
                                                                </div>
                                                                <div class="form-check ml-2 mr-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="orofaring_discharge"
                                                                        id="orofaring_discharge_negatif" value="1">
                                                                    <label class="form-check-label"
                                                                        for="orofaring_discharge_negatif">Negatif</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- LEHER -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>LEHER</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content ml-2 mr-2">
                                                <div class="row">
                                                    <div class="col">
                                                        <span>KGB</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="leher_kgb" id="leher_kgb_membesar" value="1">
                                                                <label class="form-check-label"
                                                                    for="leher_kgb_membesar">Membesar</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="leher_kgb" id="leher_kgb_tidakmembesar"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="leher_kgb_tidakmembesar">Tidak Membesar</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <span>Kelenjar Tyroid</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="leher_kelenjartyroid"
                                                                    id="leher_kelenjartyroid_membesar" value="1">
                                                                <label class="form-check-label"
                                                                    for="leher_kelenjartyroid_membesar">Membesar</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="leher_kelenjartyroid"
                                                                    id="leher_kelenjartyroid_tidakmembesar" value="0">
                                                                <label class="form-check-label"
                                                                    for="leher_kelenjartyroid_tidakmembesar">Tidak
                                                                    Membesar</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- PARU -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>PARU</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="border">
                                                <ul class="nav nav-tabs ml-2" id="custom-content-above-tab"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="paru-kiri-tab" data-toggle="pill"
                                                            href="#paru-kiri" role="tab" aria-controls="paru-kiri"
                                                            aria-selected="true">PARU KIRI</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="paru-kanan-tab" data-toggle="pill"
                                                            href="#paru-kanan" role="tab" aria-controls="paru-kanan"
                                                            aria-selected="false">PARU KANAN</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content ml-2 mr-2" id="custom-content-above-tabContent">
                                                    <div class="tab-pane fade show active" id="paru-kiri"
                                                        role="tabpanel" aria-labelledby="paru-kiri-tab">
                                                        <div class="row">
                                                            <div class="col">
                                                                <span>Suara Dasar Vesikuler</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_suaradasarvesikuler"
                                                                            id="parukiri_suaradasarvesikuler_ada"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_suaradasarvesikuler_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_suaradasarvesikuler"
                                                                            id="parukiri_suaradasarvesikuler_tidakada"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_suaradasarvesikuler_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>

                                                                <span>Ronkhi Basah Kasar</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_ronkhibasahkasar"
                                                                            id="parukiri_ronkhibasahkasar_ada"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_ronkhibasahkasar_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_ronkhibasahkasar"
                                                                            id="parukiri_ronkhibasahkasar_tidakada"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_ronkhibasahkasar_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col">
                                                                <span>Ronkhi Basah Halus</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_ronkhibasahhalus"
                                                                            id="parukiri_ronkhibasahhalus_ada"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_ronkhibasahhalus_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_ronkhibasahhalus"
                                                                            id="parukiri_ronkhibasahhalus_tidakada"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_ronkhibasahhalus_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>

                                                                <span>Wheezing</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_wheezing"
                                                                            id="parukiri_wheezing_ada" value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_wheezing_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukiri_wheezing"
                                                                            id="parukiri_wheezing_tidakada" value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukiri_wheezing_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="paru-kanan" role="tabpanel"
                                                        aria-labelledby="paru-kanan-tab">
                                                        <div class="row">
                                                            <div class="col">
                                                                <span>Suara Dasar Vesikuler</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_suaradasarvesikuler"
                                                                            id="parukanan_suaradasarvesikuler_ada"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_suaradasarvesikuler_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_suaradasarvesikuler"
                                                                            id="parukanan_suaradasarvesikuler_tidakada"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_suaradasarvesikuler_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>

                                                                <span>Ronkhi Basah Kasar</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_ronkhibasahkasar"
                                                                            id="parukanan_ronkhibasahkasar_ada"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_ronkhibasahkasar_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_ronkhibasahkasar"
                                                                            id="parukanan_ronkhibasahkasar_tidakada"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_ronkhibasahkasar_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col">
                                                                <span>Ronkhi Basah Halus</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_ronkhibasahhalus"
                                                                            id="parukanan_ronkhibasahhalus_ada"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_ronkhibasahhalus_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_ronkhibasahhalus"
                                                                            id="parukanan_ronkhibasahhalus_tidakada"
                                                                            value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_ronkhibasahhalus_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>

                                                                <span>Wheezing</span>
                                                                <div class="form-group border">
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_wheezing"
                                                                            id="parukanan_wheezing_ada" value="1">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_wheezing_ada">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="parukanan_wheezing"
                                                                            id="parukanan_wheezing_tidakada" value="0">
                                                                        <label class="form-check-label"
                                                                            for="parukanan_wheezing_tidakada">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                        </div>

                                    </div>

                                    <!-- JANTUNG -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>JANTUNG</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content ml-2 mr-2">
                                                <div class="row">
                                                    <div class="col">
                                                        <span>BJ1 - BJ2</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_bj1bj2" id="jantung_bj1bj2_ada"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="jantung_bj1bj2_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_bj1bj2" id="jantung_bj1bj2_tidakada"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="jantung_bj1bj2_tidakada">Tidak Ada</label>
                                                            </div>
                                                        </div>

                                                        <span>Regurguasi</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_regurguasi"
                                                                    id="jantung_regurguasi_ada" value="1">
                                                                <label class="form-check-label"
                                                                    for="jantung_regurguasi_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_regurguasi"
                                                                    id="jantung_regurguasi_tidakada" value="0">
                                                                <label class="form-check-label"
                                                                    for="jantung_regurguasi_tidakada">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <span>Murmur </span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_murmur" id="jantung_murmur_ada"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="jantung_murmur_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_murmur" id="jantung_murmur_tidakada"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="jantung_murmur_tidakada">Tidak Ada</label>
                                                            </div>
                                                        </div>

                                                        <span>Aritmia</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_aritmia" id="jantung_aritmia_ada"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="jantung_aritmia_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jantung_aritmia" id="jantung_aritmia_tidakada"
                                                                    value="0">
                                                                <label class="form-check-label"
                                                                    for="jantung_aritmia_tidakada">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- ABDOMEN -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>ABDOMEN</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content ml-2 mr-2">
                                                <div class="row">
                                                    <div class="col">
                                                        <span>Bising Usus</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="abdomen_bisingusus"
                                                                    id="abdomen_bisingusus_ada" value="1">
                                                                <label class="form-check-label"
                                                                    for="abdomen_bisingusus_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="abdomen_bisingusus"
                                                                    id="abdomen_bisingusus_tidakada" value="0">
                                                                <label class="form-check-label"
                                                                    for="abdomen_bisingusus_tidakada">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <span>Nyeri Tekan</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="abdomen_nyeritekan"
                                                                    id="abdomen_nyeritekan_ada" value="1">
                                                                <label class="form-check-label"
                                                                    for="abdomen_nyeritekan_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="abdomen_nyeritekan"
                                                                    id="abdomen_nyeritekan_tidakada" value="0">
                                                                <label class="form-check-label"
                                                                    for="abdomen_nyeritekan_tidakada">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- EKTEREMITAS ATAS -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>EKTEREMITAS ATAS</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content ml-2 mr-2">
                                                <div class="row">
                                                    <div class="col">
                                                        <span>Edema</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_edema"
                                                                    id="ekteremitasatas_edema_ada" value="1">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_edema_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_edema"
                                                                    id="ekteremitasatas_edema_tidakada" value="0">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_edema_tidakada">Tidak
                                                                    Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <span>Parese</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_parese"
                                                                    id="ekteremitasatas_parese_ada" value="1">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_parese_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_parese"
                                                                    id="ekteremitasatas_parese_tidakada" value="0">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_parese_tidakada">Tidak
                                                                    Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <span>Kekuatan</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_kekuatan"
                                                                    id="ekteremitasatas_kekuatan_1" value="1">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_kekuatan_1">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_kekuatan"
                                                                    id="ekteremitasatas_kekuatan_2" value="2">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_kekuatan_2">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_kekuatan"
                                                                    id="ekteremitasatas_kekuatan_3" value="3">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_kekuatan_3">3</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_kekuatan"
                                                                    id="ekteremitasatas_kekuatan_4" value="4">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_kekuatan_4">4</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasatas_kekuatan"
                                                                    id="ekteremitasatas_kekuatan_5" value="5">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasatas_kekuatan_5">5</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- EKTEREMITAS BAWAH -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>EKTEREMITAS BAWAH</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content ml-2 mr-2">
                                                <div class="row">
                                                    <div class="col">
                                                        <span>Edema</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_edema"
                                                                    id="ekteremitasbawah_edema_ada" value="1">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_edema_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_edema"
                                                                    id="ekteremitasbawah_edema_tidakada" value="0">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_edema_tidakada">Tidak
                                                                    Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <span>Parese</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_parese"
                                                                    id="ekteremitasbawah_parese_ada" value="1">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_parese_ada">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_parese"
                                                                    id="ekteremitasbawah_parese_tidakada" value="0">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_parese_tidakada">Tidak
                                                                    Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <span>Kekuatan</span>
                                                        <div class="form-group border">
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_kekuatan"
                                                                    id="ekteremitasbawah_kekuatan_1" value="1">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_kekuatan_1">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_kekuatan"
                                                                    id="ekteremitasbawah_kekuatan_2" value="2">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_kekuatan_2">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_kekuatan"
                                                                    id="ekteremitasbawah_kekuatan_3" value="3">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_kekuatan_3">3</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_kekuatan"
                                                                    id="ekteremitasbawah_kekuatan_4" value="4">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_kekuatan_4">4</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ekteremitasbawah_kekuatan"
                                                                    id="ekteremitasbawah_kekuatan_5" value="5">
                                                                <label class="form-check-label"
                                                                    for="ekteremitasbawah_kekuatan_5">5</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!--- PEMERIKSAAN GT / FISIK. --->
                        </div>
                        <div class="tab-pane fade" id="pemeriksaan-penunjang-diagnostik" role="tabpanel"
                            aria-labelledby="pemeriksaan-penunjang-diagnostik">
                            PEMERIKSAAN PENUNJANG / DIAGNOSTIK.
                            <div class="form-group">
                                <h3>Pemeriksaan Laboratorium</h3>
                                <div class="row">
                                    <div class="col-2">
                                        <label>Hemoglobin</label>
                                        <input type="text" class="form-control" name="Hemoglobin"
                                            placeholder="Hemoglobin">
                                    </div>
                                    <div class="col-2">
                                        <label>Leukosit</label>
                                        <input type="text" class="form-control" name="Leukosit" placeholder="Leukosit">
                                    </div>
                                    <div class="col-2">
                                        <label>Trombosit</label>
                                        <input type="text" class="form-control" name="Trombosit"
                                            placeholder="Trombosit">
                                    </div>
                                    <div class="col-2">
                                        <label>Hematokrit</label>
                                        <input type="text" class="form-control" name="Hematokrit"
                                            placeholder="Hematokrit">
                                    </div>
                                    <div class="col-2">
                                        <label>Golongan Darah</label>
                                        <input type="text" class="form-control" name="Golongan Darah"
                                            placeholder="Golongan Darah">
                                    </div>
                                    <div class="col-2">
                                        <label>Widal</label>
                                        <input type="text" class="form-control" name="Widal" placeholder="Widal">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <h3>Pemeriksaan Kimia</h3>

                                <div class="row">
                                    <div class="col-2">
                                        <label>Gula darah sewaktu</label>
                                        <input type="text" class="form-control" name="Gula darah sewaktu"
                                            placeholder="Gula darah sewaktu">
                                    </div>
                                    <div class="col-2">
                                        <label>Asam Urat</label>
                                        <input type="text" class="form-control" name="asamurat" placeholder="asamurat">
                                    </div>
                                    <div class="col-2">
                                        <label>Kolesterol</label>
                                        <input type="text" class="form-control" name="Kolesterol"
                                            placeholder="Kolesterol">
                                    </div>
                                    <div class="col-2">
                                        <label>TRigliserida</label>
                                        <input type="text" class="form-control" name="TRigliserida"
                                            placeholder="TRigliserida">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Pemeriksaan Rapid Test</label>
                                        <input type="text" class="form-control" name="pemeriksaanrapidtest"
                                            placeholder="pemeriksaanrapidtest">
                                    </div>
                                    <div class="col-3">
                                        <label>Pemeriksaan HIV</label>
                                        <input type="text" class="form-control" name="pemeriksaanhiv"
                                            placeholder="pemeriksaanhiv">
                                    </div>
                                    <div class="col-3">
                                        <label>Pemeriksaan HbsAg</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Positif" value=" " />
                                            <label class="form-check-label">Positif</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Negatif" value=" " />
                                            <label class="form-check-label">Negatif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-7">
                                        <label>Pemeriksaan EKG</label>
                                        <input type="text" class="form-control" name="pemeriksaanekg"
                                            placeholder="pemeriksaanekg">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-7">
                                        <label>Pemeriksaan RONTGEN</label>
                                        <input type="text" class="form-control" name="pemeriksaanrontgen"
                                            placeholder="pemeriksaanrontgen">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-7">
                                        <label>Pemeriksaan USG</label>
                                        <input type="text" class="form-control" name="pemeriksaanusg"
                                            placeholder="pemeriksaanusg">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-7">
                                        <label>Hasil Pemeriksaan Penunjang Lain</label>
                                        <input type="text" class="form-control" name="hasilpenunjanglain"
                                            placeholder="hasilpenunjanglain">
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="tab-pane fade" id="tindakan-prosedur-diagnosa" role="tabpanel"
                            aria-labelledby="tindakan-prosedur-diagnosa-tab">
                            <label>Diagnosa</label>

                            <div class="row">
                                <div class="col">
                                    <label>Diagnosa</label>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Kode </th>
                                                <th>Diagnosa</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="col">
                                    <label>Tindakan</label>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Tindakan Lokal </th>
                                                <th colspan="2">ICD IX</th>
                                            </tr>
                                            <tr>
                                                <th align=center>Kode</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="terapi" role="tabpanel" aria-labelledby="terapi-tab">
                            <!--- TERAPI. --->
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">FARMAKOLOGI</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dt-buttons btn-group flex-wrap">
                                                            <button class="btn btn-secondary buttons-csv buttons-html5"
                                                                tabindex="0" aria-controls="example1"
                                                                type="button"><span>Racikan</span>
                                                            </button>
                                                        </div>
                                                        <div class="dt-buttons btn-group flex-wrap ml-1">
                                                            <button class="btn btn-secondary buttons-csv buttons-html5"
                                                                tabindex="0" aria-controls="example1"
                                                                type="button"><span>Ubah Racikan</span>
                                                            </button>
                                                        </div>
                                                        <div class="dt-buttons btn-group flex-wrap ml-1">
                                                            <button class="btn btn-secondary buttons-csv buttons-html5"
                                                                tabindex="0" aria-controls="example1"
                                                                type="button"><span>Hapus</span>
                                                            </button>
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
                                                                <th>Kode**</th>
                                                                <th>Farmakologi</th>
                                                                <th>Signa(s)</th>
                                                                <th>dd</th>
                                                                <th>Lama hari</th>
                                                                <th>Nomuro</th>
                                                                <th>Dosis Khusus*</th>
                                                                <th>Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="card border-success mb-3">
                                        <div class="card-header bg-transparent border-success">
                                            <div class="row">
                                                <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime" class="form-control" id="Tanggal"
                                                        placeholder="Tanggal" value="{{$selectrawatjalan->tglmasuk}}">
                                                </div>
                                                <div class="row">

                                                </div>
                                            </div>
                                            <div class="card-body text-success">
                                                <h5 class="card-title"></h5>
                                            </div>
                                            <div class="col-3"><label class="col-form-label">NO RM : <span
                                                        class="text-info">{{$selectrawatjalan->norm}} </span></label>
                                            </div>
                                            <div class="col-3"><label class="col-form-label">NAMA : <span
                                                        class="text-info">{{$selectrawatjalan->Pasien->namapasien}} [
                                                        {{$selectrawatjalan->Perusahaan->namaprsh}} ] </span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--- TERAPI. --->
                            </div>
                            <div class="tab-pane fade" id="edukasi" role="tabpanel" aria-labelledby="edukasi-tab">
                                <h3>EDUKASI.</h3>
                                <input type="checkbox" id="vehicle3" name="vehicle3" value="vehicle3">
                                <label for="vehicle3"> Istirahat Cukup</label><br>
                                <input type="checkbox" id=" vehicle3" name=" vehicle3" value="vehicle3 ">
                                <label for="vehicle3 "> Menghindari Stres</label><br>
                                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                <label for="vehicle3"> Pola Makan Yang teratur dan Sehat</label><br>
                                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                <label for="vehicle3"> Diet rendah minyak</label><br>
                                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                <label for="vehicle3">Diet rendah purin</label><br>
                                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                <label for="vehicle3"> Diet rendah gula</label><br>
                                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                <label for="vehicle3"> Olahraga</label><br>

                                <table border="1" class="table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>Edukasi Tambbahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>

                                            </td>
                                        </tr>

                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- card Footer -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-5">
                                        <label for="karyawan">Nama Asisten Dokter</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" id="karyawan" name="kodekaryawan"
                                            placeholder="Karyawan" hidden>
                                        <input type="text" class="form-control" id="namakaryawan" name="namakaryawan"
                                            placeholder="Nama Asisten Dokter">
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                            data-target="#modal-karyawan">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>

                                    @if ($errors->has('kodekaryawan'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodekaryawan') }}</p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="dokter">Nama Dokter</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="dokter" name="kodedokter"
                                            placeholder="Dokter" hidden>
                                        <input type="text" class="form-control" id="namadokter" name="namadokter"
                                            placeholder="Nama Dokter">
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                            data-target="#modal-dokter">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>

                                    @if ($errors->has('kodedokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodedokter') }}</p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-outline-primary">Simpan & Cetak
                                            Resep</button>
                                        <button type="submit" class="btn btn-outline-success">Simpan</button>
                                        <button type="reset" class="btn btn-outline-danger">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection