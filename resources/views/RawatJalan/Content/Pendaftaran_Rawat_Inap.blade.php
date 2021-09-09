@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Pendataran Rawat Inap</h4>
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
          <div class="card-body">
            <div class="row">
                <div class="col-3">
                  <h6>Rawat Jalan</h6>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control" placeholder="Rawat Jalan" readonly >
                </div>
                <div class="col-1 text-right">
                  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                  <h6>Nomor Rekam Medis</h6>
                  <input type="text" class="form-control" placeholder="Nomor Rekam Medis" readonly >
                </div>
                <div class="col-4">
                  <h6>Pasien</h6>
                  <input type="text" class="form-control" placeholder="Nama Pasien" readonly >
                </div>
                <div class="col-4">
                  <h6>Tanggal Masuk</h6>
                  <input type="date" class="form-control" placeholder="Tanggal Masuk" readonly >                 
                </div>
                <div class="col-1 align-self-end text-right">
                  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                  <h6>Kode Kamar</h6>
                  <input type="text" class="form-control" placeholder="Kode Kamar" readonly >
                </div>
                <div class="col">
                  <h6>Kamar</h6>
                  <input type="text" class="form-control" placeholder="Kamar" readonly >                 
                </div>
                <div class="col">
                  <h6>Kelas</h6>
                  <input type="text" class="form-control" placeholder="Kelas" readonly >                                  
                </div>
                <div class="col-3">
                  <h6>Ruang</h6>
                  <input type="text" class="form-control" placeholder="Ruang" readonly >                  
                </div>
                <div class="col-1 text-right align-self-end">
                  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
                <h6>Macam Rawat</h6>
                <select class="form-control">
                  <option value="">Pilih Macam Rawat</option>
                  <option value="">Pilih Macam Rawat</option>
                </select>
              </div>
              <div class="col">
                <h6>Perusahaan / jaminan</h6>
                <input type="text" class="form-control" placeholder="Perusahaan / jaminan" readonly >
              </div>
              <div class="col-1 text-right align-self-end">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
                <h6>Cara Masuk</h6>
                <select class="form-control">
                  <option value="">Pilih Cara Masuk</option>
                  <option value="">Pilih Cara Masuk</option>
                </select>
              </div>
              <div class="col">
                <h6>Dokter Penanggung Jawab</h6>
                <input type="text" class="form-control" placeholder="Perusahaan / jaminan" readonly >
              </div>
              <div class="col-1 text-right align-self-end">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
                <h6>Diagnosa Awal</h6>
                <input type="text" class="form-control" placeholder="Diagnosa Awal">
              </div>
              <div class="col-1 text-right align-self-end">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
                <h6>Penanggung Jawab</h6>
                <input type="text" class="form-control" placeholder="Penanggung Jawab">
              </div>
              <div class="col">
                <h6>Hubungan Penanggung Jawab</h6>
                <input type="text" class="form-control" placeholder="Hubungan Penanggung Jawab">
              </div>
              <div class="col">
                <h6>Telp Penanggung Jawab</h6>
                <input type="text" class="form-control" placeholder="Telp Penanggung Jawab">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
                <h6>Alamat Penanggung Jawab</h6>
                <input type="text" class="form-control" placeholder="Alamat Penanggung Jawab">
              </div>
              <div class="col-4">
                <h6>Biaya Administrasi</h6>
                <input type="text" class="form-control" placeholder="Biaya Administrasi">
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