@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
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

    <!-- Main content -->
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-6 ">
                    @if(isset($ubah) == NULL & isset($lihat) == NULL)
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="TambahPendaftaranRawatJalan">
                        <div class="card-header">
                            <h4 class="text-success"></i> Pendaftaran Rawat Jalan</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Data_Pendaftaran/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">

                                <!-- text input -->
                                <div class="form-group">
                                    <label for="kelas">Tanggal Masuk</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="tglmasuk" name="tglmasuk"
                                                placeholder="Tanggal Masuk" value="{{ date('Y-m-d H:i:s') }}">
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" onclick="tanggalsekarang();" class="btn btn-outline-info">
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('tglmasuk'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('tglmasuk') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">


                                    <div class="row">
                                        <div class="col-4">
                                            <label for="norm">No Rekam Medis</label>
                                            <input type="text" class="form-control" id="norm" name="norm"
                                                placeholder="No Rekam Medis" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label for="namapasien">Nama Pasien</label>
                                            <input type="text" class="form-control" id="namapasien" name="namapasien"
                                                placeholder="Nama Pasien" readonly>
                                        </div>
                                        <div class="col-2 text-right align-self-end">
                                            <button type="button" class="btn btn-outline-info align-bottom"
                                                data-toggle="modal" data-target="#modal-pasien">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('norm'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('norm') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="poliklinik">Poliklinik</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="poliklinik" name="kodepoli"
                                                placeholder="Kode Poli" hidden>
                                            <input type="text" class="form-control" id="namapoli" name="namapoli"
                                                placeholder="Nama Poli" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-poliklinik">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kodepoli'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodepoli') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="dokter">Dokter</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="dokter" name="iddokter"
                                                placeholder="Dokter" hidden>
                                            <input type="text" class="form-control" id="namadokter" name="namadokter"
                                                placeholder="Nama Dokter" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-dokter">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('iddokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('iddokter') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="perusahaan">Perusahaan / Jaminan</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="perusahaan" name="idprsh"
                                                placeholder="Perusahaan" hidden>
                                            <input type="text" class="form-control" id="namaprsh" name="namaprsh"
                                                placeholder="Nama Perusahaan" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-perusahaan">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('idprsh'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idprsh') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="faskes">Pengirim</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="faskes"
                                                name="kodefaskespengirim" placeholder="Pengirim" hidden>
                                            <input type="text" class="form-control" id="namafaskes" name="namafaskes"
                                                placeholder="Nama Pengirim" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-faskes">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kodefaskespengirim'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodefaskespengirim') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="administrasi">Administrasi</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" id="administrasi"
                                                name="administrasi" min="0" placeholder="Administrasi" value="0">
                                            @if ($errors->has('administrasi'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('administrasi') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-success"><i class="far fa-save"></i>
                                    Simpan</button>
                                <button type="reset" onclick="window.location.href='{{url('Data_Pendaftaran')}}'"
                                    class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    @elseif(isset($ubah) == !NULL)
                    <!-- general form elements -->
                    <div class="card card-primary card-outline" id="UbahPendaftaranRawatJalan">
                        <div class="card-header">
                            <h4 class="text-primary"></i> Pendaftaran Rawat Jalan</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Data_Pendaftaran/update'.$ubah->faktur_rawatjalan)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">

                                <!-- text input -->
                                <div class="form-group">
                                    <label for="kelas">Tanggal Masuk</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="datetime" class="form-control" id="tglmasuk" name="tglmasuk"
                                                placeholder="Tanggal Masuk" value="{{$ubah->tglmasuk}}">
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" onclick="tanggalsekarang();" class="btn btn-outline-info">
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('tglmasuk'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('tglmasuk') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">


                                    <div class="row">
                                        <div class="col-4">
                                            <label for="norm">No Rekam Medis</label>
                                            <input type="text" class="form-control" id="norm" name="norm"
                                                placeholder="No Rekam Medis" value="{{$ubah->norm}}" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label for="namapasien">Nama Pasien</label>
                                            <input type="text" class="form-control" id="namapasien" name="namapasien"
                                                placeholder="Nama Pasien" value="{{$ubah->Pasien->namapasien}}"
                                                readonly>
                                        </div>
                                        <div class="col-2 text-right align-self-end">
                                            <button type="button" class="btn btn-outline-info align-bottom"
                                                data-toggle="modal" data-target="#modal-pasien" disabled>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('norm'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('norm') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="poliklinik">Poliklinik</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="poliklinik" name="kodepoli"
                                                placeholder="Kode Poli" value="{{$ubah->kodepoli}}" hidden>
                                            <input type="text" class="form-control" id="namapoli" name="namapoli"
                                                placeholder="Nama Poli" value="{{$ubah->Poliklinik->nama}}" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-poliklinik">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kodepoli'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodepoli') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="dokter">Dokter</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="dokter" name="iddokter"
                                                placeholder="Dokter" value="{{$ubah->iddokter}}" hidden>
                                            <input type="text" class="form-control" id="namadokter" name="namadokter"
                                                placeholder="Nama Dokter" value="{{$ubah->Dokter->nama}}" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-dokter">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('iddokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('iddokter') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="perusahaan">Perusahaan / Jaminan</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="perusahaan" name="idprsh"
                                                placeholder="Perusahaan" value="{{$ubah->idprsh}}" hidden>
                                            <input type="text" class="form-control" id="namaprsh" name="namaprsh"
                                                placeholder="Nama Perusahaan" value="{{$ubah->Perusahaan->namaprsh}}" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-perusahaan">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('idprsh'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idprsh') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="faskes">Pengirim</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="faskes"
                                                name="kodefaskespengirim" placeholder="Pengirim"
                                                value="{{$ubah->kodefaskespengirim}}" hidden>
                                            <input type="text" class="form-control" id="namafaskes" name="namafaskes"
                                                placeholder="Nama Pengirim" value="{{$ubah->Faskes->namafaskes}}" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-faskes">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kodefaskespengirim'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodefaskespengirim') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="administrasi">Administrasi</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" id="administrasi"
                                                name="administrasi" min="0" placeholder="Administrasi"
                                                value="@rupiah($ubah->administrasi)">
                                            @if ($errors->has('administrasi'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('administrasi') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i>
                                    Simpan</button>
                                <button type="reset" onclick="window.location.href='{{url('Data_Pendaftaran')}}'"
                                    class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    @elseif(isset($lihat) == !NULL)
                    <!-- general form elements -->
                    <div class="card card-info card-outline" id="LihatPendaftaranRawatJalan">
                        <div class="card-header">
                            <h4 class="text-info"></i> Pendaftaran Rawat Jalan</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Data_Pendaftaran/lihat'.$lihat->faktur_rawatjalan)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">

                                <!-- text input -->
                                <div class="form-group">
                                    <label for="kelas">Tanggal Masuk</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="datetime" class="form-control" id="tglmasuk" name="tglmasuk"
                                                placeholder="Tanggal Masuk" value="{{$lihat->tglmasuk}}" disabled>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" disabled>
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('tglmasuk'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('tglmasuk') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">


                                    <div class="row">
                                        <div class="col-4">
                                            <label for="norm">No Rekam Medis</label>
                                            <input type="text" class="form-control" id="norm" name="norm"
                                                placeholder="No Rekam Medis" value="{{$lihat->norm}}" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="namapasien">Nama Pasien</label>
                                            <input type="text" class="form-control" id="namapasien" name="namapasien"
                                                placeholder="Nama Pasien" value="{{$lihat->Pasien->namapasien}}"
                                                disabled>
                                        </div>
                                        <div class="col-2 text-right align-self-end">
                                            <button type="button" class="btn btn-outline-info align-bottom"
                                                data-toggle="modal" data-target="#modal-pasien" disabled>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('norm'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('norm') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="poliklinik">Poliklinik</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="poliklinik" name="kodepoli"
                                                placeholder="Kode Poli" value="{{$lihat->kodepoli}}" hidden disabled>
                                            <input type="text" class="form-control" id="namapoli" name="namapoli"
                                                placeholder="Nama Poli" value="{{$lihat->Poliklinik->nama}}" disabled>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-poliklinik" disabled>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kodepoli'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodepoli') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="dokter">Dokter</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="dokter" name="iddokter"
                                                placeholder="Dokter" value="{{$lihat->iddokter}}" hidden disabled>
                                            <input type="text" class="form-control" id="namadokter" name="namadokter"
                                                placeholder="Nama Dokter" value="{{$lihat->Dokter->nama}}" disabled>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-dokter" disabled>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('iddokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('iddokter') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="perusahaan">Perusahaan / Jaminan</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="perusahaan" name="idprsh"
                                                placeholder="Perusahaan" value="{{$lihat->idprsh}}" hidden disabled>
                                            <input type="text" class="form-control" id="namaprsh" name="namaprsh"
                                                placeholder="Nama Perusahaan" value="{{$lihat->Perusahaan->namaprsh}}"
                                                disabled>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-perusahaan" disabled>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('idprsh'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idprsh') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="faskes">Pengirim</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="faskes"
                                                name="kodefaskespengirim" placeholder="Pengirim"
                                                value="{{$lihat->kodefaskespengirim}}" hidden disabled>
                                            <input type="text" class="form-control" id="namafaskes" name="namafaskes"
                                                placeholder="Nama Pengirim" value="{{$lihat->Faskes->namafaskes}}"
                                                disabled>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-faskes" disabled>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kodefaskespengirim'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kodefaskespengirim') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="administrasi">Administrasi</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" id="administrasi"
                                                name="administrasi" min="0" placeholder="Administrasi"
                                                value="{{$lihat->administrasi}}" disabled>
                                            @if ($errors->has('administrasi'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('administrasi') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-info" disabled><i class="far fa-save"></i>
                                    Simpan</button>
                                <button type="reset" onclick="window.location.href='{{url('Data_Pendaftaran')}}'"
                                    class="btn btn-outline-danger"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                    @endif

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Script Modal -->
<script type="text/javascript">
    function tanggalsekarang() {
      var d = new Date();

      var month = d.getMonth()+1;
      var day = d.getDate();
      var hour = d.getHours();
      var minute = d.getMinutes();
      var second = d.getSeconds();

      var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day + ' ' +
          (hour<10 ? '0' : '') + hour + ':' +
          (minute<10 ? '0' : '') + minute + ':' +
          (second<10 ? '0' : '') + second;

      document.getElementById("tglmasuk").value = output;
    }

function pasien($norm, $namapasien) {
    document.getElementById("norm").value = $norm;
    document.getElementById("namapasien").value = $namapasien;
    $(".close").click();
}

function poliklinik($kode, $nama) {
    document.getElementById('poliklinik').value = $kode;
    document.getElementById('namapoli').value = $nama;
    $(".close").click();
}

function dokter($iddokter, $nama) {
    document.getElementById('dokter').value = $iddokter;
    document.getElementById('namadokter').value = $nama;
    $(".close").click();
}

function perusahaan($idprsh, $namaprsh) {
    document.getElementById('perusahaan').value = $idprsh;
    document.getElementById('namaprsh').value = $namaprsh;
    $(".close").click();
}

function faskes($kodefaskes, $namafaskes) {
    document.getElementById('faskes').value = $kodefaskes;
    document.getElementById('namafaskes').value = $namafaskes;
    $(".close").click();
}
</script>
<!-- /.Script Modal -->

@endsection