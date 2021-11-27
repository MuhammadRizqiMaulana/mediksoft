@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Operasi.Layout.menu')
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
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="fas fa-user-nurse">Dokter Bedah</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('DokterBedah/#TambahDokterBedah')}}"><i
                                            class="fa fa-plus-circle"></i>
                                        Tambah</a>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"><i
                                            class="fa fa-print"></i> Cetak</button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Dokter</th>
                                        <th>Jenis Rawat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->Dokter->nama}}</td>
                                        <td>{{$item->jenisrawat}}</td>
                                        <td>
                                            <a href="/DokterBedah/ubah{{$item->iddokter}},{{$item->jenisrawat}}#UbahDokterBedah"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/DokterBedah/hapus{{$item->iddokter}},{{$item->jenisrawat}}"
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
                <div class="col-5">
                    @if(isset($ubah) == NULL)
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="TambahDokterBedah">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/DokterBedah/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kelas">Nama Dokter</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="iddokter" name="iddokter"
                                                placeholder="Kode Dokter" hidden>
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
                                    <label for="jenisrawat">Jenis Rawat</label>
                                    <select class="form-control" name="jenisrawat">
                                        <option value="">-Pilih Jenis Rawat-</option>
                                        <option value="Rawat Jalan">Rawat Jalan</option>
                                        <option value="Rawat Inap">Rawat Inap</option>
                                    </select>
                                    @if ($errors->has('jenisrawat'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('jenisrawat') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="footer text-right">
                                    <button type="submit" class="btn btn-outline-success"><i
                                            class="fa fa-check"></i></button>
                                    <button type="reset" class="btn btn-outline-danger"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->

                    @else
                    <!-- general form elements -->
                    <div class="card card-primary card-outline" id="UbahDokterBedah">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/DokterBedah/update'.$ubah->iddokter.','.$ubah->jenisrawat)}}"
                            method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kelas">Nama Dokter</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="iddokter" name="iddokter"
                                                placeholder="Kode Dokter" value="{{$ubah->iddokter}}" hidden>
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
                                    <label for="jenisrawat">Jenis Rawat</label>
                                    <select class="form-control" name="jenisrawat">
                                        <option value="">-Pilih Jenis Rawat-</option>
                                        <option value="Rawat Jalan"
                                            {{ ($ubah->jenisrawat == "Rawat Jalan") ? 'selected' : ''}}> Rawat Jalan
                                        </option>
                                        <option value="Rawat Inap"
                                            {{ ($ubah->jenisrawat == "Rawat Inap") ? 'selected' : ''}}>Rawat Inap
                                        </option>
                                    </select>
                                    @if ($errors->has('jenisrawat'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('jenisrawat') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="footer text-right">
                                    <button type="submit" class="btn btn-outline-success"><i
                                            class="fa fa-check"></i></button>
                                    <button type="reset" class="btn btn-outline-danger"><i
                                            class="fa fa-times"></i></button>
                                </div>
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

<script type="text/javascript">
function dokter($iddokter, $namadokter) {
    document.getElementById('iddokter').value = $iddokter;
    document.getElementById('namadokter').value = $namadokter;
    $(".close").click();
}
</script>
@endsection