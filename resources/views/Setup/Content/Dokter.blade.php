@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
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
                                    <h4 class="fas fa-user-nurse"> Data Dokter</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a class="btn btn-outline-success btn-sm" href="{{url('Dokter/#TambahDokter')}}"><i
                                            class="fa fa-plus-circle"></i> Tambah</a>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"><a
                                            href="/Dokter/cetakdatadokter">
                                            <i class="fa fa-print"></i> Cetak Data Dokter
                                        </a></button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIK</th>
                                        <th>Nama Dokter</th>
                                        <th>Jenis Dokter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->iddokter}}</td>
                                        <td>{{$item->nikd}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->jenisdokter}}</td>
                                        <td>
                                            <a href="/Dokter/ubah{{$item->iddokter}}#UbahDokter"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/Dokter/hapus{{$item->iddokter}}"
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
                    <div class="card card-success card-outline" id="TambahDokter">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Dokter/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">NIK Dokter</label>
                                    <input type="text" class="form-control" id="nikd" name="nikd"
                                        placeholder="NIK Dokter">
                                    @if ($errors->has('nikd'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nikd') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Dokter</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Dokter">
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nama') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>No Register</label>
                                            <input type="text" name="" class="form-control" placeholder="No Register">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <div class="form-group text-center">
                                            <label>Masa berlaku</label>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <span for="tanggaldari" class="col-form-label">Dari</span>
                                                            <div class="col-sm-7">
                                                                <input type="date" class="form-control" name=""
                                                                    id="tanggaldari" placeholder="Tanggal">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span for="tanggalsampai" class="col-form-label">Sd</span>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control" name=""
                                                            id="tanggalsampai" placeholder="Tanggal">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @if ($errors->has(''))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('') }}</p>
                                        </span>
                                        @endif
                                        @if ($errors->has(''))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>No KTP</label>
                                            <input type="text" class="form-control" name="noktp" placeholder="No KTP">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" id="telepon" name="telepon"
                                                placeholder="Telepon">
                                            @if ($errors->has('telepon'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('telepon') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="alamat">Alamat Praktek</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Alamat Praktek">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="alamat">Alamat Domisili</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Alamat Domisili">
                                            @if ($errors->has('alamat'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('alamat') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin">
                                        <option value="">-Pilih Jenis Kelamin-</option>
                                        <option value="laki-laki">Laki - Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    @if ($errors->has('jeniskelamin'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('jeniskelamin') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jenisdokter">Jenis Dokter</label>
                                    <select class="form-control" name="jenisdokter">
                                        <option value="">-Pilih Jenis Dokter-</option>
                                        <option value="umum">Umum</option>
                                        <option value="spesialis">Spesialis</option>
                                    </select>
                                    @if ($errors->has('jenisdokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('jenisdokter') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-5">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tanggal Aktif</label>
                                        <input type="date" class="form-control" name="tgl_aktif"
                                            placeholder="Tanggal Aktif">
                                    </div>
                                    @if ($errors->has('tgl_aktif'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('tgl_aktif') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Tanda Tangan</h5>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <input type="file" name="img" class="image-preview-filepond">
                                            </div>
                                        </div>
                                    </div>
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
                    <div class="card card-primary card-outline" id="UbahDokter">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Dokter/update'.$ubah->iddokter)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nikd">NIK Dokter</label>
                                    <input type="text" class="form-control" id="nikd" name="nikd"
                                        placeholder="NIK Dokter" value="{{$ubah->nikd}}">
                                    @if ($errors->has('nikd'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nikd') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nikd">NIK Dokter</label>
                                    <input type="text" class="form-control" id="nikd" name="nikd"
                                        placeholder="NIK Dokter" value="{{$ubah->nikd}}">
                                    @if ($errors->has('nikd'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nikd') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Dokter</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Dokter" value="{{$ubah->nama}}">
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nama') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>No Register</label>
                                            <input type="text" name="" class="form-control" placeholder="No Register">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <div class="form-group text-center">
                                            <label>Masa berlaku</label>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <span for="tanggaldari" class="col-form-label">Dari</span>
                                                            <div class="col-sm-7">
                                                                <input type="date" class="form-control" name=""
                                                                    id="tanggaldari" placeholder="Tanggal">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span for="tanggalsampai" class="col-form-label">Sd</span>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control" name=""
                                                            id="tanggalsampai" placeholder="Tanggal">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @if ($errors->has(''))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('') }}</p>
                                        </span>
                                        @endif
                                        @if ($errors->has(''))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>No KTP</label>
                                            <input type="text" class="form-control" name="noktp" placeholder="No KTP">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" id="telepon" name="telepon"
                                                placeholder="Telepon" value="{{$ubah->telepon}}">
                                            @if ($errors->has('telepon'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('telepon') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="alamat">Alamat Praktek</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Alamat Praktek" value="{{$ubah->alamat}}">
                                            @if ($errors->has('alamat'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('alamat') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="alamat">Alamat Domisili</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="ALamat Domisili" value="{{$ubah->alamat}}">
                                            @if ($errors->has('alamat'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('alamat') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin">
                                        <option value="">-Pilih Jenis Kelamin-</option>
                                        <option value="laki-laki"
                                            {{ ($ubah->jeniskelamin == "laki-laki") ? 'selected' : ''}}>Laki -
                                            laki</option>
                                        <option value="perempuan"
                                            {{ ($ubah->jeniskelamin == "perempuan") ? 'selected' : ''}}>Perempuan
                                        </option>
                                    </select>
                                    @if ($errors->has('jeniskelamin'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('jeniskelamin') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jenisdokter">Jenis Dokter</label>
                                    <select class="form-control" name="jenisdokter">
                                        <option value="">-Pilih Jenis Dokter-</option>
                                        <option value="Umum" {{ ($ubah->jenisdokter == "umum") ? 'selected' : ''}}>
                                            Umum</option>
                                        <option value="Spesialis"
                                            {{ ($ubah->jenisdokter == "spesialis") ? 'selected' : ''}}>Spesialis
                                        </option>
                                    </select>
                                    @if ($errors->has('jenisdokter'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('jenisdokter') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-5">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tanggal Aktif</label>
                                        <input type="date" class="form-control" name="tgl_aktif"
                                            placeholder="Tanggal Aktif" value="{{$ubah->tgl_aktif}}">
                                    </div>
                                    @if ($errors->has('tgl_aktif'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('tgl_aktif') }}</p>
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

@endsection