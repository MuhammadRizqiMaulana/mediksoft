@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Pelayanan Rawat Jalan</h4>
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
        <div class="card">
          <div class="card-header">
            <div class="row">
              <!-- Form Atas Kolom 1-->
              <div class="col ml-2 mr-2">
                <div class="row">

                  <div class="col-3 text-right">
                    <label>Faktur Rawat Jalan</label>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Faktur Rawat Jalan" readonly >
                  </div>
                  <div class="col-1">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Tanggal Masuk</label>
                  </div>
                  <div class="col-8">
                    <input type="date" class="form-control" placeholder="Tanggal Masuk" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>No.RM / Nama</label>
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Nomor RM" readonly >
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" placeholder="Nama" readonly >
                  </div>
                </div>

              </div>
              <!-- Form Atas Kolom 2-->
              <div class="col ml-2 mr-2">
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Poliklinik</label>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Poliklinik" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Dokter</label>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Dokter" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Tgl Pelayanan</label>
                  </div>
                  <div class="col-8">
                    <input type="date" class="form-control" placeholder="Tanggal Pelayanan" readonly >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <label>TINDAKAN POLIKLINIK</label>
            </div>
            <div class="row">
              <span class="text-danger">* khusus untuk pemeriksaan lab/rad tanpa melalui pendaftaran, pilih transaksi laboratorium / radiologi</span>
            </div>
            <br>
            <div class="row">
              <div class="col-3">
                <h6>Transaksi</h6>
                <select name="transaksi" class="form-control" disabled>
                  <option value="" selected>Poliklinik</option>
                </select>
                <div class="row">
                  <div class="col">Jumlah </div>
                  <div class="col"><input type="number" class="form-control" value="1" min="1"></div>
                </div>
              </div>
              <div class="col-3">
                <h6>Kode [F1]</h6>
                <input type="text" class="form-control">
                <div class="row">
                  <div class="col">Tarif </div>
                  <div class="col"><input type="number" class="form-control" value="1" min="0"></div>
                </div>
              </div>
              <div class="col-6">
                <h6>Nama Tindakan</h6>
                <input type="text" class="form-control">
                <button type="submit" class="btn btn-outline-success"><i
                  class="fa fa-plus-circle"></i> Simpan
                </button>
              </div>
            </div>

            <br>
            <hr>

            <!-- Tabel -->
            <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Tindakan</th>
                          <th>Jumlah</th>
                          <th>Tarif</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>0.00</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  
                </div>
                
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-header">
                    Tenaga Medis
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Nama</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col"><span class="text-danger">qwerty</span></div>
              <div class="col text-right">
                <button type="submit" class="btn btn-outline-primary"><i
                  class="fa fa-save"></i> Simpan
                </button>
                <button type="reset" class="btn btn-outline-danger"><i
                  class="fa fa-times"></i> Batal
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection