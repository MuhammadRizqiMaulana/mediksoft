@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Kamar</h4>
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
      @foreach ($errors as $error)
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
                    <a class="btn btn-outline-success btn-sm" href="{{url('Kamar/#TambahKamar')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>Tarif</th>
                    <th>E-Klaim BPJS</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->kodekamar}}</td>
                      <td>
                        @if(isset($item->keterangan)){{$item->keterangan}}@endif
                      </td>
                      <td>
                        @if(isset($item->Kelas)){{$item->Kelas->nama}}@endif
                      </td>
                      <td>
                        @if(isset($item->Ruang)){{$item->Ruang->namaruang}}@endif  
                      </td>
                      <td>{{$item->tarif}}</td>
                      <td>
                        @if(isset($item->Eklaimbpjs)){{$item->Eklaimbpjs->nama}}@endif
                      </td>
                      <td>
                        <a href="/Kamar/ubah{{$item->kodekamar}}#UbahKamar" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/Kamar/hapus{{$item->kodekamar}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
                <div class="card card-success card-outline" id="TambahKamar">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Kamar/store')}}" method="post" name="tambah">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kodekamar">Kode Kamar</label>
                        <input type="text" class="form-control" id="kodekamar" name="kodekamar" placeholder="Kode Kamar">
                          @if ($errors->has('kodekamar'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekamar') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="kelas" name="kodekelas" placeholder="Kelas" hidden>
                            <input type="text" class="form-control" id="namakelas" name="namakelas" placeholder="Kelas">
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-kelas">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('kodekelas'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekelas') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="ruang">Ruang</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="ruang" name="koderuang" placeholder="Ruang" hidden>
                            <input type="text" class="form-control" id="namaruang" name="namaruang" placeholder="Ruang">
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-ruang">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('koderuang'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('koderuang') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                          @if ($errors->has('keterangan'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('keterangan') }}</p></span>
                          @endif
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="tarif">Tarif</label>
                            <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif">
                              @if ($errors->has('tarif'))
                                <span class="text-danger"><p class="text-right">* {{ $errors->first('tarif') }}</p></span>
                              @endif
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="jasaperawat">Jasa Perawat</label>
                            <input type="text" class="form-control" id="jasaperawat" name="jasaperawat" placeholder="Jasa Perawat">
                              @if ($errors->has('jasaperawat'))
                                <span class="text-danger"><p class="text-right">* {{ $errors->first('jasaperawat') }}</p></span>
                              @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                              <label for="tglaktif">Tanggal Aktif</label>
                              <input type="datetime-local" class="form-control" id="tglaktif" name="tglaktif" placeholder="Tanggal Aktif">
                                @if ($errors->has('tglaktif'))
                                  <span class="text-danger"><p class="text-right">* {{ $errors->first('tglaktif') }}</p></span>
                                @endif
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                              <label for="jumlahbed">Jumlah Bed</label>
                              <input type="text" class="form-control" id="jumlahbed" name="jumlahbed" placeholder="Jumlah Bed">
                                @if ($errors->has('jumlahbed'))
                                  <span class="text-danger"><p class="text-right">* {{ $errors->first('jumlahbed') }}</p></span>
                                @endif
                          </div>
                        </div>
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
                <div class="card card-primary card-outline" id="UbahKamar">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Kamar/update'.$ubah->kodekamar)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                          <label for="kodekamar">Kode Kamar</label>
                          <input type="text" class="form-control" id="kodekamar" name="kodekamar" placeholder="Kode Kamar" value="{{$ubah->kodekamar}}" disabled> 
                            @if ($errors->has('kodekamar'))
                              <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekamar') }}</p></span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <div class="row">
                            <div class="col-10">
                              <input type="text" class="form-control" id="kelas" name="kodekelas" placeholder="Kelas" value="{{$ubah->kodekelas}}" hidden>
                              <input type="text" class="form-control" id="namakelas" name="namakelas" placeholder="Kelas" value="@if(isset($ubah->Kelas)){{$ubah->Kelas->nama}}@endif">
                            </div>
                            <div class="col-2 text-right">
                              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-kelas">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                            @if ($errors->has('kodekelas'))
                              <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekelas') }}</p></span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="ruang">Ruang</label>
                          <div class="row">
                            <div class="col-10">
                              <input type="text" class="form-control" id="ruang" name="koderuang" placeholder="Ruang" value="{{$ubah->koderuang}}" hidden>
                              <input type="text" class="form-control" id="namaruang" name="namaruang" placeholder="Ruang" value="@if(isset($ubah->Ruang)){{$ubah->Ruang->namaruang}}@endif">
                            </div>
                            <div class="col-2 text-right">
                              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-ruang">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                            @if ($errors->has('koderuang'))
                              <span class="text-danger"><p class="text-right">* {{ $errors->first('koderuang') }}</p></span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{$ubah->keterangan}}">
                            @if ($errors->has('keterangan'))
                              <span class="text-danger"><p class="text-right">* {{ $errors->first('keterangan') }}</p></span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col">
                              <div class="form-group">
                                  <label for="tarif">Tarif</label>
                                  <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif" value="{{$ubah->tarif}}">
                                    @if ($errors->has('tarif'))
                                      <span class="text-danger"><p class="text-right">* {{ $errors->first('tarif') }}</p></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                  <label for="jasaperawat">Jasa Perawat</label>
                                  <input type="text" class="form-control" id="jasaperawat" name="jasaperawat" placeholder="Jasa Perawat" value="{{$ubah->jasaperawat}}">
                                    @if ($errors->has('jasaperawat'))
                                      <span class="text-danger"><p class="text-right">* {{ $errors->first('jasaperawat') }}</p></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="tglaktif">Tanggal Aktif</label>
                                <input type="datetime" class="form-control" id="tglaktif" name="tglaktif" placeholder="Tanggal Aktif" value="{{$ubah->tglaktif}}">
                                  @if ($errors->has('tglaktif'))
                                    <span class="text-danger"><p class="text-right">* {{ $errors->first('tglaktif') }}</p></span>
                                  @endif
                              </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                                <label for="jumlahbed">Jumlah Bed</label>
                                <input type="text" class="form-control" id="jumlahbed" name="jumlahbed" placeholder="Jumlah Bed" value="{{$ubah->jumlahbed}}">
                                  @if ($errors->has('jumlahbed'))
                                    <span class="text-danger"><p class="text-right">* {{ $errors->first('jumlahbed') }}</p></span>
                                  @endif
                              </div>
                          </div>
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

  <!-- Script Modal -->
  <script type="text/javascript">
    function eklaimbpjs($idklaim){
      document.getElementById("eklaimbpjs").value = $idklaim;
      $(".close").click();
    }
  
    function kelas($kodekelas,$nama){
      document.getElementById('kelas').value = $kodekelas;
      document.getElementById('namakelas').value = $nama;
      $(".close").click();
    }

    function ruang($koderuang,$namaruang){
      document.getElementById('ruang').value = $koderuang;
      document.getElementById('namaruang').value = $namaruang;
      $(".close").click();
    }
  </script>
  <!-- /.Script Modal -->


@endsection