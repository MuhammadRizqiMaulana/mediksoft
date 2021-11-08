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
                                    <h4>Administrasi</h4>
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
                                        <th>Jenis Poli</th>
                                        <th>Jenis Rawat</th>
                                        <th>Tarif</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adm as $item)
                                    <tr>
                                        <td>{{$item->jenispoli}}</td>
                                        <td>{{$item->jenisrawat}}</td>
                                        <td>{{$item->tarif}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info btn-sm"
                                                data-toggle="modal" data-target="#modal-ubahadm"
                                                onclick="ubahadm('{{$item->idadm}}','{{$item->jenispoli}}','{{$item->jenisrawat}}','{{$item->tarif}}')">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>

                                    </tr>
                                    @endforeach

                            </table>
                        </div>
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

<!-- modal form ubah-->
<div class="modal fade" id="modal-ubahadm">
    <div class="modal-dialog modal-lg">
        <form id="form-ubahadm" method="post">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Administrasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Jenis Poli</th>
                                <th>Jenis Rawat</th>
                                <th>Tarif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form>
                                <tr>
                                    <td><input type="text" id="ubahjenispoli" name="ubahjenispoli"
                                            class="form-control form-control-border" readonly></td>
                                    <td><input type="text" id="ubahjenisrawat" name="ubahjenisrawat"
                                            class="form-control form-control-border" readonly></td>
                                    <td>
                                        <input type="text" id="ubahtarif" name="ubahtarif"
                                            class="form-control form-control-border">
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-info"><i class="fa fa-save"></i> Simpan</button>
                    <button class="btn btn-outline-danger" type="button" data-dismiss="modal" aria-label="Close"><i
                            class="fa fa-minus-circle"></i> Batal</button>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </form>
    </div>
</div>
<!-- modal form ubah-->

<script>
function ubahadm($idadm, $jenispoli, $jenisrawat, $tarif) {
    $("#form-ubahadm").attr("action", "/Administrasi/update" + $idadm);
    document.getElementById("ubahjenispoli").value = $jenispoli;
    document.getElementById("ubahjenisrawat").value = $jenisrawat;
    document.getElementById("ubahtarif").value = $tarif;
}
</script>


@endsection