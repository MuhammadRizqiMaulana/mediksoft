@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Billing.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center mb-4">
        <img src="{{asset('images/icon/tagihanrj.png')}}">
        <h4 class="mb-0 text-gray-800">Rekening Rawat Inap</h4>
      </div>
    </div>

   
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <form action="{{url('/Tagihan_RJ/store')}}" method="post"> 
          {{csrf_field()}} 
          <div class="card-body">
            <div class="row">
                <div class="col-4">
                  <!-- general form elements -->
                  <div class="card">
                    <div class="card-body">
                        
                      <!-- form start -->
                        <div class="form-group row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Tgl Tagihan</label>
                          <div class="col-sm-8">
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime" value="{{ date('d/m/Y H.i') }}"/>
                              <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="norm" class="col-sm-4 col-form-label text-right">No. Rawat Inap</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder="NO RM" value="" readonly>
                          </div>
                          <div class="col-sm-1">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-pasien">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <hr>
                        <h5>INFORMASI RAWAT INAP</h5>
                        <div class="form-group row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Tgl Masuk</label>
                          <div class="col-sm-8">
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime" value="{{ date('d/m/Y H.i') }}"/>
                              <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Tgl Keluar</label>
                          <div class="col-sm-8">
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime" value="{{ date('d/m/Y H.i') }}"/>
                              <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                        
                        
                    </div>
                    <!-- /.card-body -->
                  
                  </div>
                  <!-- /.card -->
                  </div>

                <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <hr>
                       
                        <hr>
                         <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">NO RM / Nama Pasien</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" readonly>
                          </div>
                         
                           <div class="col-sm-6">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" readonly>
                          </div>
                          </div>
                           </div>
                        </div>
                        </div>

                        <hr>
                        <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Jaminan</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" readonly>
                          </div>
                          
                          <label class="col-sm-1 col-form-label text-right">Kasir</label>  
                            <div class="col">                                             
                             <input type="text" class="form-control" id="" name=""
                                            placeholder="Kasir">
                                 </div>
                               <div class="col-1 text-right">
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                                          <i class="fa fa-search"></i>
                                        </button>
                               </div>
                                  
                                  </div>
                         </div>

                         <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Kamar / Ruang</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" readonly>
                          </div>
                 
                              <div class="col-2 text-right">
                              <button >Proses</button>
                               </div>
                             <div class="col">                                            
                             <input type="text" class="form-control" id="" name=""
                                            placeholder="">
                            </div>
                                  
                         </div>
                         </div>
                          


                      </div>
                    </div>
                  </div>
                </div>
                <!--/.CARD-->
              </div>
              <!--/CARD-BODY-->
              <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <table class="table table-bordered table-hover">
                           <thead>
                          <tr>
                            <th>      Nama Transaksi         </th>
                            <th> Jumlah</th>
                            <th>Biaya</th>
                            <th>Subtotal</th>
                          </thead>

                          <tbody>
                            
                          </tbody>
                        </table>
                        
                      </div>
                      
                    </div>

                  </div>
                  <!--/card-body-->
                </div>
                <!--/card-->
                </div>

                 <div class="card-body">
            <div class="row">
                <div class="col-4">
                  <!-- general form elements -->
                  <div class="card">
                    <div class="card-body">
                        
                      <!-- form start -->
                        <div class="form-group row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Memo</label>
                          <div class="col-sm-8">
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                              <textarea class="form-control" rows="3" maxlength="1000" id="catatan" name="catatan" placeholder="Catatan"></textarea>
                             
                            </div>
                          </div>
                        </div>
                       
                       
                      
                        
                        
                    </div>
                    <!-- /.card-body -->
                  
                  </div>
                  <!-- /.card -->
                  </div>

                <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                         <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Administrasi</label>
                          <div class="col">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" >
                          </div>
                          </div>
                           </div>
                        </div>
                        </div>

                        <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Subtotal</label>
                          <div class="col">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" readonly>
                          </div>
                          </div>
                           </div>

                       
                        <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Disk.Persen</label>
                          <div class="col-3">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" >
                          </div>
                          
                          <label class="col-sm-1 col-form-label text-right">%</label>  
                            <div class="col-2">                                             
                             <input type="text" class="form-control" id="" name="" placeholder="">
                             </div>
                              
                                  
                           </div>
                         </div>

                          <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Disk Nilai</label>
                          <div class="col">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" >
                          </div>
                          </div>
                           </div>

                          <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Pembulatan</label>
                          <div class="col-3">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" >
                          </div>
                          
                          <label class="col-sm-1 col-form-label text-right">+</label>  
                            <div class="col-2">                                             
                             <input type="text" class="form-control" id="" name="" placeholder="">
                             </div>
                              
                                  
                           </div>
                         </div>

                         <div class="form-group ">
                          <div class="row">
                          <label for="tanggal" class="col-sm-4 col-form-label text-right">Total Tagihan</label>
                          <div class="col">
                            <input type="text" class="form-control" id="norm" name="norm" placeholder=" " value="" readonly >
                          </div>
                          </div>
                           </div>

                         
                      </div>
                    </div>
                  </div>
                </div>
                <!--/.CARD-->
              </div>
              
                
             
            <div class="card-footer text-right">
            <button class="btn btn-outline-dark" type="button"><i class=" "></i>Perawatan</button>   
            <button class="btn btn-outline-success" type="button"><i class="fas fa-arrow-right"></i>Status Pulang</button>  
            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-print"></i> Nota Sementara</button>
            <button class="btn btn-outline-primary" type="button"><i class="fa fa-save"></i> Buat Tagihan</button>
            <button class="btn btn-outline-danger" type="button"><i class="fa fa-times"></i> Batal</button>

             </div>
           



                
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>

             
          

  

@endsection