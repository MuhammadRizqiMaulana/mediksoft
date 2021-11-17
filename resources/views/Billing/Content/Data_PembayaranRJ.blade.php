@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Billing.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Pembayaran Rawat Jalan</h4>
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

                  <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="" name="">
                              <label for="nama">Sortir Berdasarkan Tanggal Bayar</label>
                             
                      </div>

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
                <div class="form-group">
                <div class="row">
                    <label>Dari Jam</label>
                    <input type="time" name=""> 
                     <label>sd</label>
                    <input type="time" name="">
                </div>
                </div>
                  <div class="form-group">
                   <label for="nama">Sortir</label>
                       <select class="form-control" width="100%" name="" id="">

                           
                            <option> 1</option>
                            <option> 1</option>
                            <option> 1</option>
                            <option> 1</option>         
                  </div>
                

                <div class="form-group">
                <div class="row">
                    <label>Dari Jam</label>
                    <input type="time" name=""> 
                     <label>sd</label>
                    <input type="time" name="">
                </div>
                </div>
                <hr>




                <div class="row">
                  <div class="col"><a class="btn btn-block btn-outline-success" href=" "><i class="fa fa-plus-circle"></i> Buat Tagihan</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-success "><i class="fa fa-plus-circle"></i> Bayar</button></div>
                </div>
                <div class="row">
                  <div class="col"><a class="btn btn-block btn-outline-success" href=" "><i class="fa fa-plus-circle"></i> Detai; Tagihan</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-success "><i class="fa fa-plus-circle"></i> Detail Bayar</button></div>
                </div>
                <div class="row">
                  <div class="col"><a class="btn btn-block btn-outline-success" href=""><i class="fa fa-plus-circle"></i> Hapus Tagihan</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-success "><i class="fa fa-plus-circle"></i>Hapus Bayar</button></div>
                </div>
                 <div class="row">
                  <div class="col"><a class="btn btn-block btn-outline-success" href=""><i class="fa fa-print"></i> Cetak Nota</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-success "><i class="fa fa-print"></i>Cetak Kwetansi</button></div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="col"><a class="btn btn-block btn-outline-success" href=""><i class="fa fa-print"></i> Cetak data tagihan RJ</a></div>
                
                  <div class="col"><a class="btn btn-block btn-outline-success" href=""><i class="fa fa-print"></i> Layout data tagihan RJ</a></div>
                
                  <div class="col"><a class="btn btn-block btn-outline-success" href=""><i class="fa fa-print"></i> Cetak data rincian RJ</a></div>
                
                  <div class="col"><a class="btn btn-block btn-outline-success" href=""><i class="fa fa-print"></i> Layout data rincian RJ</a></div>
               
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
                    <th rowspan="2">No Bayar</th>
                    <th colspan="2">Tanggal</th>
                    <th rowspan="2">No RM</th>
                    <th rowspan="2">Nama Pasien</th>
                    <th rowspan="2">Perusahaan/Jaminan</th>
                    <th rowspan="2">Disk</th>
                    <th rowspan="2">+/-Disk</th>
                    <th rowspan="6">Tagihan</th>
                    <th rowspan="2">Pembulatan Bayar</th>
                    <th rowspan="2">Di Bayar</th>
                    
                  </tr>
                  <tr>
                    <th>Tagihan</th>
                    <th>Bayar</th>
                  
                  </tr>
                 </thead>
                 <tbody>
                   @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->nobayar_rjalan}}</td>
                                        <td>{{$item->tanggal}}</td>
                                        <td>{{$item->norm}}</td>
                                        <td>{{$item->namapembayar}}</td>
                                        <td>{{$item->diskonpersen}}</td>
                                        <td>{{$item->diskonnilai}}</td>
                                        <td>{{$item->tagihan}}</td>
                                        <td>{{$item->pembulatan}}</td>
                                        <td>{{$item->bayar}}</td>
                                        
                                        <td></td>
                                    </tr>
                                    <tr>
                                      <td>{{$item->tagihan}}</td>
                                      <td>{{$item->tanggalbayar}}</td>
                                    </tr>
                                    @endforeach
                 </tbody>
                                   
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