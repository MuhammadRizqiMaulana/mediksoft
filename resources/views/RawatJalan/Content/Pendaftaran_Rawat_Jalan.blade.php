@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
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
        <div class="row d-flex justify-content-center">
          <!-- /.col -->
          <div class="col-6 ">
                @if(isset($ubah) == NULL)
                <!-- general form elements -->
                <div class="card card-success card-outline" id="TambahPendaftaranRawatJalan">
                  <div class="card-header">
                    <h4 class="text-success"></i> Pendaftaran Rawat Jalan</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Pendaftaran_Rawat_Jalan/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">

                      <!-- text input -->
                      <div class="form-group">
                        <label for="kelas">Tanggal Masuk</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="datetime" class="form-control" id="tglmasuk" name="tglmasuk" placeholder="Tanggal Masuk" value="{{$now}}">
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info">
                              <i class="fas fa-calendar"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('tglmasuk'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('tglmasuk') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        
                        
                        <div class="row">
                          <div class="col-4">
                            <label for="norm">No Rekam Medis</label>
                            <input type="text" class="form-control" id="norm" name="norm" placeholder="No Rekam Medis">
                          </div>
                          <div class="col-6">
                            <label for="namapasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="namapasien" name="namapasien" placeholder="Nama Pasien" >
                          </div>
                          <div class="col-2 text-right" >
                            <button type="button" class="btn btn-outline-info align-bottom" data-toggle="modal" data-target="#modal-pasien">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('norm'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('norm') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="poliklinik">Poliklinik</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="poliklinik" name="kodepoli" placeholder="Kode Poli" hidden>
                            <input type="text" class="form-control" id="namapoli" name="namapoli" placeholder="Nama Poli" >
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
                        <label for="dokter">Dokter</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="dokter" name="iddokter" placeholder="Dokter"  hidden>
                            <input type="text" class="form-control" id="namadokter" name="namadokter" placeholder="Nama Dokter" >
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
                        <label for="perusahaan">Perusahaan / Jaminan</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="perusahaan" name="idprsh" placeholder="Perusahaan"  hidden>
                            <input type="text" class="form-control" id="namaprsh" name="namaprsh" placeholder="Nama Perusahaan" >
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-perusahaan">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('idprsh'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('idprsh') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="faskes">Pengirim</label>
                        <div class="row">
                          <div class="col-10">
                            <input type="text" class="form-control" id="faskes" name="kodefaskespengirim" placeholder="Pengirim"  hidden>
                            <input type="text" class="form-control" id="namafaskes" name="namafaskes" placeholder="Nama Pengirim" >
                          </div>
                          <div class="col-2 text-right">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-faskes">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                          @if ($errors->has('kodefaskespengirim'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodefaskespengirim') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="administrasi">Administrasi</label>
                        <div class="row">
                          <div class="col-6">
                            <input type="number" class="form-control" id="administrasi" name="administrasi" min="0" placeholder="Administrasi" value="0">
                              @if ($errors->has('administrasi'))
                                <span class="text-danger"><p class="text-right">* {{ $errors->first('administrasi') }}</p></span>
                              @endif
                          </div>
                        </div>
                      </div>
                      
                  </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-outline-success"><i class="far fa-save"></i> Simpan</button>
                      <button type="reset" onclick="window.location.href='{{url('Data_Pendaftaran')}}'" class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal</button>
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
                            <label>norm</label>
                            <input type="text" class="form-control" name="norm" placeholder="norm">
                          </div>
                          <div class="col-8">
                            <label>kartuBPJS</label>
                            <input type="text" class="form-control" name="kartu_bpjs" placeholder="kartu_bpjs">
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
                        <input type="text" class="form-control" name="namapasien" placeholder="namapasien">
                        </div>
                        <div class="col">
                           <label>jeniskelamin</label>
                        <select class="form-control" name="jeniskelamin">
                          <option value="Laki-laki">Laki - Laki</option>
                          <option value="Perempuan">Perempuan</option>
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
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat" placeholder="Alamat"></textarea>
                          @if ($errors->has('alamat'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                          @endif
                      </div>
                  
                  
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>idkota</label>
                            <input type="text" name="idkota" class="form-control" placeholder="idkota">
                          </div>
                          <div class="col">
                            <label>tanggal lahir</label>
                            <input type="date" name="tgllahir" class="form-control" placeholder="tgl lahir">
                          </div>
                        </div>
                        
                        @if ($errors->has('idkota'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idkota') }}</p></span>
                        @endif
                        @if ($errors->has('tgllahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tgllahir') }}</p></span>
                        @endif 
                      </div>
                      
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>tempat lahir</label>
                        <input type="text" name="tptlahir" class="form-control" placeholder="tptlahir">
                            
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
                        
                        @if ($errors->has('tptlahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tptlahir') }}</p></span>
                        @endif
                        @if ($errors->has('goldarah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('goldarah') }}</p></span>
                        @endif
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>No telpon</label>
                            <input type="text" name="notelp" class="form-control" placeholder="notelp">
                          </div>
                          <div class="col">
                             <label>Agama</label>
                              <input type="text" name="agama" class="form-control" placeholder="agama">
                          </div>
                          
                        </div>
                        
                        @if ($errors->has('notelp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('notelp') }}</p></span>
                        @endif
                        @if ($errors->has('agama'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('agama') }}</p></span>
                        @endif
                      </div>
 
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Status Kawin</label>
                        <select class="form-control" name="statuskawin">
                          <option value="">Status Kawin</option>
                          <option value="Kawin">Kawis</option>
                          <option value="Belum kawin">Belum kawin</option>
                          <option value="Janda">Janda</option>
                          <option value="Duda">Duda</option>
                           </select> 
                          </div>
                          <div class="col">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="pekerjaan">
                          </div>
                        </div>
                        
                          @if ($errors->has('statuskawin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('statuskawin') }}</p></span>
                        @endif
                        
                         @if ($errors->has('pekerjaan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('pekerjaan') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Nama Ayah</label>
                            <input type="text" name="namaayah" class="form-control" placeholder="namaayah">
                          </div>
                          <div class="col">
                             <label>Nama ibu</label>
                              <input type="text" name="namaibu" class="form-control" placeholder="namaibu">
                          </div>
                        </div>
                        
                        @if ($errors->has('namaayah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaayah') }}</p></span>
                        @endif
                        @if ($errors->has('namaibu'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaibu') }}</p></span>
                        @endif
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                             <label>Nama Pasangan</label>
                             <input type="text" name="namapasangan" class="form-control" placeholder="namapasangan">
                          </div>
                          <div class="col">
                            <label>Penanggung jawab</label>
                            <input type="text" name="penanggungjawab" class="form-control" placeholder="penanggungjawab"> 
                          </div>
                        </div>
                       
                        @if ($errors->has('namapasangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namapasangan') }}</p></span>
                        @endif
                        @if ($errors->has('penanggungjawab'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('penanggungjawab') }}</p></span>
                        @endif
                      </div>

                    
                      <div class="form-group">
                        <div class="row">
                          <div class="col-5">
                            <label>Status Keluarga</label>
                            <input type="text" name="statuskeluarga" class="form-control" placeholder="statuskeluarga">
                          </div>
                          <div class="col-4">
                            <label>Non Aktif</label>
                        <select class="form-control" name="nonaktif">
                          
                          <option value="1">aktif</option>
                          <option value="0">nonaktif</option>
                        </select>

                            
                          </div>
                          <div class="col-5">
                            <label>Riwayat Alergi</label>
                        <select class="form-control" name="statusalergi">
                          
                          <option value="Tidak Ada">tidak ada</option>
                          <option value="Tidak Tau">tidak tau</option>
                          <option value="Ya">ya</option>
                        </select>
                          </div>
                        </div>
                        
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
                        <label>Riwayat Penyait</label>
                        <input type="text" name="riwayatpenyakit" class="form-control" placeholder="riwayatpenyakit">
                        @if ($errors->has('riwayatpenyakit'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('riwayatpenyakit') }}</p></span>
                        @endif
                      </div>

                      <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <label>Keanggotaan1</label>
                          <input type="text" name="Keanggotaan1" class="form-control" placeholder="Keanggotaan1">
                        </div>
                        <div class="col-6">
                          <label>date</label>
                          <input type="date" name="Keanggotaan1" class="form-control" placeholder="Keanggotaan1">
                        </div>
                        <div class="col-12">
                          <label>Diagnosa1</label>
                          <input type="diagnosa1" name="diagnosa1" class="form-control" placeholder="diagnosa1">
                        </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <label>Keanggotaan2</label>
                          <input type="text" name="Keanggotaan2" class="form-control" placeholder="Keanggotaan2">
                        </div>
                        <div class="col-6">
                          <label>date</label>
                          <input type="date" name="Keanggotaan2" class="form-control" placeholder="Keanggotaan2">
                        </div>
                        <div class="col-12">
                          <label>Diagnosa2</label>
                          <input type="diagnosa2" name="diagnosa2" class="form-control" placeholder="diagnosa2">
                        </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <label>Keanggotaan3</label>
                          <input type="text" name="Keanggotaan3" class="form-control" placeholder="Keanggotaan3">
                        </div>
                        <div class="col-6">
                          <label>date</label>
                          <input type="date" name="Keanggotaan3" class="form-control" placeholder="Keanggotaan3">
                        </div>
                        <div class="col-12">
                          <label>Diagnosa3</label>
                          <input type="diagnosa3" name="diagnosa3" class="form-control" placeholder="diagnosa3">
                        </div>
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

  <!-- Script Modal -->
  <script type="text/javascript">
    function pasien($norm, $namapasien){
      document.getElementById("norm").value = $norm;
      document.getElementById("namapasien").value = $namapasien;
      $(".close").click();
    }
  
    function poliklinik($kode, $nama){
      document.getElementById('poliklinik').value = $kode;
      document.getElementById('namapoli').value = $nama;
      $(".close").click();
    }

    function dokter($iddokter, $nama){
      document.getElementById('dokter').value = $iddokter;
      document.getElementById('namadokter').value = $nama;
      $(".close").click();
    }

    function perusahaan($idprsh, $namaprsh){
      document.getElementById('perusahaan').value = $idprsh;
      document.getElementById('namaprsh').value = $namaprsh;
      $(".close").click();
    }

    function faskes($kodefaskes, $namafaskes){
      document.getElementById('faskes').value = $kodefaskes;
      document.getElementById('namafaskes').value = $namafaskes;
      $(".close").click();
    }
  </script>
  <!-- /.Script Modal -->

@endsection