@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
    <!-- /.menu -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengirim / Faskes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="card">
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode Faskes</th>
                    <th>Nama Faskes</th>
                    <th>Fee</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>

                  </tr>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- left column -->
          <div class="col-4">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-plus-circle"></i> Tambah</button>
                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i> Ubah</button>
                <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-minus-circle"></i> Hapus</button>
                <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Pengirim / Faskes</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Pengirim / Faskes">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" placeholder="Alamat"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="fee">Fee</label>
                    <input type="number" class="form-control" id="fee" placeholder="Fee" min="0">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check"></i></button>
                  <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection