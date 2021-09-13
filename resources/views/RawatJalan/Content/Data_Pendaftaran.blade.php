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
                <form action="{{url('/Pengirim_Faskes/store')}}" method="post">
                  {{csrf_field()}}
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
                    <div class="col-3">
                      <a class="btn btn-block btn-outline-info btn-lg" >
                          <i class="fas fa-filter"></i> Filter
                        </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-minus"></i></button></div>
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-primary"><i class="fas fa-calendar"></i> Bulan ini</button></div>
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-plus"></i></button></div>
                  </div>
                  <div class="row">
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-minus"></i></button></div>
                    <div class="col-6"><button type="button" class="btn btn-block btn-outline-primary"><i class="fas fa-calendar"></i> Hari ini</button></div>
                    <div class="col-3"><button type="button" class="btn btn-block btn-outline-success"><i class="fas fa-calendar-plus"></i></button></div>
                  </div>
                </form>
                <hr>

              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i></button>
                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  
                  <div class="col-sm-6 text-left">
                    <a class="btn btn-outline-success btn-sm" href="{{url('/Data_Pendaftaran/tambah/#TambahPendaftaranRawatJalan')}}"><i class="fa fa-plus-circle"></i> DAFTAR</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak Data Pendaftaran</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>No RM</th>
                    <th>Pasien</th>
                    <th>Tgl Masuk</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Perusahaan</th>
                    <th>Faskes</th>
                    <th>Inap</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Ayah</th>
                    <th>Penangung Jawab</th>
                    <th>Kunjungan Ke</th>
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
                      <td>{{$item->faktur_rawatjalan}}</td>
                      <td>{{$item->norm}}</td>
                      <td>{{$item->Pasien->namapasien}}</td>
                      <td>{{$item->tglmasuk}}</td>
                      <td>{{$item->Poliklinik->nama}}</td>
                      <td>{{$item->Dokter->nama}}</td>
                      <td>{{$item->Perusahaan->namaprsh}}</td>
                      <td>{{$item->Faskes->namafaskes}}</td>
                      <td><input type="checkbox" {{ ($item->inap == 1) ? 'checked' : ''}} readonly></td>
                      <td>{{$item->statustransaksi}}</td>
                      <td>{{$item->Pasien->alamat}}</td>
                      <td>{{$item->Pasien->namaayah}}</td>
                      <td>{{$item->Pasien->penanggungjawab}}</td>
                      <td>{{$item->kunjunganke}}</td>
                      <td>
                        <div class="row">
                          <div class="col"> </div>
                          <div class="col"><button type="button" class="btn btn-block btn-outline-success "><i class="fa fa-plus-circle"></i> PERIKSA</button></div>
                        </div>
                        <div class="row">
                          <div class="col"><a href="/Data_Pendaftaran/ubah{{$item->faktur_rawatjalan}}#UbahPendaftaranRawatJalan" class="btn btn-block btn-outline-primary btn-sm"><i class="fa fa-edit"></i> Ubah Daftar</a></div>
                          <div class="col"><button type="button" class="btn btn-block btn-outline-primary btn-sm"><i class="fas fa-clipboard-list"></i> Ubah Periksa</button></div>
                        </div>
                        <div class="row">
                          <div class="col"><a href="/Data_Pendaftaran/lihat{{$item->faktur_rawatjalan}}#LihatPendaftaranRawatJalan" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Lihat Daftar</a></div>
                          <div class="col"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Lihat Periksa</button></div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a href="/Data_Pendaftaran/hapus{{$item->faktur_rawatjalan}}" class="btn btn-block btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                              <i class="fa fa-minus-circle"></i> Hapus
                            </a> 
                          </div>
                          <div class="col"><button type="button" class="btn btn-block btn-outline-danger btn-sm"><i class="fa fa-minus-circle"></i> Batalkan</button></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <a href="/Rekam_Medis_Rawat_Jalan/index{{$item->faktur_rawatjalan}}" class="btn btn-block btn-outline-success btn-sm">
                              <i class="fa fa-plus-circle"></i> Rekam Medis RJ
                            </a> 
                          </div>
                          <div class="col"><button type="button" class="btn btn-block btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak Rekam Medis RJ</button></div>
                        </div>
                        <div class="row">
                          <div class="col"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Riwayat Resume Medis Pasien</button></div>
                        </div>
                        <div class="row">
                          <div class="col"><button type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-plus-circle"></i> Transfer Rawat Inap</button></div>
                          <div class="col"><button type="button" class="btn btn-block btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Pengantar Permintaan R I</button></div>
                        </div>
                        <br>
                        <div class="row">
                          <a href="/Data_Pendaftaran/cetakdatapendaftaran" class="btn btn-block btn-outline-secondary btn-sm">
                            <i class="fa fa-print"></i> Cetak Data Pendaftaran
                          </a> 
                        </div>
                        <div class="row">
                          <div class="col">
                            <select class="form-control form-control-sm" onchange="location = this.value;">
                              <option>Silahkan Pilih</option>
                              <option value="/Data_Pendaftaran/suratketerangansehat{{$item->faktur_rawatjalan}}">Surat Keterangan Sehat</option>
                              <option value="/Data_Pendaftaran/suratketerangansakit{{$item->faktur_rawatjalan}}">Surat Keterangan Sakit</option>
                            </select>
                          </div>
                          <div class="col">
                            <select class="form-control form-control-sm">
                              <option>Surat Keterangan Sehat</option>
                              <option>Surat Keterangan Sakit</option>
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <div class="form-group row">
                              <label for="copycetaklabel" class="col-sm-4 col-form-label"><span>Copy</span></label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="copycetaklabel" placeholder="Jumlah Copy">
                              </div>
                              <button type="button" class="btn btn-block btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak Label</button>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group row">
                              <label for="copycetakgelang" class="col-sm-4 col-form-label"><span>Copy</span></label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="copycetakgelang" placeholder="Jumlah Copy">
                              </div>
                              <button type="button" class="btn btn-block btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak Gelang</button>
                            </div>
                          </div>
                        </div>
        
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
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection