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
                                    <h4 class="fas fa-user-nurse"> Data ICD 10</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-outline-secondary btn-sm"><i
                                            class="fa fa-print"></i> Cetak</button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode ICD</th>
                                        <th>Nama Diagnoosa</th>
                                        <th>Gol Sebab Sakit</th>
                                        <th>Nama STP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->kode}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{isset($item->Icd10_mordibitas) ? $item->Icd10_mordibitas->golsebabsakit : '' }}</td>
                                        <td>{{isset($item->Icd10_stp) ? $item->Icd10_stp->namastp : '' }}</td>
                                        <td>
                                            <a href="/Icd10/ubah{{$item->kode}}#UbahIcd10"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/Icd10/hapus{{$item->kode}}" class="btn btn-outline-danger btn-sm"
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


                    @else
                    <!-- general form elements -->
                    <div class="card card-primary card-outline" id="UbahIcd10">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Icd10/update'.$ubah->kode)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Kode ICD</label>
                                    <input type="text" class="form-control" id="kode" name="kode"
                                        placeholder="Kode ICD " value="{{$ubah->kode}}">
                                    @if ($errors->has('kode'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('kode') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Diagnosa</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Diagnosa" value="{{$ubah->nama}}">
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('nama') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>No DTD </label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="idmordibitas"
                                                name="idmordibitas" placeholder="Nama Diagnosa"
                                                value="{{$ubah->idmordibitas}}" hidden>
                                            <select class="form-control" width="100%" id="icd10_mordibitas">
                                                @foreach ($icd10_mordibitas as $item)
                                                <option value="{{$item->nodtd}}">{{$item->nodtd}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-Icd10_mordabitas">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama Diagnosa"
                                            value="{{$ubah->Icd10_mordibitas->golsebabsakit}}">
                                    </div>
                                    @if ($errors->has('idmordibitas'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idmordibitas') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>STP</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <select class="form-control" width="100%" id="Icd10_stp">
                                                @foreach ($Icd10_stp as $item)
                                                <option value="{{$item->kodestp}}" ->{{$item->kodestp}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal-Icd10_stp">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('idstp'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('idstp') }}</p>
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