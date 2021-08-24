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
          <div class="col-8">
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
          <div class="col-4">
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
                      <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>norm</label>
                        <input type="text" class="form-control" name="norm" placeholder="norm">
                      </div>
                      @if ($errors->has('norm'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('norm') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>kartuBPJS</label>
                        <input type="text" class="form-control" name="kartu_bpjs" placeholder="kartu_bpjs">
                      </div>
                      @if ($errors->has('kartu_bpjs'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('kartu_bpjs') }}</p></span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" class="form-control" name="namapasien" placeholder="namapasien">
                      </div>
                      @if ($errors->has('namapasien'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasien') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>jeniskelamin</label>
                        <select class="form-control" name="jeniskelamin">
                          <option value="Laki-laki">Laki - Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                         @if ($errors->has('jeniskelamin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('jeniskelamin') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat" placeholder="Alamat"></textarea>
                          @if ($errors->has('alamat'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                          @endif
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <!-- text input -->
                      <div class="form-group">
                        <label>idkota</label>
                        <input type="text" name="idkota" class="form-control" placeholder="idkota">
                      </div>
                      @if ($errors->has('idkota'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idkota') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>tanggal lahir</label>
                        <input type="date" name="tgllahir" class="form-control" placeholder="tgl lahir">
                      </div>
                      @if ($errors->has('tgllahir'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('tgllahir') }}</p></span>
                      @endif 
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>tempat lahit</label>
                        <input type="text" name="tptlahir" class="form-control" placeholder="tptlahir">
                      </div>
                      @if ($errors->has('tptlahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tptlahir') }}</p></span>
                        @endif
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No telpon</label>
                        <input type="text" name="notelp" class="form-control" placeholder="notelp">
                      </div>
                      @if ($errors->has('notelp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('notelp') }}</p></span>
                        @endif
                    </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="agama">
                      </div>
                      @if ($errors->has('agama'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('agama') }}</p></span>
                        @endif
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                      
                        <label>Gol Darah</label>
                        <select class="form-control" name="goldarah">
                          <option value="">Gol Darah</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>
                        </select>
                      </div>
                      @if ($errors->has('goldarah'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('goldarah') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>Status Kawin</label>
                        <select class="form-control" name="statuskawin">
                          <option value="">Status Kawin</option>
                          <option value="Kawin">Kawis</option>
                          <option value="Belum kawin">Belum kawin</option>
                          <option value="Janda">Janda</option>
                          <option value="Duda">Duda</option>
                        </select>
                         @if ($errors->has('statuskawin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskawin') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="pekerjaan">
                      </div>
                      @if ($errors->has('pekerjaan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('pekerjaan') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="namaayah" class="form-control" placeholder="namaayah">
                      </div>
                      @if ($errors->has('namaayah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaayah') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama ibu</label>
                        <input type="text" name="namaibu" class="form-control" placeholder="namaibu">
                      </div>
                      @if ($errors->has('namaibu'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaibu') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Pasangan</label>
                        <input type="text" name="namapasangan" class="form-control" placeholder="namapasangan">
                      </div>
                      @if ($errors->has('namapasangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasangan') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Penanggung jawab</label>
                        <input type="text" name="penanggungjawab" class="form-control" placeholder="penanggungjawab">
                      </div>
                      @if ($errors->has('penanggungjawab'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('penanggungjawab') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status Keluarga</label>
                        <input type="text" name="statuskeluarga" class="form-control" placeholder="statuskeluarga">
                      </div>
                      @if ($errors->has('statuskeluarga'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskeluarga') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>Non Aktif</label>
                        <select class="form-control" name="nonaktif">
                          
                          <option value="1">aktif</option>
                          <option value="0">nonaktif</option>
                          
                        </select>
                         @if ($errors->has('nonaktif'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('nonaktif') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>Riwayat Alergi</label>
                        <select class="form-control" name="statusalergi">
                          
                          <option value="Tidak Ada">tidak ada</option>
                          <option value="Tidak Tau">tidak tau</option>
                          <option value="Ya">ya</option>
                          
                        </select>
                         @if ($errors->has('statusalergi'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statusalergi') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                   <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Riwayat Penyait</label>
                        <input type="text" name="riwayatpenyakit" class="form-control" placeholder="riwayatpenyakit">
                      </div>
                      @if ($errors->has('riwayatpenyakit'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('riwayatpenyakit') }}</p></span>
                        @endif
                    </div>
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
                <div class="card card-primary card-outline" id="UbahPasien">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Pasien/update'.$ubah->norm)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>norm</label>
                        <input type="text" class="form-control" name="norm" placeholder="norm">
                      </div>
                      @if ($errors->has('norm'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('norm') }}</p></span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" class="form-control" name="namapasien" placeholder="namapasien">
                      </div>
                      @if ($errors->has('namapasien'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasien') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>jeniskelamin</label>
                        <select class="form-control" name="jeniskelamin">
                          <option value="Laki-laki">Laki - Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                         @if ($errors->has('jeniskelamin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('jeniskelamin') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat" placeholder="Alamat"></textarea>
                          @if ($errors->has('alamat'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                          @endif
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <!-- text input -->
                      <div class="form-group">
                        <label>idkota</label>
                        <input type="text" name="idkota" class="form-control" placeholder="idkota">
                      </div>
                      @if ($errors->has('idkota'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idkota') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>tanggal lahir</label>
                        <input type="date" name="tgllahir" class="form-control" placeholder="tgl lahir">
                      </div>
                      @if ($errors->has('tgllahir'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('tgllahir') }}</p></span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>tempat lahit</label>
                        <input type="text" name="tptlahir" class="form-control" placeholder="tptlahir">
                      </div>
                      @if ($errors->has('tptlahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tptlahir') }}</p></span>
                        @endif
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No telpon</label>
                        <input type="text" name="notelp" class="form-control" placeholder="notelp">
                      </div>
                      @if ($errors->has('notelp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('notelp') }}</p></span>
                        @endif
                    </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="agama">
                      </div>
                      @if ($errors->has('agama'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('agama') }}</p></span>
                        @endif
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                      
                        <label>Gol Darah</label>
                        <select class="form-control" name="goldarah">
                          <option value="">Gol Darah</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>
                        </select>
                      </div>
                      @if ($errors->has('goldarah'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('goldarah') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>Status Kawin</label>
                        <select class="form-control" name="statuskawin">
                          <option value="">Status Kawin</option>
                          <option value="Kawin">Kawis</option>
                          <option value="Belum kawin">Belum kawin</option>
                          <option value="Janda">Janda</option>
                          <option value="Duda">Duda</option>
                        </select>
                         @if ($errors->has('statuskawin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskawin') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="pekerjaan">
                      </div>
                      @if ($errors->has('pekerjaan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('pekerjaan') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="namaayah" class="form-control" placeholder="namaayah">
                      </div>
                      @if ($errors->has('namaayah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaayah') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama ibu</label>
                        <input type="text" name="namaibu" class="form-control" placeholder="namaibu">
                      </div>
                      @if ($errors->has('namaibu'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaibu') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Pasangan</label>
                        <input type="text" name="namapasangan" class="form-control" placeholder="namapasangan">
                      </div>
                      @if ($errors->has('namapasangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasangan') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Penanggung jawab</label>
                        <input type="text" name="penanggungjawab" class="form-control" placeholder="penanggungjawab">
                      </div>
                      @if ($errors->has('penanggungjawab'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('penanggungjawab') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status Keluarga</label>
                        <input type="text" name="statuskeluarga" class="form-control" placeholder="statuskeluarga">
                      </div>
                      @if ($errors->has('statuskeluarga'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskeluarga') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>Non Aktif</label>
                        <select class="form-control" name="nonaktif">
                          
                          <option value="aktif">aktif</option>
                          <option value="nonaktif">nonaktif</option>
                          
                        </select>
                         @if ($errors->has('nonaktif'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('nonaktif') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>Riwayat Alergi</label>
                        <select class="form-control" name="statusalergi">
                          
                          <option value="Tidak Ada">tidak ada</option>
                          <option value="Tidak Tau">tidak tau</option>
                          <option value="Ya">ya</option>
                          
                        </select>
                         @if ($errors->has('statusalergi'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statusalergi') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                   <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Riwayat Penyait</label>
                        <input type="text" name="riwayatpenyakit" class="form-control" placeholder="riwayatpenyakit">
                      </div>
                      @if ($errors->has('riwayatpenyakit'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('riwayatpenyakit') }}</p></span>
                        @endif
                    </div>
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