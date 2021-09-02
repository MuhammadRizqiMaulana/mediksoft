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
                                    <h4 class="far fa-building"> Data Perusahaan / Jaminan</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('Jaminan/#TambahJaminan')}}"><i class="fa fa-plus-circle"></i>
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
                                        <th>ID</th>
                                        <th>Nama Perusahaan / Jaminan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->idprsh}}</td>
                                        <td>{{$item->namaprsh}}</td>
                                        <td>
                                            <a href="/Jaminan/ubah{{$item->idprsh}}#UbahJaminan"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/Jaminan/hapus{{$item->idprsh}}"
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
                    <div class="card card-success card-outline" id="TambahJaminan">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Jaminan/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Perusahaan / Jaminan</label>
                                    <input type="text" class="form-control" id="namaprsh" name="namaprsh"
                                        placeholder="Nama Perushaan / Jaminan">
                                    @if ($errors->has('namaprsh'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namaprsh') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamatprsh" name="alamatprsh"
                                        placeholder="Alamat">
                                    @if ($errors->has('alamatprsh'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('alamatprsh') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text" name="" class="form-control" placeholder="Telepon">
                                            @if ($errors->has('telp'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('telp') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="jenisjaminan">Jenis Jaminan</label>
                                            <select class="form-control" name="jenisprsh">
                                                <option value="">-Pilih-</option>
                                                <option value="Umum">Umum</option>
                                                <option value="Kredit">Kredit</option>
                                                <option value="Asuransi">Asuransi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Kontak</label>
                                                <input type="text" name="" class="form-control" placeholder="Kontak">
                                                @if ($errors->has('kontak'))
                                                <span class="text-danger">
                                                    <p class="text-right">* {{ $errors->first('kontak') }}</p>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="date" class="form-control" name="expired"
                                                    placeholder="Expired">
                                            </div>
                                            @if ($errors->has('expired'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('expired') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="form-group">
                                            <label for="idkategori">Kategori Perusahaan / Jaminan</label>
                                            <select class="form-control" name="idjabatan">
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($idkategori as $item)
                                                <option value="{{$item->idkategori}}">{{$item->namakategori}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('idkategori'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('idkategori') }}</p>
                                            </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-sm-8">

                                        <a class="btn btn-outline-success" href=" {{url('/Perusahaankategori')}}">
                                            Add
                                        </a>
                                    </div>
                                </div>


                                <!-- /.card-body -->

                                <div class="footer text-right">
                                    <button type="submit" class="btn btn-outline-success"><i
                                            class="fa fa-check"></i></button>
                                    <button type="reset" class="btn btn-outline-danger"><i
                                            class="fa fa-times"></i></button>
                                </div>

                        </form>
                    </div>
                    <!-- /.card -->

                    @else
                    <!-- general form elements -->
                    <div class="card card-primary card-outline" id="UbahJaminan">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Jaminan/update'.$ubah->idprsh)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="namaprsh" name="namaprsh"
                                        placeholder="Nama Perusahaan" value="{{$ubah->namaprsh}}">
                                    @if ($errors->has('namaprsh'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namaprsh') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alamatprsh">Alamat</label>
                                    <input type="text" class="form-control" id="alamatprsh" name="alamatprsh"
                                        placeholder="Nama Perusahaan" value="{{$ubah->alamatprsh}}">
                                    @if ($errors->has('alamatprsh'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('alamatprsh') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text" name="" class="form-control" placeholder="Telepon"
                                                value="{{$ubah->telp}}">
                                            @if ($errors->has('telp'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('telp') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="jenisjaminan">Jenis Jaminan</label>
                                            <select class="form-control" name="jenisprsh">
                                                <option value="">-Pilih-</option>
                                                <option value="Umum">Umum</option>
                                                <option value="Kredit">Kredit</option>
                                                <option value="Asuransi">Asuransi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Kontak</label>
                                                <input type="text" name="" class="form-control" placeholder="Kontak"
                                                    value="{{$ubah->kontak}}">
                                                @if ($errors->has('kontak'))
                                                <span class="text-danger">
                                                    <p class="text-right">* {{ $errors->first('kontak') }}</p>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="date" class="form-control" name="expired"
                                                    placeholder="Expired">
                                            </div>
                                            @if ($errors->has('expired'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('expired') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="idkategori">Kategori Perusahaan / Jaminan</label>
                                        <select class="form-control" name="idkategori">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($idkategori as $item)
                                            <option value="{{$item->idkategori}}">{{$item->namakategori}}</option>
                                            @endforeach
                                        </select> @if ($errors->has('idkategori'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('idkategori') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="footer text-right">
                                    <button type="submit" class="btn btn-outline-success"><i
                                            class="fa fa-check"></i></button>
                                    <button type="reset" class="btn btn-outline-danger"><i
                                            class="fa fa-times"></i></button>
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