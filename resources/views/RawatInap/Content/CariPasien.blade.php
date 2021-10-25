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
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4>Cari Pasien</h4>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Rawat Inap</th>
                                        <th>No RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Kamar</th>
                                        <th>Kelas</th>
                                        <th>Ruang</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Status Pulang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($rawatinap as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->faktur_rawatinap}}</td>
                                        <td>{{$item->norm}}</td>
                                        <td>{{$item->Pasien->namapasien}}</td>
                                        <td>{{$item->Kamar->kodekamar}}</td>
                                        <td>{{$item->Kelas}}</td>
                                        <td>{{$item->Ruang}}</td>
                                        <td>{{$item->Pasien->jeniskelamin}}</td>
                                        <td>{{$item->Perusahaan->namaprsh}}</td>
                                        <td>{{$item->Pasien->alamat}}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection