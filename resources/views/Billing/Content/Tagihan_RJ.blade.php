@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <img src="{{asset('images/icon/tagihanrj.png')}}">
        <h4 class="mb-0 text-gray-800">Simpan</h4>
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
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <!-- general form elements -->
            <div class="card" id="">
              <!-- /.card-header -->
              <div class="card-body">
              <!-- form start -->
                <form action="" method="post">
                  {{csrf_field()}}
                  <div class="form-group row">
                    <label for="tanggal" class="col-sm-4 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-8">
                      <input type="datetime-local" class="form-control" id="tanggal" placeholder="Tanggal sekarang">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="norm" class="col-sm-4 col-form-label text-right">No. RM</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="norm" placeholder="NO RM">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pasien" class="col-sm-4 col-form-label text-right">Pasien</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="pasien" placeholder="Pasien">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="statuspulang" class="col-sm-4 col-form-label text-right">Status Pulang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="statuspulang" placeholder="Status Pulang">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kasir" class="col-sm-4 col-form-label text-right">Kasir</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kasir" placeholder="Kasir">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" id="catatan" placeholder="Catatan"></textarea>
                  </div>
                  <hr>
                  <div class="form-group text-center">
                    <a class="btn btn-app" href="">
                      <i class="fas fa-edit"></i> Pelayanan Poli
                    </a>
                    <button class="btn btn-default text-center">
                      <a class="users-list-name" href="">
                        <img src="{{asset('images/icon/tagihanrj.png')}}"><br>
                        Buat Tagihan</a>
                    </button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-8">
            <div class="card">
              
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th></th>
                    <th>Faktur Rawat Jalan</th>
                    <th>Tanggal</th>
                    <th>Poliklinik</th>
                    <th>Dokter</th>
                    <th>Perusahaan/Jaminan</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                    $no=1;   
                  @endphp
                  <tr>
                    <td></td>
                    <td><input type="checkbox"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  </tbody>               
                </table>
                <br>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>No Transaksi</th>
                      <th>Transaksi</th>
                      <th>Tarif</th>
                      <th>Jumlah</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php
                        $no=1;   
                      @endphp
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>  
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tfoot> 
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