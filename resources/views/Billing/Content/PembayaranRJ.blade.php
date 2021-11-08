@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Billing.Layout.menu')
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
        <li>{{ $error }}</li>
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
                                    <h4 class="fas fa-user-nurse"> Data Pembayaran Rawat Jalan</h4>
                                </div>
                                
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO Bayar Rawat Jalan</th>
                                        <th>Tanggal</th>
                                        <th>Norm</th>
                                        <th>Nama pembayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                    <tr>
                                        <td>{{$item->nobayar_rjalan}}</td>
                                        <td>{{$item->taggal}}</td>
                                        <td>{{$item->norm}}</td>
                                        <td>{{$item->namapembayar}}</td>
                                        <td>{{$item->tanggalbayar}}</td>
                                        
                                    </tr>
                                    @endforeach

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-5">
                    
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="TambahDokter">
                        <div class="card-header">
                            
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Dokter/store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <h3>Tagihan</h3>
                                <div class="form-group">
                                    <label for="nama">Nomor Tagihan</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="" name=""
                                            placeholder="Nomor Tagihan">
                                        </div>
                                        <div class="col-2 text-right">
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                                          <i class="fa fa-search"></i>
                                        </button>
                                      </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col">
                                        <label>Nomor Tagihan</label>
                                        <input type="text" name="" class="form-control" placeholder="Nomor Tagihan"> 
                                      </div>
                                      <div class="col">
                                        <label>NO. RM</label>
                                        <input type="text" name="" class="form-control" placeholder="NO. RM">
                                      </div>
                                      <div class="col">
                                        <label>Nama Pasien</label>
                                        <div class="form-check">
                                         <input type="text" name="" class="form-control" placeholder="Nama Pasien">
                                        </div>
                                      </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col">
                                        <label>Total Tagihan</label>
                                        <input type="text" name="" class="form-control" placeholder="Total Tagihan"> 
                                      </div>
                                      <div class="col">
                                        <label>Pembayaran</label>
                                        <input type="text" name="" class="form-control" placeholder="Pembayaran">
                                      </div>
                                      <div class="col">
                                        <label>Jumlah Bayar</label>
                                        <div class="form-check">
                                         <input type="text" name="" class="form-control" placeholder="Jumlah Bayar">
                                        </div>
                                      </div>
                                    </div>
                                    </div>

                                <h3>Pembayaran</h3>
                                <div class="form-group">
                                    <div class="row">
                                      <div class="col">
                                        <label>Tanggal</label>
                                        <input type="date" name="" class="form-control" placeholder="Tanggal"> 
                                      </div>
                                      <div class="col">
                                        <label>Metode Pembayaran</label>
                                        <select class="form-control" width="100%" name="" id="">
                              
                                            <option >1</option>
                                            <option >2</option>
                                            <option >3</option>
                            
                                        </select>
                                      </div>
                                      <div class="col">
                                       <label>Bank</label>
                                        <select class="form-control" width="100%" name="" id="">
                              
                                            <option >1</option>
                                            <option >2</option>
                                            <option >3</option>
                            
                                        </select>
                                      </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="nama">Nomor Referensi</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="" name=""
                                            placeholder="Nomor Referensi" readonly>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="nama">Nama Pembayar</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="" name=""
                                            placeholder="Nama Pembayar" >
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col">
                                        <label>Ambil Dari Deposit</label>
                                        <input type="text" name="" class="form-control" placeholder="Ambil Dari Deposit"> 
                                      </div>
                                      <div class="col">
                                        <label>Uang Bayar</label>
                                        <input type="text" name="" class="form-control" placeholder="Uang Bayar">
                                      </div>
                                      <div class="col">
                                        <label>Kembalian</label>
                                        <div class="form-check">
                                         <input type="text" name="" class="form-control" placeholder="Kembalian" readonly>
                                        </div>
                                      </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="nama">Kasir</label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="" name=""
                                            placeholder="Kasir">
                                        </div>
                                        <div class="col-2 text-right">
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                                          <i class="fa fa-search"></i>
                                        </button>
                                      </div>
                                    </div>
                                </div>



                             
                        </div>


                            <!-- /.card-body -->
                    <div class="card-footer text-right">
                        <div class="row">
                         <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="" name="">
                              <label for="nama">Cetak kwetansi</label>
                            </div>
                         </div>
                      <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check"> Simpan</i></button>
                      <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times">Batal</i></button>
                    </div>

                        </form>
                    </div>         

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