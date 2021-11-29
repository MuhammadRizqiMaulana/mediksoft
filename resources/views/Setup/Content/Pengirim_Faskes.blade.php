@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Data Pengirim / Faskes</h4>
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
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('Pengirim_Faskes/#TambahFaskes')}}"><i
                                            class="fa fa-plus-circle"></i> Tambah</a>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"><a
                                            href="/Pengirim_Faskes/cetakdatapengirimfaskes">
                                            <i class="fa fa-print"></i> Cetak Data Pengirim Faskes
                                        </a></button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode Faskes</th>
                                        <th>Nama Faskes</th>
                                        <th>Alamat</th>
                                        <th>Fee</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->kodefaskes}}</td>
                                        <td>{{$item->namafaskes}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->fee}}</td>
                                        <td>
                                            <a href="/Pengirim_Faskes/ubah{{$item->kodefaskes}}#UbahFaskes"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/Pengirim_Faskes/hapus{{$item->kodefaskes}}"
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
                    <div class="card card-success card-outline" id="TambahFaskes">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Pengirim_Faskes/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Pengirim / Faskes</label>
                                    <input type="text" class="form-control" id="nama" name="namafaskes"
                                        placeholder="Nama Pengirim / Faskes">
                                    @if ($errors->has('namafaskes'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namafaskes') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat"></textarea>
                                    @if ($errors->has('alamat'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('alamat') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="fee">Fee</label>
                                    <input type="number" class="form-control" id="fee" name="fee" placeholder="Fee"
                                        min="0">
                                    @if ($errors->has('fee'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('fee') }}</p>
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
                    <div class="card card-primary card-outline" id="UbahFaskes">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Pengirim_Faskes/update'.$ubah->kodefaskes)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Pengirim / Faskes</label>
                                    <input type="text" class="form-control" id="nama" name="namafaskes"
                                        placeholder="Nama Pengirim / Faskes" value="{{$ubah->namafaskes}}">
                                    @if ($errors->has('namafaskes'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namafaskes') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat">{{$ubah->alamat}}</textarea>
                                    @if ($errors->has('alamat'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('alamat') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="fee">Fee</label>
                                    <input type="number" class="form-control" id="fee" step="any" name="fee"
                                        placeholder="Fee" min="0" value="{{$ubah->fee}}">
                                    @if ($errors->has('fee'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('fee') }}</p>
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

@endsection