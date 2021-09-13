@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RekamMedis.Layout.menu')
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
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h4>Data Pasien</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{url('Pasien/#TambahPasien')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
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
                    <tr>
                      <td>{{$item->norm}}</td>
                      <td>{{$item->namapasien}}</td>
                      <td>{{$item->alamat}}</td>
                      <td>
                        <a href="/Pasien/ubah{{$item->norm}}#UbahPasien" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/Pasien/hapus{{$item->norm}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
          <div class="col-5">
                @if(isset($ubah) == NULL)
                <!-- general form elements -->
                <div class="card card-success card-outline" id="TambahPasien">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
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
                                <input type="text" class="form-control" id="lokasi_nama" name="lokasi_nama" placeholder="Kota">
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
                               <option value="{{$item->idagama}}">{{$item->agama}}</option>
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
                              <label>Riwayat Alergi</label>
                              <div class="row">
                                <div class="col-9">
                                  <select class="form-control" name="statusalergi">
                                    <option value="Tidak Ada">Tidak Ada</option>
                                    <option value="Tidak Tahu">Tidak Tahu</option>
                                    <option value="Ya">Ya</option>
                                  </select>
                                </div>
                                <div class="col-2">
                                  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detailalergipasien">
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
                            <input type="text" id="diagnosa1" name="diagnosa1" class="form-control" placeholder="DIAGNOSA 1">
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
                            <input type="text" id="diagnosa2" name="diagnosa2" class="form-control" placeholder="DIAGNOSA 2">
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
                            <select id="keanggotaan2" name="keanggotaan2" class="form-control">
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
                            <input type="text" id="diagnosa3" name="diagnosa3" class="form-control" placeholder="DIAGNOSA 3">
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
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
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
                                <input type="text" class="form-control" id="lokasi_nama" name="lokasi_nama" placeholder="Kota">
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
                               <option value="{{$item->idagama}}">{{$item->agama}}</option>
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
                              <label>Riwayat Alergi</label>
                              <div class="row">
                                <div class="col-9">
                                  <select class="form-control" name="statusalergi">
                                    <option value="Tidak Ada">Tidak Ada</option>
                                    <option value="Tidak Tahu">Tidak Tahu</option>
                                    <option value="Ya">Ya</option>
                                  </select>
                                </div>
                                <div class="col-2">
                                  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detailalergipasien">
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
                            <input type="text" id="diagnosa1" name="diagnosa1" class="form-control" placeholder="DIAGNOSA 1">
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
                            <input type="text" id="diagnosa2" name="diagnosa2" class="form-control" placeholder="DIAGNOSA 2">
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
                            <select id="keanggotaan2" name="keanggotaan2" class="form-control">
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
                            <input type="text" id="diagnosa3" name="diagnosa3" class="form-control" placeholder="DIAGNOSA 3">
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
  function detailalergipasien(){
    var tempjenisalergi = $("select#tempjenisalergi").val();
    var tempketeranganalergi = $("input#tempketeranganalergi").val();

    document.getElementById("jenisalergi").value = tempjenisalergi;
    document.getElementById("keterangan").value = tempketeranganalergi;
    $(".close").click();
  }
</script>
@endsection