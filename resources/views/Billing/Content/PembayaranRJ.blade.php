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
            <div class="row d-flex justify-content-center">
            
               
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
                                    
                                      
                                      <div class="col">
                                        <label>NO. RM</label>
                                        <input type="text" name="" class="form-control" placeholder="NO. RM">
                                      </div>
                                     
                                   

                                    </div>

                                     <div class="form-group">

                                        <label>Nama Pasien</label>
                                    
                                         <input type="text" name="" class="form-control" placeholder="Nama Pasien">
                                        
                                      </div>

                                    
                                    
                                     <div class="form-group">
                                        <label>Total Tagihan</label>
                                        <input type="text" name="" class="form-control" placeholder="Total Tagihan"> 
                                      </div>
                                     <div class="form-group">
                                        <label>Pembayaran</label>
                                        <input type="text" name="" class="form-control" placeholder="Pembayaran">
                                      </div>
                                      <div class="form-group">
                                        <label>Jumlah Bayar</label>
                                       
                                         <input type="text" name="" class="form-control" placeholder="Jumlah Bayar">
                                       
                                      </div>
                                    
                                    

                                <h3>Pembayaran</h3>
                                <div class="form-group">
                                   
                                      <div class="col-4">
                                        <label>Tanggal</label>
                                        <input type="date" name="" class="form-control" placeholder="Tanggal"> 
                                      </div>
                                     <div class="form-group">
                                        <label>Metode Pembayaran</label>
                                        <select class="form-control" width="100%" name="" id="">
                              
                                            <option >Cash</option>
                                            <option >Debit</option>
                                            <option >Credit</option>
                            
                                        </select>
                                      </div>
                                      <div class="form-group">
                                       <label>Bank</label>
                                        <select class="form-control" width="100%" name="" id="">
                              
                                            <option >1</option>
                                            <option >2</option>
                                            <option >3</option>
                            
                                        </select>
                                      </div>
                                    
                                    </div>

                                     <div class="form-group">
                                        <label>Nomor referensi Tagihan</label>
                                        <input type="text" name="" class="form-control" placeholder="Total Tagihan"> 
                                      </div>
                                     <div class="form-group">
                                        <label>Nama Pembayaran</label>
                                        <input type="text" name="" class="form-control" placeholder="Pembayaran">
                                      </div>
                                     

                                     <div class="form-group">
                                        <label>Ambil Deposit</label>
                                        <input type="text" name="" class="form-control" placeholder="Ambil Deposit"> 
                                      </div>
                                     <div class="form-group">
                                        <label>Uang Bayar</label>
                                        <input type="text" name="" class="form-control" placeholder="Uang Bayar">
                                      </div>
                                      <div class="form-group">
                                        <label>Kembalian</label>
                                       
                                         <input type="text" name="" class="form-control" placeholder="Kembalian">
                                       
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