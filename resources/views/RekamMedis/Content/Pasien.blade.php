@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RekamMedis.Layout.menu')
    <!-- /.menu -->

    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Pasien</h4>
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

    <!-- Main content -->
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-7">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr onclick="tombol('{{$item->norm}}')">
                      <td>{{$item->norm}}</td>
                      <td>{{$item->namapasien}}</td>
                      <td>{{$item->alamat}}</td>
                      <td>
                        <button class="btn btn-outline-info btn-sm" onclick="tombol('{{$item->norm}}')">
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
                <div class="card card-success card-outline" id="TambahPasien">
                  <div class="card-header">
                    <div class="row">
                      <div class="col">
                        <a class="btn btn-outline-success btn-block btn-sm" href="{{url('Pasien/#TambahPasien')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                  <form action="{{url('/Pasien/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">

                      <!-- text input -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-4">
                            <label>NO RM</label>
                            <input type="text" class="form-control" name="norm" placeholder="NO RM">
                          </div>
                          <div class="col-8">
                            <label>No Kartu BPJS</label>
                            <input type="text" class="form-control" name="kartu_bpjs" placeholder="No Kartu BPJS">
                          </div>
                        </div>

                        @if ($errors->has('norm'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('norm') }}</p></span>
                        @endif
                        @if ($errors->has('kartu_bpjs'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('kartu_bpjs') }}</p></span>
                        @endif
                      </div>
                      
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" name="namapasien" placeholder="Nama Pasien">
                          </div>
                          <div class="col">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jeniskelamin">
                              <option value="">Pilih Jenis Kelamin</option>
                              <option value="laki-laki">Laki - Laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                       
                        @if ($errors->has('namapasien'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasien') }}</p></span>
                         @endif
                        @if ($errors->has('jeniskelamin'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('jeniskelamin') }}</p></span>
                        @endif
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Kota</label>
                            <div class="row">
                              <div class="col-9">
                                <input type="text" class="form-control" id="idkota" name="idkota" placeholder="Kota" hidden>
                                <input type="text" class="form-control" id="lokasi_nama" name="lokasi_nama" placeholder="Kota" readonly>
                              </div>
                              <div class="col-1">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-lokasi">
                                  <i class="fa fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <label>Gol Darah</label>
                            <select class="form-control" name="goldarah">
                              <option value="">Gol Darah</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="AB">AB</option>
                              <option value="O">O</option>
                            </select>
                            
                          </div>
                        </div>
                        
                        @if ($errors->has('idkota'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idkota') }}</p></span>
                        @endif
                        @if ($errors->has('goldarah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('goldarah') }}</p></span>
                        @endif 
                      </div>
 
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat" placeholder="Alamat"></textarea>
                          @if ($errors->has('alamat'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                          @endif
                      </div>
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-6">
                            <label>Tempat lahir</label>
                            <input type="text" name="tptlahir" class="form-control" placeholder="Tempat lahir">
                          </div>
                          <div class="col-4">
                            <label>Tanggal lahir</label>
                            <input type="date" name="tgllahir" class="form-control" placeholder="Tanggal lahir">
                          </div>
                          <div class="col-2">
                            <label>Umur</label>
                            <input type="number" name="umur" class="form-control" min="0" placeholder="0">
                          </div>
                        </div>
                        @if ($errors->has('tptlahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tptlahir') }}</p></span>
                        @endif
                        @if ($errors->has('tgllahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tgllahir') }}</p></span>
                        @endif
                        @if ($errors->has('umur'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('umur') }}</p></span>
                        @endif
                      </div>
                        
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>No Telp</label>
                            <input type="text" name="notelp" class="form-control" placeholder="No Telp">
                          </div>
                          <div class="col">
                             <label>Agama</label>
                             <select name="agama" class="form-control">
                               @foreach ($agama as $item)
                               <option value="{{$item->agama}}">{{$item->agama}}</option>
                               @endforeach
                             </select>
                          </div>
                          <div class="col">
                            <label>Status Kawin</label>
                              <select class="form-control" name="statuskawin">
                                <option value="">Status Kawin</option>
                                <option value="belum kawin">Belum Kawin</option>
                                <option value="kawin">Kawin</option>
                                <option value="janda">Janda</option>
                                <option value="duda">Duda</option>
                              </select> 
                          </div>
                          
                        </div>
                        
                        @if ($errors->has('notelp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('notelp') }}</p></span>
                        @endif
                        @if ($errors->has('agama'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('agama') }}</p></span>
                        @endif
                        @if ($errors->has('statuskawin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskawin') }}</p></span>
                        @endif
                      </div>
 
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                          </div>
                          <div class="col">
                            <label>Nama Ayah</label>
                            <input type="text" name="namaayah" class="form-control" placeholder="Nama Ayah">
                          </div>
                        </div>
                        
                        @if ($errors->has('pekerjaan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('pekerjaan') }}</p></span>
                        @endif
                        @if ($errors->has('namaayah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaayah') }}</p></span>
                        @endif
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                             <label>Nama ibu</label>
                              <input type="text" name="namaibu" class="form-control" placeholder="Nama Ibu">
                          </div>
                          <div class="col">
                            <label>Nama Pasangan</label>
                            <input type="text" name="namapasangan" class="form-control" placeholder="Nama Pasangan">
                         </div>
                        </div>
                        
                        @if ($errors->has('namaibu'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaibu') }}</p></span>
                        @endif
                        @if ($errors->has('namapasangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasangan') }}</p></span>
                        @endif
                      </div>
                   
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Penanggung Jawab</label>
                            <input type="text" name="penanggungjawab" class="form-control" placeholder="Penanggung Jawab"> 
                          </div>
                          <div class="col">
                            <label>Status Keluarga</label>
                            <input type="text" name="statuskeluarga" class="form-control" placeholder="Status Keluarga">
                          </div>
                          <div class="col">
                            <label>Non Aktif</label>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="1" id="nonaktif" name="nonaktif">
                              <label class="form-check-label" for="nonaktif">
                                Non Aktif
                              </label>
                            </div>
                          </div>
                        </div>
                        
                        @if ($errors->has('penanggungjawab'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('penanggungjawab') }}</p></span>
                        @endif
                        @if ($errors->has('statuskeluarga'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskeluarga') }}</p></span>
                        @endif
                        @if ($errors->has('nonaktif'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('nonaktif') }}</p></span>
                        @endif
                        @if ($errors->has('statusalergi'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statusalergi') }}</p></span>
                        @endif
                      </div>
                   
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                              <label onclick="alergidisabled()">Riwayat Alergi</label>
                              <div class="row">
                                <div class="col-9">
                                  <select class="form-control" id="statusalergi" name="statusalergi">
                                    <option value="Tidak Ada" onclick="alergidisabled()">Tidak Ada</option>
                                    <option value="Tidak Tahu" onclick="alergidisabled()">Tidak Tahu</option>
                                    <option value="Ya" onclick="alergidisabled()">Ya</option>
                                  </select>
                                </div>
                                <div class="col-2">
                                  <button type="button" id="tombolmodalalergi" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detailalergipasien">
                                    <i class="fa fa-search"></i>
                                  </button>
                                  <input type="text" id="jenisalergi" name="jenisalergi" hidden>
                                  <input type="text" id="keterangan" name="keterangan" hidden>
                                </div>
                              </div>
                          </div>
                          <div class="col">
                            <label>Riwayat Penyakit</label>
                            <input type="text" name="riwayatpenyakit" class="form-control" placeholder="Riwayat Penyakit">
                          </div>
                        </div>
                        
                        @if ($errors->has('statusalergi'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statusalergi') }}</p></span>
                        @endif
                        @if ($errors->has('riwayatpenyakit'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('riwayatpenyakit') }}</p></span>
                        @endif
                        @if ($errors->has('keterangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('keterangan') }}</p></span>
                        @endif
                      </div>

                      <br><hr>
                      <center><label>Keanggotaan Pasien</label></center>
                      <hr>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-5">
                            <label>KEANGGOTAAN 1</label>
                            <select id="keanggotaan1" name="keanggotaan1" class="form-control">
                              <option value="">Pilih Keanggotaan</option>
                              @foreach ($keanggotaan as $item)
                                <option value="{{$item->idkeanggotaan}}">{{$item->keanggotaan}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-5 align-self-end">
                            <input type="date" id="tkeanggotaan1" name="tkeanggotaan1" class="form-control" placeholder="KEANGGOTAAN 1">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-10">
                            <label>DIAGNOSA</label>
                            <input type="text" id="kodediagnosa1" name="diagnosa1" class="form-control" placeholder="DIAGNOSA 1" hidden>
                            <input type="text" id="namadiagnosa1" name="namadiagnosa1" class="form-control" placeholder="DIAGNOSA 1" readonly>
                          </div>
                          <div class="col-1 align-self-end">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-diagnosa1">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-5">
                            <label>KEANGGOTAAN 2</label>
                            <select id="keanggotaan2" name="keanggotaan2" class="form-control">
                              <option value="">Pilih Keanggotaan</option>
                              @foreach ($keanggotaan as $item)
                                <option value="{{$item->idkeanggotaan}}">{{$item->keanggotaan}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-5 align-self-end">
                            <input type="date" id="tkeanggotaan2" name="tkeanggotaan2" class="form-control" placeholder="KEANGGOTAAN 2">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-10">
                            <label>DIAGNOSA</label>
                            <input type="text" id="kodediagnosa2" name="diagnosa2" class="form-control" placeholder="DIAGNOSA 2" hidden>
                            <input type="text" id="namadiagnosa2" name="namadiagnosa2" class="form-control" placeholder="DIAGNOSA 2" readonly>
                          </div>
                          <div class="col-1 align-self-end">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-diagnosa2">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-5">
                            <label>KEANGGOTAAN 3</label>
                            <select id="keanggotaan2" name="keanggotaan3" class="form-control">
                              <option value="">Pilih Keanggotaan</option>
                              @foreach ($keanggotaan as $item)
                                <option value="{{$item->idkeanggotaan}}">{{$item->keanggotaan}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-5 align-self-end">
                            <input type="date" id="tkeanggotaan3" name="tkeanggotaan3" class="form-control" placeholder="KEANGGOTAAN 3">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-10">
                            <label>DIAGNOSA</label>
                            <input type="text" id="kodediagnosa3" name="diagnosa3" class="form-control" placeholder="DIAGNOSA 3" hidden>
                            <input type="text" id="namadiagnosa3" name="namadiagnosa3" class="form-control" placeholder="DIAGNOSA 3" readonly>
                          </div>
                          <div class="col-1 align-self-end">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-diagnosa3">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <br>

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
                <div class="card card-primary card-outline" id="UbahPasien">
                  <div class="card-header">
                    <div class="row">
                      <div class="col">
                        <a class="btn btn-outline-success btn-block btn-sm" href="{{url('Pasien/#TambahPasien')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                  <form action="{{url('/Pasien/update'.$ubah->norm)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">

                      <!-- text input -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-4">
                            <label>NO RM</label>
                            <input type="text" class="form-control" name="norm" placeholder="NO RM" value="{{$ubah->norm}}" readonly>
                          </div>
                          <div class="col-8">
                            <label>No Kartu BPJS</label>
                            <input type="text" class="form-control" name="kartu_bpjs" placeholder="No Kartu BPJS" value="{{$ubah->kartu_bpjs}}">
                          </div>
                        </div>

                        @if ($errors->has('norm'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('norm') }}</p></span>
                        @endif
                        @if ($errors->has('kartu_bpjs'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('kartu_bpjs') }}</p></span>
                        @endif
                      </div>
                      
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" name="namapasien" placeholder="Nama Pasien" value="{{$ubah->namapasien}}">
                          </div>
                          <div class="col">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jeniskelamin">
                              <option value="">Pilih Jenis Kelamin</option>
                              <option value="laki-laki" {{($ubah->jeniskelamin == 'laki-laki') ? 'selected' : ''}}>Laki - Laki</option>
                              <option value="perempuan" {{($ubah->jeniskelamin == 'perempuan') ? 'selected' : ''}}>Perempuan</option>
                            </select>
                          </div>
                        </div>
                       
                        @if ($errors->has('namapasien'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasien') }}</p></span>
                         @endif
                        @if ($errors->has('jeniskelamin'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('jeniskelamin') }}</p></span>
                        @endif
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Kota</label>
                            <div class="row">
                              <div class="col-9">
                                <input type="text" class="form-control" id="idkota" name="idkota" placeholder="Kota" value="{{$ubah->idkota}}" hidden>
                                <input type="text" class="form-control" id="lokasi_nama" name="lokasi_nama" placeholder="Kota" value="{{$ubah->Lokasi->lokasi_nama}}" readonly>
                              </div>
                              <div class="col-1">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-lokasi">
                                  <i class="fa fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <label>Gol Darah</label>
                            <select class="form-control" name="goldarah">
                              <option value="" {{($ubah->goldarah == null) ? 'selected' : ''}}>Gol Darah</option>
                              <option value="A" {{($ubah->goldarah == 'A') ? 'selected' : ''}}>A</option>
                              <option value="B" {{($ubah->goldarah == 'B') ? 'selected' : ''}}>B</option>
                              <option value="AB" {{($ubah->goldarah == 'AB') ? 'selected' : ''}}>AB</option>
                              <option value="O" {{($ubah->goldarah == 'O') ? 'selected' : ''}}>O</option>
                            </select>
                            
                          </div>
                        </div>
                        
                        @if ($errors->has('idkota'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idkota') }}</p></span>
                        @endif
                        @if ($errors->has('goldarah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('goldarah') }}</p></span>
                        @endif 
                      </div>
 
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat" placeholder="Alamat">{{$ubah->alamat}}</textarea>
                          @if ($errors->has('alamat'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                          @endif
                      </div>
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-6">
                            <label>Tempat lahir</label>
                            <input type="text" name="tptlahir" class="form-control" placeholder="Tempat lahir" value="{{$ubah->tptlahir}}">
                          </div>
                          <div class="col-4">
                            <label>Tanggal lahir</label>
                            <input type="date" name="tgllahir" class="form-control" placeholder="Tanggal lahir" value="{{$ubah->tgllahir}}">
                          </div>
                          <div class="col-2">
                            <label>Umur</label>
                            <input type="number" name="umur" class="form-control" min="0" placeholder="0">
                          </div>
                        </div>
                        @if ($errors->has('tptlahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tptlahir') }}</p></span>
                        @endif
                        @if ($errors->has('tgllahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tgllahir') }}</p></span>
                        @endif
                        @if ($errors->has('umur'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('umur') }}</p></span>
                        @endif
                      </div>
                        
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>No Telp</label>
                            <input type="text" name="notelp" class="form-control" placeholder="No Telp" value="{{$ubah->notelp}}">
                          </div>
                          <div class="col">
                             <label>Agama</label>
                             <select name="agama" class="form-control">
                               @foreach ($agama as $item)
                               <option value="{{$item->agama}}" {{($ubah->agama == $item->agama) ? 'selected' : ''}}>{{$item->agama}}</option>
                               @endforeach
                             </select>
                          </div>
                          <div class="col">
                            <label>Status Kawin</label>
                              <select class="form-control" name="statuskawin">
                                <option value="" {{($ubah->statuskawin == null) ? 'selected' : ''}}>Status Kawin</option>
                                <option value="belum kawin" {{($ubah->statuskawin == 'belum kawin') ? 'selected' : ''}}>Belum Kawin</option>
                                <option value="kawin" {{($ubah->statuskawin == 'kawin') ? 'selected' : ''}}>Kawin</option>
                                <option value="janda" {{($ubah->statuskawin == 'janda') ? 'selected' : ''}}>Janda</option>
                                <option value="duda" {{($ubah->statuskawin == 'duda') ? 'selected' : ''}}>Duda</option>
                              </select> 
                          </div>
                          
                        </div>
                        
                        @if ($errors->has('notelp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('notelp') }}</p></span>
                        @endif
                        @if ($errors->has('agama'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('agama') }}</p></span>
                        @endif
                        @if ($errors->has('statuskawin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskawin') }}</p></span>
                        @endif
                      </div>
 
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{$ubah->pekerjaan}}">
                          </div>
                          <div class="col">
                            <label>Nama Ayah</label>
                            <input type="text" name="namaayah" class="form-control" placeholder="Nama Ayah" value="{{$ubah->namaayah}}">
                          </div>
                        </div>
                        
                        @if ($errors->has('pekerjaan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('pekerjaan') }}</p></span>
                        @endif
                        @if ($errors->has('namaayah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaayah') }}</p></span>
                        @endif
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                             <label>Nama ibu</label>
                              <input type="text" name="namaibu" class="form-control" placeholder="Nama Ibu" value="{{$ubah->namaibu}}">
                          </div>
                          <div class="col">
                            <label>Nama Pasangan</label>
                            <input type="text" name="namapasangan" class="form-control" placeholder="Nama Pasangan" value="{{$ubah->namapasangan}}">
                         </div>
                        </div>
                        
                        @if ($errors->has('namaibu'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaibu') }}</p></span>
                        @endif
                        @if ($errors->has('namapasangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasangan') }}</p></span>
                        @endif
                      </div>
                   
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Penanggung Jawab</label>
                            <input type="text" name="penanggungjawab" class="form-control" placeholder="Penanggung Jawab" value="{{$ubah->penanggungjawab}}"> 
                          </div>
                          <div class="col">
                            <label>Status Keluarga</label>
                            <input type="text" name="statuskeluarga" class="form-control" placeholder="Status Keluarga" value="{{$ubah->statuskeluarga}}">
                          </div>
                          <div class="col">
                            <label>Non Aktif</label>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="nonaktif" name="nonaktif" value="1" {{($ubah->nonaktif == 1) ? 'checked' : ''}}>
                              <label class="form-check-label" for="nonaktif">
                                Non Aktif
                              </label>
                            </div>
                          </div>
                        </div>
                        
                        @if ($errors->has('penanggungjawab'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('penanggungjawab') }}</p></span>
                        @endif
                        @if ($errors->has('statuskeluarga'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskeluarga') }}</p></span>
                        @endif
                        @if ($errors->has('nonaktif'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('nonaktif') }}</p></span>
                        @endif
                      </div>
                   
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                              <label onclick="alergidisabled()">Riwayat Alergi</label>
                              <div class="row">
                                <div class="col-9">
                                  <select class="form-control" id="statusalergi" name="statusalergi">
                                    <option value="Tidak Ada" onclick="alergidisabled()" {{($ubah->statusalergi == 'Tidak Ada') ? 'selected' : ''}}>Tidak Ada</option>
                                    <option value="Tidak Tahu" onclick="alergidisabled()" {{($ubah->statusalergi == 'Tidak Tahu') ? 'selected' : ''}}>Tidak Tahu</option>
                                    <option value="Ya" onclick="alergidisabled()" {{($ubah->statusalergi == 'Ya') ? 'selected' : ''}}>Ya</option>
                                  </select>
                                </div>
                                <div class="col-2">
                                  <button type="button" id="tombolmodalalergi" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detailalergipasien">
                                    <i class="fa fa-search"></i>
                                  </button>
                                  <input type="text" id="jenisalergi" name="jenisalergi" value="{{isset($alergi->jenisalergi) ? $alergi->jenisalergi : '' }}" hidden>
                                  <input type="text" id="keterangan" name="keterangan" value="{{isset($alergi->keterangan) ? $alergi->keterangan : '' }}" hidden>
                                </div>
                              </div>
                          </div>
                          <div class="col">
                            <label>Riwayat Penyakit</label>
                            <input type="text" name="riwayatpenyakit" class="form-control" placeholder="Riwayat Penyakit" value="{{$ubah->riwayatpenyakit}}">
                          </div>
                        </div>
                        
                        @if ($errors->has('statusalergi'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statusalergi') }}</p></span>
                        @endif
                        @if ($errors->has('riwayatpenyakit'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('riwayatpenyakit') }}</p></span>
                        @endif
                        @if ($errors->has('keterangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('keterangan') }}</p></span>
                        @endif
                      </div>

                      <br><hr>
                      <center><label>Keanggotaan Pasien</label></center>
                      <hr>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-5">
                            <label>KEANGGOTAAN 1</label>
                            <select id="keanggotaan1" name="keanggotaan1" class="form-control">
                              <option value="">Pilih Keanggotaan</option>
                              @foreach ($keanggotaan as $item)
                                <option value="{{$item->idkeanggotaan}}" {{($ubah->keanggotaan1 == $item->idkeanggotaan) ? 'selected' : ''}}>{{$item->keanggotaan}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-5 align-self-end">
                            <input type="datetime" id="tkeanggotaan1" name="tkeanggotaan1" class="form-control" placeholder="KEANGGOTAAN 1" value="{{$ubah->tkeanggotaan1}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-10">
                            <label>DIAGNOSA</label>
                            <input type="text" id="kodediagnosa1" name="diagnosa1" class="form-control" placeholder="DIAGNOSA 1"  value="{{$ubah->diagnosa1}}" hidden>
                            <input type="text" id="namadiagnosa1" name="namadiagnosa1" class="form-control" placeholder="DIAGNOSA 1" value="{{isset($ubah->Diagnosa1->nama) ? $ubah->Diagnosa1->nama : '' }}"  readonly>
                          </div>
                          <div class="col-1 align-self-end">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-diagnosa1">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-5">
                            <label>KEANGGOTAAN 2</label>
                            <select id="keanggotaan2" name="keanggotaan2" class="form-control">
                              <option value="">Pilih Keanggotaan</option>
                              @foreach ($keanggotaan as $item)
                                <option value="{{$item->idkeanggotaan}}" {{($ubah->keanggotaan2 == $item->idkeanggotaan) ? 'selected' : ''}}>{{$item->keanggotaan}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-5 align-self-end">
                            <input type="datetime" id="tkeanggotaan2" name="tkeanggotaan2" class="form-control" placeholder="KEANGGOTAAN 2" value="{{$ubah->tkeanggotaan2}}" >
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-10">
                            <label>DIAGNOSA</label>
                            <input type="text" id="kodediagnosa2" name="diagnosa2" class="form-control" placeholder="DIAGNOSA 2" value="{{$ubah->diagnosa2}}" hidden>
                            <input type="text" id="namadiagnosa2" name="namadiagnosa2" class="form-control" placeholder="DIAGNOSA 2" value="{{isset($ubah->Diagnosa2->nama) ? $ubah->Diagnosa2->nama : '' }}"  readonly>
                          </div>
                          <div class="col-1 align-self-end">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-diagnosa2">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-5">
                            <label>KEANGGOTAAN 3</label>
                            <select id="keanggotaan3" name="keanggotaan3" class="form-control">
                              <option value="">Pilih Keanggotaan</option>
                              @foreach ($keanggotaan as $item)
                                <option value="{{$item->idkeanggotaan}}" {{($ubah->keanggotaan3 == $item->idkeanggotaan) ? 'selected' : ''}}>{{$item->keanggotaan}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-5 align-self-end">
                            <input type="datetime" id="tkeanggotaan3" name="tkeanggotaan3" class="form-control" placeholder="KEANGGOTAAN 3" value="{{$ubah->tkeanggotaan3}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-10">
                            <label>DIAGNOSA</label>
                            <input type="text" id="kodediagnosa3" name="diagnosa3" class="form-control" placeholder="DIAGNOSA 3"  value="{{$ubah->diagnosa3}}"hidden>
                            <input type="text" id="namadiagnosa3" name="namadiagnosa3" class="form-control" placeholder="DIAGNOSA 3"  value="{{isset($ubah->Diagnosa3->nama) ? $ubah->Diagnosa3->nama : '' }}" readonly>
                          </div>
                          <div class="col-1 align-self-end">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-diagnosa3">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <br>

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

  function alergidisabled(){

    if( statusalergi = $("select#statusalergi").val() == "Ya") {
      $("#tombolmodalalergi").prop("disabled", false);
    } else {
      $("#tombolmodalalergi").prop("disabled", true);
    }

  }

  function tombol($norm){
    $("a#tombolubah").attr("href", "/Pasien/ubah"+ $norm +"#UbahPasien");
    $("a#tombolhapus").attr("href", "/Pasien/hapus"+ $norm);
  }

  function lokasi($id_lokasi, $lokasi_nama){
    document.getElementById("idkota").value = $id_lokasi;
    document.getElementById("lokasi_nama").value = $lokasi_nama;
    $(".close").click();
  }

  function detailalergipasien(){
    var tempjenisalergi = $("select#tempjenisalergi").val();
    var tempketeranganalergi = $("input#tempketeranganalergi").val();

    document.getElementById("jenisalergi").value = tempjenisalergi;
    document.getElementById("keterangan").value = tempketeranganalergi;
    $(".close").click();
    
  }

  function diagnosa1($kode, $nama){
    document.getElementById("kodediagnosa1").value = $kode;
    document.getElementById("namadiagnosa1").value = $nama;
    $(".close").click();
  }

  function diagnosa2($kode, $nama){
    document.getElementById("kodediagnosa2").value = $kode;
    document.getElementById("namadiagnosa2").value = $nama;
    $(".close").click();
  }

  function diagnosa3($kode, $nama){
    document.getElementById("kodediagnosa3").value = $kode;
    document.getElementById("namadiagnosa3").value = $nama;
    $(".close").click();
  }
</script>
@endsection