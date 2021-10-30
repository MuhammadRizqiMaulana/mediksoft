@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Tarif Tindakan Inap</h4>
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
    @if(\Session::has('alert-danger'))
      <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h6><i class="fas fa-sign-out-alt"></i><b> Gagal!!</b></h6>
          {{Session::get('alert-danger')}}
      </div>
    @endif

    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}<li>
      @endforeach
    </ul>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-7">
            <div class="card">                 
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Kategori</th>
                      <th>Nama Tindakan</th>
                      <th>Eklaim BPJS</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr onclick="tombol('{{$item->idtindakan}}')">
                      <td>{{$item->Kategoritransaksi->kategori}}</td>
                      <td>{{$item->namatindakan}}</td>
                      <td>{{$item->Eklaimbpjs->nama}}</td>
                      <td>
                        <button class="btn btn-outline-info btn-sm" onclick="tombol('{{$item->idtindakan}}')">
                          <i class="fa fa-check"></i> Pilih
                        </button>
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
          <div class="col-5">
                @if(isset($ubah) == NULL)
                <!-- general form elements -->
                <div class="card card-success card-outline" id="TambahDokterVisit">
                  <div class="card-header">
                    <div class="row">
                      <div class="col">
                        <a class="btn btn-outline-success btn-block btn-sm" href="{{url('TindakanInap/#TambahTindakanInap')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                      </div>
                      <div class="col">
                        <a href="javascript:alert('Pilih baris data yang akan diubah!');" id="tombolubah" class="btn btn-outline-info btn-block btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                      </div>
                      <div class="col">
                        <a href="javascript:alert('Pilih baris data yang akan diubah!');" id="tombolhapus" class="btn btn-outline-danger btn-block btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                          <i class="fa fa-minus-circle"></i> Hapus
                        </a>
                      </div>
                      <div class="col">
                        <button type="button" class="btn btn-outline-secondary btn-block btn-sm"><i class="fa fa-print"></i> Cetak</button>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/TindakanInap/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kode">Kode Kategori</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="kodekategori" id="kategoritransaksi">
                              <option value="">Silahkan Pilih Kategori</option>
                              @foreach ($kategori as $item)
                                <option value="{{$item->kode}}">{{$item->kategori}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-kategoritransaksi">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>

                          @if ($errors->has('kodekategori'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekategori') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label>Nama Tindakan Inap</label>
                        <input type="text" class="form-control" name="namatindakan" id="namatindakan">
                        @if ($errors->has('namatindakan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namatindakan') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">Tarif Tindakan Inap</label>
                         
                              <table border="2" class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th rowspan="2" style="text-align:center">Kelas</th>
                                  <th rowspan="2" style="text-align:center">Tarif</th>
                                  <th colspan="3" style="text-align:center">Untuk</th>
                                </tr>
                                <tr>
                                  <th style="text-align:center">Rumah Sakit</th>
                                  <th style="text-align:center">Dokter</th>
                                  <th style="text-align:center">Paramedis</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($kelas as $no => $item)
                                  <tr>
                                    <td width="70" style="text-align:center">{{$item->nama}}</td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="tarif[{{$no}}]" name="tarif[{{$no}}]" placeholder="" value="0" min="0" readonly>
                                    </td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="untukrs[{{$no}}]" name="untukrs[{{$no}}]" placeholder="" value="0" min="0" oninput="tambahtarif('{{$no}}')">
                                    </td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="untukdokter[{{$no}}]" name="untukdokter[{{$no}}]" placeholder="" value="0" min="0" oninput="tambahtarif('{{$no}}')">
                                    </td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="untukparamedis[{{$no}}]" name="untukparamedis[{{$no}}]" placeholder="" value="0" min="0" oninput="tambahtarif('{{$no}}')">
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                      </div>
                      <div class="form-group">
                        <label>Icd IX</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" name="icd9" id="icd9" placeholder="Belum">
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-icd9" disabled>
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        @if ($errors->has('icd9'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('icd9') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>E-Klaim BPJS</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="idklaim" id="eklaimbpjs">
                              <option value="">Silahkan Pilih</option>
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
                <div class="card card-primary card-outline" id="UbahTindakanInap">
                  <div class="card-header">
                    <div class="row">
                      <div class="col">
                        <a class="btn btn-outline-success btn-block btn-sm" href="{{url('TindakanInap/#TambahTindakanInap')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                      </div>
                      <div class="col">
                        <a href="javascript:alert('Pilih baris data yang akan diubah!');" id="tombolubah" class="btn btn-outline-info btn-block btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                      </div>
                      <div class="col">
                        <a href="javascript:alert('Pilih baris data yang akan dihapus!');" id="tombolhapus" class="btn btn-outline-danger btn-block btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                          <i class="fa fa-minus-circle"></i> Hapus
                        </a>
                      </div>
                      <div class="col">
                        <button type="button" class="btn btn-outline-secondary btn-block btn-sm"><i class="fa fa-print"></i> Cetak</button>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/TindakanInap/update'.$ubah->idtindakan)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kode">Kode Kategori</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="kodekategori" id="kategoritransaksi" readonly> 
                              <option value="">Silahkan Pilih Kategori</option>
                              @foreach ($kategori as $item)
                                <option value="{{$item->kode}}" {{ ($item->kode == $ubah->kodekategori) ? 'selected' : ''}}>{{$item->kategori}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-kategoritransaksi" disabled>
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>

                          @if ($errors->has('kodekategori'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekategori') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label>Nama Tindakan Inap</label>
                        <input type="text" class="form-control" name="namatindakan" id="namatindakan" value="{{$ubah->namatindakan}}">
                        @if ($errors->has('namatindakan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namatindakan') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">Tarif Tindakan Inap</label>
                         
                              <table border="2" class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th rowspan="2" style="text-align:center">Kelas</th>
                                  <th rowspan="2" style="text-align:center">Tarif</th>
                                  <th colspan="3" style="text-align:center">Untuk</th>
                                </tr>
                                <tr>
                                  <th style="text-align:center">Rumah Sakit</th>
                                  <th style="text-align:center">Dokter</th>
                                  <th style="text-align:center">Paramedis</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($kelas as $no => $item)
                                  <tr>
                                    <td width="70" style="text-align:center">{{$item->Kelas->nama}}</td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="tarif[{{$no}}]" name="tarif[{{$no}}]" placeholder="" value="{{$item->tarif}}" min="0" readonly>
                                    </td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="untukrs[{{$no}}]" name="untukrs[{{$no}}]" placeholder="" value="{{$item->untukrs}}" min="0" oninput="tambahtarif('{{$no}}')">
                                    </td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="untukdokter[{{$no}}]" name="untukdokter[{{$no}}]" placeholder="" value="{{$item->untukdokter}}" min="0" oninput="tambahtarif('{{$no}}')">
                                    </td>
                                    <td>
                                      <input type="number" class="form-control form-control-border" id="untukparamedis[{{$no}}]" name="untukparamedis[{{$no}}]" placeholder="" value="{{$item->untukparamedis}}" min="0" oninput="tambahtarif('{{$no}}')">
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                      </div>
                      <div class="form-group">
                        <label>Icd IX</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="icd9" id="icd9">
                              <option value="">Belum</option>
                            </select>
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-icd9" disabled>
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        @if ($errors->has('icd9'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('icd9') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>E-Klaim BPJS</label>
                        <div class="row">
                          <div class="col-10">
                            <select class="form-control" width="100%" name="idklaim" id="eklaimbpjs">
                              <option value="">Silahkan Pilih</option>
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

  <script type="text/javascript">

    function tombol($idtindakan){
      $("a#tombolubah").attr("href", "/TindakanInap/ubah"+ $idtindakan +"#UbahTindakanInap");
      $("a#tombolhapus").attr("href", "/TindakanInap/hapus"+ $idtindakan);
    }
       
    function eklaimbpjs($idklaim){
      document.getElementById("eklaimbpjs").value = $idklaim;
      $(".close").click();
    }
  
    function kategoritransaksi($kode, $kategori) {
      document.getElementById("kategoritransaksi").value = $kode;
      $(".close").click();
    }  

    function tambahtarif($no){
      var angka1=parseFloat(document.getElementById("untukrs["+$no+"]").value);
      var angka2=parseFloat(document.getElementById("untukdokter["+$no+"]").value);
      var angka3=parseFloat(document.getElementById("untukparamedis["+$no+"]").value);
      var hasil= angka1+angka2+angka3;
      document.getElementById("tarif["+$no+"]").value=hasil;
    }
  </script>

@endsection