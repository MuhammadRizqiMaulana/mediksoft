@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Tarif Dokter Poli</h4>
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

    <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <a class="btn btn-outline-success btn-sm" href="{{url('DokterPoli/#TambahDokterPoli')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama Poli</th>
                    <th>Nama Dokter</th>
                    <th>Tarif</th>
                    <th>E-Klaim BPJS</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->Poliklinik->nama}}</td>
                      <td>{{$item->Dokter->nama}}</td>
                      <td>{{$item->tarif}}</td>
                      <td>{{$item->Eklaimbpjs->nama}}</td>
                      <td>
                        <a href="/DokterPoli/ubah{{$item->kodepoli}}#UbahDokterPoli" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/DokterPoli/hapus{{$item->kodepoli}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
                <div class="card card-success card-outline" id="TambahDokterPoli">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/DokterPoli/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kelas">Nama Poli</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="kodepoli" name="kodepoli" placeholder="Kode Poli" hidden>
                            <input type="text" class="form-control" id="namapoli" name="namapoli" placeholder="Nama Poli" readonly>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-poliklinik">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('kodepoli'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodepoli') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="kelas">Nama Dokter</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="iddokter" name="iddokter" placeholder="Kode Dokter" hidden>
                            <input type="text" class="form-control" id="namadokter" name="namadokter" placeholder="Nama Dokter" readonly>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('iddokter'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('iddokter') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="tarif">Tarif</label>
                        <input type="number" class="form-control" id="tarif" name="tarif" placeholder="tarif" min="0" readonly>
                          @if ($errors->has('tarif'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('tarif') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label for="untukrs">Untuk Rumah Sakit</label>
                            <input type="number" class="form-control" id="untukrs" name="untukrs" placeholder="Untuk RS" min="0" oninput="tambahtarif()">
                          </div>
                          <div class="col">
                            <label for="untukdokter">Untuk Dokter</label>
                            <input type="number" class="form-control" id="untukdokter"  name="untukdokter" placeholder="Untuk Dokter" oninput="tambahtarif()" min="0">
                          </div>
                        </div>
                          @if ($errors->has('untukrs'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('untukrs') }}</p></span>
                          @endif
                          @if ($errors->has('untukdokter'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('untukdokter') }}</p></span>
                          @endif
                      </div>

                      <!-- select -->
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
                <div class="card card-primary card-outline" id="UbahDokterPoli">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/DokterPoli/update'.$ubah->kodepoli)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kelas">Nama Poli</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="kodepoli" name="kodepoli" placeholder="Kode Poli" value="{{$ubah->kodepoli}}" hidden>
                            <input type="text" class="form-control" id="namapoli" name="namapoli" placeholder="Nama Poli" value="{{$ubah->Poliklinik->nama}}" readonly>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-poliklinik">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('kodepoli'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodepoli') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="kelas">Nama Dokter</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="iddokter" name="iddokter" placeholder="Kode Dokter" value="{{$ubah->iddokter}}" hidden>
                            <input type="text" class="form-control" id="namadokter" name="namadokter" placeholder="Nama Dokter" value="{{$ubah->Dokter->nama}}" readonly>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('iddokter'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('iddokter') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="tarif">Tarif</label>
                        <input type="number" class="form-control" id="tarif"  name="tarif" placeholder="tarif" min="0" value="{{$ubah->tarif}}" readonly>
                          @if ($errors->has('tarif'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('tarif') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label for="untukrs">Untuk Rumah Sakit</label>
                            <input type="number" class="form-control" id="untukrs"  name="untukrs" placeholder="Untuk RS" value="{{$ubah->untukrs}}" min="0" oninput="tambahtarif()">
                          </div>
                          <div class="col">
                            <label for="untukdokter">Untuk Dokter</label>
                            <input type="number" class="form-control" id="untukdokter"  name="untukdokter" placeholder="Untuk Dokter" value="{{$ubah->untukdokter}}" min="0" oninput="tambahtarif()">
                          </div>
                        </div>
                          @if ($errors->has('untukrs'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('untukrs') }}</p></span>
                          @endif
                          @if ($errors->has('untukdokter'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('untukdokter') }}</p></span>
                          @endif
                      </div>

                      <!-- select -->
                        <div class="form-group">
                          <label>E-Klaim BPJS</label>
                          <div class="row">
                            <div class="col-10">
                              <select class="form-control" width="100%" name="idklaim" id="eklaimbpjs">
                                @foreach ($eklaimbpjs as $item)
                                    <option value="{{$item->idklaim}}" {{ ($item->idklaim == $ubah->idklaim) ? 'selected' : ''}}>{{$item->nama}}</option>
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

<!-- Script Tarif Kalkulator -->
<script type="text/javascript">
  function tambahtarif(){
    var angka1=parseFloat(document.getElementById('untukrs').value);
    var angka2=parseFloat(document.getElementById('untukdokter').value);
    var hasil= angka1+angka2;
    document.getElementById('tarif').value=hasil;
  }
</script>
<!-- /.Script Tarif Kalkulator -->

<!-- Script Modal -->
<script type="text/javascript">
  function eklaimbpjs($idklaim){
    document.getElementById("eklaimbpjs").value = $idklaim;
    $(".close").click();
  }

  function poliklinik($kode,$nama){
    document.getElementById('kodepoli').value = $kode;
    document.getElementById('namapoli').value = $nama;
    $(".close").click();
  } 

  function dokter($iddokter,$namadokter){
    document.getElementById('iddokter').value = $iddokter;
    document.getElementById('namadokter').value = $namadokter;
    $(".close").click();
  }
</script>
<!-- /.Script Modal -->

@endsection