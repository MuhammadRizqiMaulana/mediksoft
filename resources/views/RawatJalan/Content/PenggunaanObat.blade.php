@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Pendaftaran Rawat Jalan</h4>
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
                <form action="{{url('//')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                        
                        <div class="row">
                          <div class="col-12">
                            <select class="form-control" width="100%" name="idklaim" id="">
                              
                                  <option value="Pilih Laporan">Pilih Laporan</option>
                              
                            </select>
                          </div>
                          
                        </div>
                        @if ($errors->has(''))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('') }}</p></span>
                        @endif
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
                    
                  </div>

                  
                  <div class="row">
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-minus"></i></button></div>
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-primary"><i class="fas fa-calendar"></i> Hari ini</button></div>
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-plus"></i></button></div>
                  </div>

                  <div class="form-group">
                        <label>Dokter Jaga</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="idklaim" id="">
                              
                                  <option value=""> </option>
                              
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        @if ($errors->has(''))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('') }}</p></span>
                        @endif
                      </div>
                  <div class="row">
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-primary"></i> Pratinjau</button></div>
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-primary"></i> Layout</button></div>
                  </div>


                </form>
                <hr>

              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                
                
              </div>
              <div class="card-body">
                
                   
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