@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Ruang Perawatan</h4>
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
        <div class="card">
          <div class="card-header">
            <div class="row">
              <!-- Form Atas Kolom 1-->
              <div class="col ml-2 mr-2">
                <div class="row">

                  <div class="col-4 text-right">
                    <label>No Pendaftaran</label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="form-control" placeholder="No Pendaftaran" readonly >
                  </div>
                  <div class="col-1">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatinap">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 text-right">
                    <label>No.RM / Nama Pasien</label>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" placeholder="Nomor RM" readonly >
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" placeholder="Nama Pasien" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 text-right">
                    <label>Alamat</label>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Alamat" readonly >
                  </div>
                </div>

              </div>
              <!-- Form Atas Kolom 2-->
              <div class="col ml-2 mr-2">
                <div class="row">
                  <div class="col-4 text-right">
                    <label>Kamar / Ruang / Kelas</label>
                  </div>
                  <div class="col-2">
                    <input type="text" class="form-control" placeholder="Kamar" readonly >
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" placeholder="Ruang" readonly >
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" placeholder="Kelas" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 text-right">
                    <label>Dokter Utama</label>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Dokter Utama" readonly >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <label class="text-primary"><u>Transaksi / Tindakan Ruang Perawatan</u></label>
            </div>
            <div class="row">
              <div class="col-1">Jumlah </div>
              <div class="col-2"><input type="datetime-local" class="form-control"></div>
              <div class="col">
                <button type="button" onclick="tanggalsekarang();" class="btn btn-outline-success">
                  <i class="fas fa-sync"></i>
                </button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-3">
                <h6>Kategori Transaksi</h6>
                <select name="" class="form-control">
                  <option value="" ></option>
                </select>
                <div class="row">
                  <div class="col-3">Jumlah </div>
                  <div class="col"><input type="number" class="form-control" value="1" min="1"></div>
                </div>
              </div>
              <div class="col-3">
                <h6>Kode [F1]</h6>
                <input type="text" class="form-control">
                <div class="row">
                  <div class="col-3">Tarif </div>
                  <div class="col"><input type="number" class="form-control" value="1" min="0"></div>
                </div>
              </div>
              <div class="col-6">
                <h6>Nama Transaksi</h6>
                <input type="text" class="form-control">
                <button type="submit" class="btn btn-outline-success"><i
                  class="fa fa-plus-circle"></i> Tambah
                </button>
              </div>
            </div>

            <br>
            <hr>

            <!-- Tabel -->
            <div class="row">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Tgl Keluar Kamar</th>
                    <th>Nama Transaksi</th>
                    <th>Dokter</th>
                    <th>Jumlah</th>
                    <th>Tarif</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td></td>
                    <td></td>
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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection