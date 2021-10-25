@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data INOS</h4>
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
        <div class="row">
          <div class="col-4">
            <!-- general form elements -->
            <div class="card card-success card-outline" id="TambahDataPendaftaran">
              <!-- /.card-header -->
              <div class="card-body">
              <!-- form start -->
                <form action="" method="post">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-9">
                      <div class="row">
                        <div class="col-4"><label>Dari</label></div>
                        <div class="col-8"><input type="date" class="form-control"> </div>
                      </div>
                      <div class="row">
                        <div class="col-4"><label>Sampai</label></div>
                        <div class="col-8"><input type="date" class="form-control"></div>
                      </div>
                    </div>
                    <div class="col-3">
                      <a class="btn btn-block btn-outline-info btn-lg" >
                          <i class="fas fa-filter"></i> Filter
                        </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-minus"></i></button></div>
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-primary"><i class="fas fa-calendar"></i> Bulan ini</button></div>
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-plus"></i></button></div>
                  </div>
                  <div class="row">
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-minus"></i></button></div>
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-primary"><i class="fas fa-calendar"></i> Hari ini</button></div>
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-plus"></i></button></div>
                  </div>
                </form>
                <hr>

                <div class="row">
                  <div class="col"><a class="btn btn-block btn-outline-success" href="{{url('/Data_Pendaftaran/tambah/#TambahPendaftaranRawatJalan')}}"><i class="fa fa-plus-circle"></i> Tambah</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-success "><i class="fa fa-plus-circle"></i> Lihat Detail</button></div>
                </div>
                
                <div class="row">                 
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-danger btn-sm"><i class="fa fa-minus-circle"></i> Hapus</button></div>
                     
                  <div class="col-6"><button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</button></div>
                </div>

                <br>
                <div class="row">
                 
                  <div class="col-6"><button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button></div>
                </div>
                
                  
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-8">
            <div class="card">
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Faktur</th>
                    <th rowspan="2">No RM</th>
                    <th rowspan="2">Nama Pasien</th>
                    <th rowspan="2">Umur(thn)</th>
                    <th rowspan="2">Kelas/Ruang</th>
                    <th rowspan="2">Diagnosa</th>
                    <th colspan="6">INOS</th>
                    <th rowspan="2">Keterangan</th>
                    
                  </tr>
                  <tr>
                    <th>ILO</th>
                    <th>ISK</th>
                    <th>PNEUMONI</th>
                    <th>SEPSIS</th>
                    <th>PLEBTIS</th>
                    <th>DICUBITIS</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                    $no=1;   
                  @endphp
                  
                                   
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
<script>
  function tombol($faktur_rawatjalan){
    $("a#tombolubah").attr("href", "/Data_Pendaftaran/ubah"+ $faktur_rawatjalan +"#UbahPendaftaranRawatJalan");
    $("a#tombollihat").attr("href", "/Data_Pendaftaran/lihat"+ $faktur_rawatjalan +"#LihatPendaftaranRawatJalan");
    $("a#tombolhapus").attr("href", "/Data_Pendaftaran/hapus"+ $faktur_rawatjalan);
    $("a#tombolrekammedisrj").attr("href", "/Rekam_Medis_Rawat_Jalan/index"+ $faktur_rawatjalan);
    $("option#tombolsuratketerangansehat").attr("value", "/Data_Pendaftaran/suratketerangansehat"+ $faktur_rawatjalan);
    $("option#tombolsuratketerangansakit").attr("value", "/Data_Pendaftaran/suratketerangansakit"+ $faktur_rawatjalan);
  }
</script>
@endsection