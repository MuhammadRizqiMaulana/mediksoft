@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h4>Data Dokter Visite</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{url('DokterVisit/#TambahDokterVisit')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div> 
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>id Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Eklaim BPJS</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->Dokter->iddokter}}</td>
                      <td>{{$item->Dokter->nama}}</td>
                      <td>{{$item->Eklaimbpjs->nama}}</td>
                      <td>
                        <a href="/DokterVisit/ubah{{$item->iddokter}}#UbahFaskes" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/DokterVisit/hapus{{$item->iddokter}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                          <i class="fa fa-minus-circle"></i> Hapus
                        </a>

                      </td>
                    </tr>
                  @endforeach
                                   
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-4">
                @if(isset($ubah) == NULL)
                <!-- general form elements -->
                <div class="card card-success card-outline" id="TambahDokterVisit">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/DokterVisit/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="iddokter" id="dokter">
                              @foreach ($dokter as $item)
                                  <option value="{{$item->iddokter}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>

                          @if ($errors->has('nama'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">Tarif Visite</label>
                         
                              <table border="2">
                              <thead>
                              <tr>
                                <th style="text-align:center">Kelas</th>
                                <th style="text-align:center">Tarif</th>
                                <th style="text-align:center">Untuk Dokter</th>
                                <th style="text-align:center">Untuk Rumah Sakit</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($kelas as $item)
                                <tr>
                                  <td style="text-align:center">{{$item->nama}}</td>
                                  <td>{{$item->tarif}}
                                  <input type="number" class="form-control" id="tarif" name="tarif" placeholder="" min="0" ></td></td>
                                  <td>{{$item->untukdokter}}
                                    <input type="number" class="form-control" id="tarif" name="tarif" placeholder="" min="0" ></td>
                                  <td>{{$item->untukrs}}
                                  <input type="number" class="form-control" id="tarif" name="tarif" placeholder="" min="0" ></td></td>
                                  <td>

                                  </td>
                                </tr>
                              @endforeach
                                               
                            </table>
                      </div>
                      <div class="form-group">
                        <label>E-Klaim BPJS</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="idklaim" id="eklaimbpjs">
                              @foreach ($eklaimbpjs as $item)
                                  <option value="{{$item->idklaim}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-eklaimbpjs">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        @if ($errors->has('idklaim'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idklaim') }}</p></span>
                        @endif
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i></button>
                      <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
                  
              @else
                <!-- general form elements -->
                <div class="card card-primary card-outline" id="UbahFaskes">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Poli/update'.$ubah->kode)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="iddokter" id="dokter">
                              @foreach ($dokter as $item)
                                  <option value="{{$item->iddokter}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>

                          @if ($errors->has('nama'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">Tarif Visite</label>
                         
                              <table border="2">
                              <thead>
                              <tr>
                                <th style="text-align:center">Kelas</th>
                                <th style="text-align:center">Tarif</th>
                                <th style="text-align:center">Untuk Dokter</th>
                                <th style="text-align:center">Untuk Rumah Sakit</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($kelas as $item)
                                <tr>
                                  <td style="text-align:center">{{$item->nama}}</td>
                                  <td>{{$item->tarif}}
                                  <input type="number" class="form-control" id="tarif" name="tarif" placeholder="" min="0" ></td></td>
                                  <td>{{$item->untukdokter}}
                                    <input type="number" class="form-control" id="tarif" name="tarif" placeholder="" min="0" ></td>
                                  <td>{{$item->untukrs}}
                                  <input type="number" class="form-control" id="tarif" name="tarif" placeholder="" min="0" ></td></td>
                                  <td>

                                  </td>
                                </tr>
                              @endforeach
                                               
                            </table>
                      </div>
                      <div class="form-group">
                        <label>E-Klaim BPJS</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="idklaim" id="eklaimbpjs">
                              @foreach ($eklaimbpjs as $item)
                                  <option value="{{$item->idklaim}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-eklaimbpjs">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        @if ($errors->has('idklaim'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idklaim') }}</p></span>
                        @endif
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
                  
              @endif
            
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