@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
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
                                    <h4>Macam Rawat</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('MacamRawat/#TambahMacamRawat')}}"><i class="fa fa-plus-circle"></i>
                                        Tambah</a>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"><a
                                            href="/MacamRawat/cetakdatamacamrawat">
                                            <i class="fa fa-print"></i> Cetak
                                        </a></button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->kode}}</td>
                                        <td>{{$item->macamrawat}}</td>
                                        <td>
                                            <a href="/MacamRawat/ubah{{$item->kode}}#UbahMacamRawat"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/MacamRawat/hapus{{$item->kode}}"
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
                    <div class="card card-success card-outline" id="TambahMacamRawat">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/MacamRawat/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Kode</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode">
                                    @if ($errors->has('kode'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kode') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="macamrawat">Nama Macam Rawat</label>
                                    <input type="text" class="form-control" id="macamrawat" name="macamrawat"
                                        placeholder="Nama Macam Rawat">
                                    @if ($errors->has('macamrawat'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('macamrawat') }}</p>
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
                    <div class="card card-primary card-outline" id="UbahMacamRawat">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/MacamRawat/update'.$ubah->kode)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode"
                                        value="{{$ubah->kode}}" disabled>
                                    @if ($errors->has('kode'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kode') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="macamrawat">Nama Macam Rawat</label>
                                    <textarea class="form-control" id="macamrawat" name="macamrawat"
                                        placeholder="Nama Macam Rawat">{{$ubah->macamrawat}}</textarea>
                                    @if ($errors->has('macamrawat'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('macamrawat') }}</p>
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