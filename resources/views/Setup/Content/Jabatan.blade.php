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
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4><i class="fas fa-chair"></i> Jabatan</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('Jabatan/#TambahJabatan')}}"><i class="fa fa-plus-circle"></i>
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
                                        <th>ID Jabatan </th>
                                        <th>Nama Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>
                                            <a href="/Jabatan/ubah{{$item->id}}#UbahJabatan"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/Jabatan/hapus{{$item->id}}" class="btn btn-outline-danger btn-sm"
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
                    <div class="card card-success card-outline" id="TambahJabatan">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Jabatan/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Jabatan ">
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nama') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="medika"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Medikasoft
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="labrad"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Penunjang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="apotek"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Farmasi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="admin"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Administrasi & Inventori
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="prepay"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Prepay
                                    </label>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i></button>
                        <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->

                @else
                <!-- general form elements -->
                <div class="card card-primary card-outline" id="UbahJabatan">
                    <div class="card-header">
                        <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('/Jabatan/update'.$ubah->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Jabatan</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Jabatan"
                                    value="{{$ubah->nama}}">
                                @if ($errors->has('nama'))
                                <span class="text-danger">
                                    <p class="text-right">* {{ $errors->first('nama') }}</p>
                                </span>
                                @endif
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$ubah->medika}}" name="medika"
                                    id="flexCheckDefault" {{ ($ubah->medika == "1") ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Medikasoft
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$ubah->labrad}}" name="labrad"
                                    id="flexCheckDefault" {{ ($ubah->labrad == "1") ? 'labrad' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Penunjang
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$ubah->apotek}}" name="apotek"
                                    id="flexCheckDefault" {{ ($ubah->apotek == "1") ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Farmasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$ubah->admin}}" name="admin"
                                    id="flexCheckDefault" {{ ($ubah->admin == "1") ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Administrasi & Inventori
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$ubah->prepay}}" name="prepay"
                                    id="flexCheckDefault" {{ ($ubah->prepay == "1") ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Prepay
                                </label>
                            </div>
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check"></i></button>
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