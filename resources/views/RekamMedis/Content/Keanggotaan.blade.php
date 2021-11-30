@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RekamMedis.Layout.menu')
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
        <li>{{ $error }}
        <li>
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
                                    <h4>Data KEANGGOTAAN</h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{url('Keanggotaan/#TambahAnggota')}}"><i class="fa fa-plus-circle"></i>
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
                                        <th>Nama Keanggotaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->keanggotaan}}</td>
                                        <td>
                                            <a href="/Keanggotaan/ubah{{$item->idkeanggotaan}}#UbahKeanggotaan"
                                                class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="/keanggotaan/hapus{{$item->idkeanggotaan}} "
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Anda yakin mau menghapus Keanggotaan ini ?')">
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
                    <div class="card card-success card-outline" id="TambahKeanggotaan">
                        <div class="card-header">
                            <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Keanggotaan/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Keanggotaan</label>
                                    <input type="text" class="form-control" id="keanggotaan" name="keanggotaan"
                                        placeholder="Keanggotaan">
                                    @if ($errors->has('keanggotaan'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('keanggotaan') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona1">Range Zona I</label>
                                            <input type="text" class="form-control" id="zona1" name="zona1"
                                                placeholder="Range Zona I"></input>
                                            @if ($errors->has('zona1'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona1') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona1mulai">Dari</label>
                                            <input type="number" class="form-control" id="zona1mulai" name="zona1mulai"
                                                placeholder=""></input>
                                            @if ($errors->has('zona1mulai'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona1mualai') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="zona1akhir">%sd</label>
                                            <input type="number" class="form-control" id="zona1akhir" name="zona1akhir"
                                                placeholder=""></input>
                                            @if ($errors->has('zona1akhir'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona1akhir') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona2">Range Zona II</label>
                                            <input type="text" class="form-control" id="zona2" name="zona2"
                                                placeholder="Range Zona II"></input>
                                            @if ($errors->has('zona2'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona2') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona2mulai">Dari</label>
                                            <input type="number" class="form-control" id="zona2mulai" name="zona2mulai"
                                                placeholder=""></input>
                                            @if ($errors->has('zona2mulai'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona2mualai') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona2akhir">%sd</label>
                                            <input type="number" class="form-control" id="zona2akhir" name="zona2akhir"
                                                placeholder=""></input>
                                            @if ($errors->has('zona2akhir'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona2akhir') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona3">Range Zona III</label>
                                            <input type="text" class="form-control" id="zona3" name="zona3"
                                                placeholder="Range Zona III"></input>
                                            @if ($errors->has('zona3'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona3') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona3mulai">Dari</label>
                                            <input type="number" class="form-control" id="zona3mulai" name="zona3mulai"
                                                placeholder=""></input>
                                            @if ($errors->has('zona3mulai'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona3mualai') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zona3akhir">%sd</label>
                                            <input type="number" class="form-control" id="zona3akhir" name="zona3akhir"
                                                placeholder=""></input>
                                            @if ($errors->has('zona3akhir'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('zona3akhir') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
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
                    <div class="card card-primary card-outline" id="UbahKeanggotaan">
                        <div class="card-header">
                            <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Keanggotaan/update'.$ubah->idkeanggotaan)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Keanggotaan</label>
                                    <input type="text" class="form-control" id="keanggotaan" name="keanggotaan"
                                        placeholder="Keanggotaan" value="{{$ubah->keanggotaan}}">
                                    @if ($errors->has('keanggotaan'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('keanggotaan') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona1">Range Zona I</label>
                                    <input type="text" class="form-control" id="zona1" name="zona1"
                                        placeholder="Range Zona I" value="{{$ubah->zona1}}"></input>
                                    @if ($errors->has('zona1'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona1') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona1mulai">Dari</label>
                                    <input type="number" class="form-control" id="zona1mulai" name="zona1mulai"
                                        placeholder="" value="{{$ubah->zona1mulai}}"></input>
                                    @if ($errors->has('zona1mulai'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona1mualai') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona1akhir">%sd</label>
                                    <input type="number" class="form-control" id="zona1akhir" name="zona1akhir"
                                        placeholder="" value="{{$ubah->zona1akhir}}"></input>
                                    @if ($errors->has('zona1akhir'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona1akhir') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona2">Range Zona II</label>
                                    <input type="text" class="form-control" id="zona2" name="zona2"
                                        placeholder="Range Zona II" value="{{$ubah->zona2}}"></input>
                                    @if ($errors->has('zona2'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona2') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona2mulai">Dari</label>
                                    <input type="number" class="form-control" id="zona2mulai" name="zona2mulai"
                                        placeholder="" value="{{$ubah->zona2mulai}}"></input>
                                    @if ($errors->has('zona2mulai'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona2mualai') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona2akhir">%sd</label>
                                    <input type="number" class="form-control" id="zona2akhir" name="zona2akhir"
                                        placeholder="" value="{{$ubah->zona2akhir}}"></input>
                                    @if ($errors->has('zona2akhir'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona2akhir') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona3">Range Zona III</label>
                                    <input type="text" class="form-control" id="zona3" name="zona3"
                                        placeholder="Range Zona III" value="{{$ubah->zona3}}"></input>
                                    @if ($errors->has('zona3'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona3') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona3mulai">Dari</label>
                                    <input type="number" class="form-control" id="zona3mulai" name="zona3mulai"
                                        placeholder="" value="{{$ubah->zona3mulai}}"></input>
                                    @if ($errors->has('zona3mulai'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona3mualai') }}</p>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="zona3akhir">%sd</label>
                                    <input type="number" class="form-control" id="zona3akhir" name="zona3akhir"
                                        placeholder="" value="{{$ubah->zona3akhir}}"></input>
                                    @if ($errors->has('zona3akhir'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('zona3akhir') }}</p>
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