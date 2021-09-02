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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4>Data Kategori Perusahaan / Jaminan</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('Perusahaankategori/#TambahPerusahaankategori')}}"><i
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
                                        <th>Kode</th>
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->idkategori}}</td>
                                        <td>{{$item->namakategori}}</td>
                                        <td>
                                            <a href="/Perusahaankategori/ubah{{$item->idkategori}}#UbahPerusahaankategori"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/Perusahaankategori/hapus{{$item->idkategori}}"
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
                    <div class="card card-success card-outline" id="TambahPerusahaankategori">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Perusahaankategori/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Kode</label>
                                    <input type="text" class="form-control" id="idkategori" name="idkategori"
                                        placeholder="Kode">
                                    @if ($errors->has('idkategori'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idkategori') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kelas</label>
                                    <input type="text" class="form-control" id="namakategori" name="namakategori"
                                        placeholder="Nama Kelas">
                                    @if ($errors->has('namakategori'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namakategori') }}</p>
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
                    <div class="card card-primary card-outline" id="UbahPerusahaankategori">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Perusahaankategori/update'.$ubah->idkategori)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="idkategori">Kode</label>
                                    <input type="text" class="form-control" id="idkategori" name="idkategori"
                                        placeholder="Kode" value="{{$ubah->idkategori}}">
                                    @if ($errors->has('idkategori'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idkategori') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kelas</label>
                                    <input type="text" class="form-control" id="namakategori" name="namakategori"
                                        placeholder="Nama Kelas" value="{{$ubah->namakategori}}">
                                    @if ($errors->has('namakategori'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namakategori') }}</p>
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