@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Tindakan Poli</h4>
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

    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('TindakanPoli/#TambahTindakanPoli')}}"><i
                                            class="fa fa-plus-circle"></i> Tambah</a>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"><i
                                            class="fa fa-print"></i> Cetak</button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Poli</th>
                                        <th>Nama Tindakan Poli</th>
                                        <th>Tarif</th>
                                        <th>E-Klaim BPJS</th>
                                        <th>Kode_Icd9</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->Poliklinik->nama}}</td>
                                        <td>{{$item->namatindakan}}</td>
                                        <td>{{$item->tarif}}</td>
                                        <td>{{$item->Eklaimbpjs->nama}}</td>
                                        <td></td>
                                        <td>
                                            <a href="/TindakanPoli/ubah{{$item->idtindakan}}#UbahTindakanPoli"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i>
                                                Ubah</a>
                                            <a href="/TindakanPoli/hapus{{$item->idtindakan}}"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                <i class="fa fa-minus-circle"></i> Hapus
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-4">
                    @if(isset($ubah) == NULL)
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="TambahDokterPoli">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/TindakanPoli/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kelas">Poli</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="kodepoli" name="kodepoli"
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
                                    <div class="row">
                                        <div class="col-10">
                                            <label for="kelas">Nama Tindakan</label>
                                            <input type="text" class="form-control" id="namatindakan"
                                                name="namatindakan" placeholder="Nama Tindakan">
                                        </div>
                                    </div>
                                    @if ($errors->has('namatindakanpoli'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namatindakanpoli') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="tarif">Tarif</label>
                                    <input type="number" class="form-control" id="tarif" name="tarif"
                                        placeholder="tarif" min="0" readonly>
                                    @if ($errors->has('tarif'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('tarif') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="untukrs">Untuk Rumah Sakit</label>
                                            <input type="number" class="form-control" id="untukrs" name="untukrs"
                                                placeholder="Untuk RS" min="0" oninput="tambahtarif()">
                                        </div>
                                        <div class="col">
                                            <label for="untukdokter">Untuk Dokter</label>
                                            <input type="number" class="form-control" id="untukdokter"
                                                name="untukdokter" placeholder="Untuk Dokter" oninput="tambahtarif()"
                                                min="0">
                                        </div>
                                        <div class="col">
                                            <label for="untukparamedis">Untuk Paramedis</label>
                                            <input type="number" class="form-control" id="untukparamedis"
                                                name="untukparamedis" placeholder="Untuk Paramedis"
                                                oninput="tambahtarif()" min="0">
                                        </div>
                                    </div>
                                    @if ($errors->has('untukrs'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('untukrs') }}</p>
                                    </span>
                                    @endif
                                    @if ($errors->has('untukdokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('untukdokter') }}</p>
                                    </span>
                                    @endif
                                    @if ($errors->has('untukparamedis'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('untukparamedis') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Icd IX</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <select class="form-control" width="100%" name="kode" id="icd9">
                                                @foreach ($icd9 as $item)
                                                <option value="{{$item->kode}}">{{$item->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-Icd9">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kode'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kode') }}</p>
                                    </span>
                                    @endif
                                </div>

                                <!-- select -->
                                <div class="form-group">
                                    <label>E-Klaim BPJS</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <select class="form-control" width="100%" name="idklaim" id="eklaimbpjs">
                                                @foreach ($eklaimbpjs as $item)
                                                <option value="{{$item->idklaim}}">{{$item->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-eklaimbpjs">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('idklaim'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idklaim') }}</p>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-outline-success"><i
                                        class="fa fa-check"></i></button>
                                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    @else
                    <!-- general form elements -->
                    <div class="card card-primary card-outline" id="UbahTindakanPoli">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/TindakanPoli/update'.$ubah->idtindakan)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kelas">Nama Poli</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="kodepoli" name="kodepoli"
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
                                    <label for="kelas">Nama Tindakan Poli</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="namatindakanpoli"
                                                name="namatindakanpoli" placeholder="Nama Tindakan Poli"
                                                value="{{$ubah->namatindakan}}">
                                        </div>
                                    </div>
                                    @if ($errors->has('namatindakanpoli'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namatindakanpoli') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="tarif">Tarif</label>
                                    <input type="number" class="form-control" id="tarif" name="tarif"
                                        placeholder="tarif" min="0" value="{{$ubah->tarif}}" readonly>
                                    @if ($errors->has('tarif'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('tarif') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="untukrs">Untuk Rumah Sakit</label>
                                            <input type="number" class="form-control" id="untukrs" name="untukrs"
                                                placeholder="Untuk RS" value="{{$ubah->untukrs}}" min="0"
                                                oninput="tambahtarif()">
                                        </div>
                                        <div class="col">
                                            <label for="untukdokter">Untuk Dokter</label>
                                            <input type="number" class="form-control" id="untukdokter"
                                                name="untukdokter" placeholder="Untuk Dokter"
                                                value="{{$ubah->untukdokter}}" min="0" oninput="tambahtarif()">
                                        </div>
                                        <div class="col">
                                            <label for="untukparamedis">Untuk Paramedis</label>
                                            <input type="number" class="form-control" id="untukparamedis"
                                                name="untukparamedis" placeholder="Untuk Dokter"
                                                value="{{$ubah->untukparamedis}}" min="0" oninput="tambahtarif()">
                                        </div>
                                    </div>
                                    @if ($errors->has('untukrs'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('untukrs') }}</p>
                                    </span>
                                    @endif
                                    @if ($errors->has('untukdokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('untukdokter') }}</p>
                                    </span>
                                    @endif
                                    @if ($errors->has('untukparamedis'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('untukparamedis') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Icd IX</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <select class="form-control" width="100%" name="kode" id="icd9">
                                                <option value=""></option>
                                                @foreach ($icd9 as $item)
                                                <option value="{{$item->icd9}}">{{$item->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-tariftindakanpoli">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('kode'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kode') }}</p>
                                    </span>
                                    @endif
                                </div>

                                <!-- select -->
                                <div class="form-group">
                                    <label>E-Klaim BPJS</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <select class="form-control" width="100%" name="idklaim" id="eklaimbpjs">
                                                @foreach ($eklaimbpjs as $item)
                                                <option value="{{$item->idklaim}}"
                                                    {{ ($item->idklaim == $ubah->idklaim) ? 'selected' : ''}}>
                                                    {{$item->nama}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-eklaimbpjs">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('idklaim'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idklaim') }}</p>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-outline-primary"><i
                                        class="fa fa-check"></i></button>
                                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
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

<!-- Script Tarif Kalkulator -->
<script type="text/javascript">
function tambahtarif() {
    var angka1 = parseFloat(document.getElementById('untukrs').value);
    var angka2 = parseFloat(document.getElementById('untukdokter').value);
    var angka3 = parseFloat(document.getElementById('untukparamedis').value);
    var hasil = angka1 + angka2 + angka3;
    document.getElementById('tarif').value = hasil;
}
</script>
<!-- /.Script Tarif Kalkulator -->

<!-- Script Modal -->
<script type="text/javascript">
function eklaimbpjs($idklaim) {
    document.getElementById("eklaimbpjs").value = $idklaim;
    $(".close").click();
}

function Icd9($kode) {
    document.getElementById("Icd9").value = $kode;
    $(".close").click();
}

function poliklinik($kode, $nama) {
    document.getElementById('kodepoli').value = $kode;
    document.getElementById('namapoli').value = $nama;
    $(".close").click();
}
</script>
<!-- /.Script Modal -->

@endsection