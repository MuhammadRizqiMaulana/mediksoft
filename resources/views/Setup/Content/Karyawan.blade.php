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
          <div class="col-7">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h4>Data Karyawan</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{url('Karyawan/#TambahKaryawan')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                    $no=1;   
                  @endphp
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$item->nik}}</td>
                      <td>{{$item->nama}}</td>
                      <td>
                        <a href="/Karyawan/ubah{{$item->idkaryawan}}#UbahKaryawan" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/Karyawan/hapus{{$item->idkaryawan}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
            <div class="card card-success card-outline" id="TambahKaryawan">
              <div class="card-header">
                <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/Karyawan/store')}}" method="post">
                {{csrf_field()}} 
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" placeholder="NIK">
                      </div>
                      @if ($errors->has('nik'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nik') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-7">
                      <!-- select -->
                      <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="idjabatan">
                          <option value="">Pilih Jabatan</option>
                          @foreach ($jabatans as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                      @if ($errors->has('idjabatan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idjabatan') }}</p></span>
                        @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama">
                      </div>
                      @if ($errors->has('nama'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" name="noktp" class="form-control" placeholder="No KTP">
                      </div>
                      @if ($errors->has('noktp'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('noktp') }}</p></span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No Register</label>
                        <input type="text" name="" class="form-control" placeholder="Belum Jadi">
                      </div>
                      @if ($errors->has(''))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('') }}</p></span>
                        @endif
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Masa berlaku</label>
                          <div class="col">
                            <div class="row">
                              <span for="tanggaldari" class="col-form-label">Dari</span>
                              <div class="col-sm-4">
                                <input type="date" class="form-control" name="" id="tanggaldari" placeholder="Tanggal">
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="row">
                              <span for="tanggalsampai" class="col-form-label">Sd</span>
                              <div class="col-sm-4">
                                <input type="date" class="form-control" name="" id="tanggalsampai" placeholder="Tanggal">
                              </div>
                            </div>
                          </div>
                                               
                      </div>
                      @if ($errors->has(''))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('') }}</p></span>
                      @endif
                      @if ($errors->has(''))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('') }}</p></span>
                      @endif

                    </div>
                  </div>

                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="alamatpraktek"> Alamat Praktek</label>
                    <textarea class="form-control" name="" id="alamatpraktek" placeholder="Belum Jadi"></textarea>
                    @if ($errors->has(''))
                      <span class="text-danger"><p class="text-right">* {{ $errors->first('') }}</p></span>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tptlahir" placeholder="Tempat Lahir">
                      </div>
                      @if ($errors->has('tptlahir'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('tptlahir') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgllahir" placeholder="Tanggal Lahir">
                      </div>
                      @if ($errors->has('tgllahir'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('tgllahir') }}</p></span>
                      @endif
                    </div>
                  </div>
                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="alamat"> Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>
                    @if ($errors->has('alamat'))
                      <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" name="notelp" placeholder="No Telepon">
                      </div>
                      @if ($errors->has('notelp'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('notelp') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jnskelamin">
                          <option value="">Jenis Kelamin</option>
                          <option value="Laki-laki">Laki - laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      @if ($errors->has('jnskelamin'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('jnskelamin') }}</p></span>
                      @endif
                    </div>
                    <div class="col-sm-3">
                      <!-- select -->
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
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-8">
                      <a href="" class="btn btn-outline-secondary btn-sm">Import Data Karyawan dan Dokter</a>
                      <a href="" class="btn btn-outline-secondary btn-sm">Download Format Data Karyawan dan Dokter</a>
                    </div>
                    <div class="col-sm-4 text-right">
                      <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i></button>
                      <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>  
                    </div>
                  </div>
                  
                </div>
              </form>
              <!-- /.form -->
 
            </div>
            <!-- /.card -->

            @else

              <!-- general form elements -->
              <div class="card card-primary card-outline" id="UbahKaryawan">
                <div class="card-header">
                  <h4 class="text-primary"><i class="fa fa-plus-circle"></i> Ubah</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('/Karyawan/update'.$ubah->idkaryawan)}}" method="post">
                  {{csrf_field()}}
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-5">
                        <!-- text input -->
                        <div class="form-group">
                          <label>NIK</label>
                          <input type="text" class="form-control" name="nik" placeholder="NIK" value="{{$ubah->nik}}">
                        </div>
                        @if ($errors->has('nik'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('nik') }}</p></span>
                        @endif
                      </div>
                      <div class="col-sm-7">
                        <!-- select -->
                        <div class="form-group">
                          <label>Jabatan</label>
                          <select class="form-control" name="idjabatan">
                            <option>Pilih Jabatan</option>
                            @foreach ($jabatans as $item)
                              <option value="{{$item->id}}" {{ ($item->id == $ubah->idjabatan) ? 'selected' : ''}}>{{$item->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        @if ($errors->has('idjabatan'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('idjabatan') }}</p></span>
                          @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-7">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$ubah->nama}}">
                        </div>
                        @if ($errors->has('nama'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                          @endif
                      </div>
                      <div class="col-sm-5">
                        <!-- text input -->
                        <div class="form-group">
                          <label>No KTP</label>
                          <input type="text" name="noktp" class="form-control" placeholder="No KTP" value="{{$ubah->noktp}}">
                        </div>
                        @if ($errors->has('noktp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('noktp') }}</p></span>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                          <label>No Register</label>
                          <input type="text" name="noregister" class="form-control" placeholder="NIK">
                        </div>
                        @if ($errors->has('noregister'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('noregister') }}</p></span>
                          @endif
                      </div>
                      <div class="col-sm-8">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Masa berlaku</label>
                            <div class="col">
                              <div class="row">
                                <span for="tanggaldari" class="col-form-label">Dari</span>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control" name="tanggaldari" id="tanggaldari" placeholder="Tanggal">
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="row">
                                <span for="tanggalsampai" class="col-form-label">Sd</span>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control" name="tanggalsampai" id="tanggalsampai" placeholder="Tanggal">
                                </div>
                              </div>
                            </div>
                                                 
                        </div>
                        @if ($errors->has('tanggaldari'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tanggaldari') }}</p></span>
                        @endif
                        @if ($errors->has('tanggalsampai'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tanggalsampai') }}</p></span>
                        @endif
  
                      </div>
                    </div>
  
                    <!-- input states -->
                    <div class="form-group">
                      <label class="col-form-label" for="alamatpraktek"> Alamat Praktek</label>
                      <textarea class="form-control" name="alamatpraktek" id="alamatpraktek" placeholder="Alamat Praktek"></textarea>
                      @if ($errors->has('alamatpraktek'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alamatpraktek') }}</p></span>
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-sm-7">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" class="form-control" name="tptlahir" placeholder="Tempat Lahir" value="{{$ubah->tptlahir}}">
                        </div>
                        @if ($errors->has('tptlahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tptlahir') }}</p></span>
                        @endif
                      </div>
                      <div class="col-sm-5">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tgllahir" placeholder="Tanggal Lahir" value="{{$ubah->tgllahir}}">
                        </div>
                        @if ($errors->has('tgllahir'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tgllahir') }}</p></span>
                        @endif
                      </div>
                    </div>
                    <!-- input states -->
                    <div class="form-group">
                      <label class="col-form-label" for="alamat"> Alamat</label>
                      <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat">{{$ubah->alamat}}</textarea>
                      @if ($errors->has('alamat'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>No Telepon</label>
                          <input type="text" class="form-control" name="notelp" placeholder="No Telepon" value="{{$ubah->notelp}}">
                        </div>
                        @if ($errors->has('notelp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('notelp') }}</p></span>
                        @endif
                      </div>
                      <div class="col-sm-4">
                        <!-- select -->
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <select class="form-control" name="jnskelamin">
                            <option value="Laki-laki" {{ ($ubah->jnskelamin == "Laki-laki") ? 'selected' : ''}}>Laki - laki</option>
                            <option value="Perempuan" {{ ($ubah->jnskelamin == "Perempuan") ? 'selected' : ''}}>Perempuan</option>
                          </select>
                        </div>
                        @if ($errors->has('jnskelamin'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('jnskelamin') }}</p></span>
                        @endif
                      </div>
                      <div class="col-sm-2">
                        <!-- select -->
                        <div class="form-group">
                          <label>Gol Darah</label>
                          <select class="form-control" name="goldarah">
                            <option value="Perempuan" {{ ($ubah->jnskelamin == "Perempuan") ? 'selected' : ''}}>Perempuan</option>
                            <option value="A" {{ ($ubah->goldarah == "A") ? 'selected' : ''}}>A</option>
                            <option value="B" {{ ($ubah->goldarah == "B") ? 'selected' : ''}}>B</option>
                            <option value="AB" {{ ($ubah->goldarah == "AB") ? 'selected' : ''}}>AB</option>
                            <option value="O" {{ ($ubah->goldarah == "O") ? 'selected' : ''}}>O</option>
                          </select>
                        </div>
                        @if ($errors->has('goldarah'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('goldarah') }}</p></span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-8">
                        <a href="" class="btn btn-outline-secondary btn-sm">Import Data Karyawan dan Dokter</a>
                        <a href="" class="btn btn-outline-secondary btn-sm">Download Format Data Karyawan dan Dokter</a>
                      </div>
                      <div class="col-sm-4 text-right">
                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check"></i></button>
                        <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>  
                      </div>
                    </div>
                    
                  </div>
                </form>
                <!-- /.form -->
   
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