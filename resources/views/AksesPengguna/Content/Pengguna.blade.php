@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('AksesPengguna.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Pengguna</h4>
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
    @if(\Session::has('alert-danger'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fas fa-sign-out-alt"></i><b> Gagal!!</b></h6>
        {{Session::get('alert-danger')}}
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
                                        href="{{url('Pengguna/#TambahPengguna')}}"><i class="fa fa-plus-circle"></i>
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
                                        <th>Username </th>
                                        <th>Nama </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->uname}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>
                                            <a href="/Pengguna/ubah{{$item->iduser}}#UbahPengguna"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/Pengguna/hapus{{$item->iduser}}"
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
                    <div class="card card-success card-outline" id="TambahPengguna">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Pengguna/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="row">
                                        <div class="col-7">
                                            <input type="text" class="form-control" id="username" name="uname"
                                                placeholder="Username">
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="aktif"
                                                    name="aktif">
                                                <label class="form-check-label" for="nonaktif">
                                                    Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('uname'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('uname') }}</p>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Nama">
                                        </div>
                                    </div>
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nama') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="karyawan">Karyawan</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="idkaryawan" name="idkaryawan"
                                                placeholder="Karyawan" hidden>
                                            <input type="text" class="form-control" id="namakaryawan"
                                                name="namakaryawan" placeholder="Karyawan" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-karyawan">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('karyawan'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('karyawan') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Level Akses</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="idlevel" name="idlevel"
                                                placeholder="Level" hidden>
                                            <input type="text" class="form-control" id="namalevel" name="namalevel"
                                                placeholder="Level" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-user_level">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('namalevel'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('namalevel') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="password" class="form-control" id="password" name="pwd"
                                                placeholder="password">
                                        </div>
                                    </div>
                                    @if ($errors->has('pwd'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('pwd') }}</p>
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
                    <div class="card card-primary card-outline" id="UbahPengguna">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Pengguna/update'.$ubah->iduser)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="row">
                                        <div class="col-7">
                                            <input type="text" class="form-control" id="uname" name="uname"
                                                placeholder="Username" value="{{$ubah->uname}}">
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="aktif"
                                                    name="aktif" {{($ubah->aktif == 1)? 'checked':''}}>
                                                <label class="form-check-label" for="aktif">
                                                    Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('uname'))
                                <span class="text-danger">
                                    <p class="text-right">* {{ $errors->first('uname') }}</p>
                                </span>
                                @endif
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Nama" value="{{$ubah->nama}}">
                                        </div>
                                    </div>
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nama') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="karyawan">Karyawan</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="idkaryawan" name="idkaryawan"
                                                placeholder="Karyawan" value="{{$ubah->Karyawan->idkaryawan}}" hidden>
                                            <input type="text" class="form-control" id="namakaryawan"
                                                name="namakaryawan" placeholder="Karyawan"
                                                value="{{$ubah->Karyawan->nama}}" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-karyawan">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('karyawan'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('karyawan') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="levelakses">Level Akses</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="idlevel" name="idlevel"
                                                placeholder="Level" value="{{$ubah->User_level->idlevel}}" hidden>
                                            <input type="text" class="form-control" id="namalevel" name="namalevel"
                                                placeholder="Level" value="{{$ubah->User_level->namalevel}}" readonly>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-user_level">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="password" class="form-control" id="password" name="pwd"
                                                disabled="disabled" placeholder="Password">
                                        </div>
                                        <div class="col-3">
                                            <input class="form-check-input" type="checkbox" value="1" id="aktif"
                                                name="aktif" onchange="ubahpwd(this);">

                                        </div>
                                    </div>
                                    @if ($errors->has('pwd'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('pwd') }}</p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-outline-primary"><i
                                        class="fa fa-check"></i></button>
                                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                @endif

            </div>
        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Script Modal -->
<script type="text/javascript">
function karyawan($idkaryawan, $nama) {
    document.getElementById('idkaryawan').value = $idkaryawan;
    document.getElementById('namakaryawan').value = $nama;
    $(".close").click();
}

function user_level($idlevel, $namalevel) {
    document.getElementById('idlevel').value = $idlevel;
    document.getElementById('namalevel').value = $namalevel;
    $(".close").click();
}

function ubahpwd(elements) {
    if ($(elements).prop("checked") == true) {
        document.getElementById('password').disabled = false;
    } else {
        document.getElementById('password').disabled = true;
    }
}
</script>


@endsection