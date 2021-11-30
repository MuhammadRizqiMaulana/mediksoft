@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Pendaftaran Rawat Inap</h4>
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
            <div class="card card-success card-outline" id="TambahDataPendaftaranRawatInap">
              <!-- /.card-header -->
              <div class="card-body">
              <!-- form start -->
                <form action="" method="post">
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

                <div class="row">
                  <div class="col"><a class="btn btn-block btn-outline-success" href="{{url('/Data_Pendaftaran_Rawat_Inap/tambah/#TambahPendaftaranRawatJalan')}}"><i class="fa fa-plus-circle"></i> DAFTAR</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-success "><i class="fa fa-plus-circle"></i> PERAWATAN</button></div>
                </div>
                <div class="row">
                  <div class="col"><a href="" id="" class="btn btn-block btn-outline-primary btn-sm"><i class=""></i> Cari Pasien RI</a></div>
                  <div class="col"><a href="javascript:alert('Pilih baris data yang akan diubah!');" id="tombolubah" class="btn btn-block btn-outline-primary btn-sm"><i class="fa fa-print"></i> Ubah</a></div>
                </div>
                <div class="row">
                  <div class="col">
                    <a href="javascript:alert('Pilih baris data yang akan dihapus!');" id="tombolhapus" class="btn btn-block btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                      <i class="fa fa-minus-circle"></i> Hapus
                    </a> 
                  </div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-danger btn-sm"><i class="fa fa-minus-circle"></i> Batalkan</button></div>
                </div>
                <div class="row">
                  <div class="col"><a href="javascript:alert('Pilih baris data yang akan diubah!');" id="tombolubahkamar" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Ubah Kamar</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Pindah Kamar</button></div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <a href="" id="" class="btn btn-block btn-outline-success btn-sm">
                      <i class="fa fa-plus-circle"></i> Diagnosa & Prosedur
                    </a> 
                  </div>
                  <div class="col"><a href="javascript:alert('Pilih baris data yang akan diubah!');" id="tomboldetaildiagnosa" class="btn btn-block btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Detail Diagnosa</a></div>
                </div>
                <div class="row">
                  <div class="col"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Riwayat Resume Medis Pasien RJ</button></div>
                </div>
                <div class="row">
                  <div class="col"><button type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-plus-circle"></i> Asesmen Pasien Rawat Inap</button></div>
                </div>
                <br>
                <div class="row">
                  <div class="col"><a href="javascript:alert('Pilih baris data yang akan diubah!');" id="tomboldetailpendaftaran" class="btn btn-block btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Detail Pendaftaran</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Lihat Perawatan</button></div>
                </div>
                <div class="row">
                  <div class="col"><a href="" id="" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Cetak</a></div>
                  <div class="col"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Resume Medis</button></div>
                </div>
                <div class="row">
                  <div class="col"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-clipboard-list"></i> Surat Bukti Pelayanan RI</button></div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <div class="form-group row">
                      <label for="layout" class="col-sm-4 col-form-label"><span>Layout</span></label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm">
                          <option>Silahkan Pilih</option>
                          <option id="" value="">Layout Cetak</option>
                          <option id="" value="">Layout Resume Medis</option>
                          <option id="" value="">Layout Bukti Pelayanan</option>
                        </select>
                      </div>
                      <button type="button" class="btn btn-block btn-outline-secondary btn-sm">Layout</button>
                    </div>
                  </div>
                  
                </div>

              </div>
              <!-- /.card-body -->              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-8">
            <div class="card">
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th rowspan="2">No</th>
                    <th colspan="2" style="text-align:center">Faktur</th>
                    <th rowspan="2">No RM</th>
                    <th rowspan="2">Pasien</th>
                    <th rowspan="2">Kode Kamar</th>
                    <th rowspan="2">Kelas</th>
                    <th rowspan="2">Ruang</th>
                    <th colspan="2" style="text-align:center">Tanggal</th>
                    <th rowspan="2">Perusahaan</th>
                    <th rowspan="2">Dokter</th>
                    <th rowspan="2">Status</th>
                  </tr>
                  <tr>
                    <th>Rawat Inap</th>
                    <th>Rawat Jalan</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                    $no=1;   
                  @endphp
                  @foreach ($datas as $item)
                    <tr onclick="tombol('{{$item->faktur_rawatinap}}')">
                      <td>{{$no++}}</td>
                      <td>{{$item->faktur_rawatinap}}</td>
                      <td>{{$item->faktur_rawatjalan}}</td>
                      <td>{{$item->norm}}</td>
                      <td>{{$item->Pasien->namapasien}}</td>
                      <td>{{$item->kodekamar}}</td>
                      <td>kelas</td>
                      <td>ruang</td>
                      <td>{{$item->tglmasuk}}</td>
                      <td>{{$item->tglkeluar}}</td>
                      <td>{{$item->Perusahaan->namaprsh}}</td>
                      <td>{{$item->Dokter->nama}}</td>
                      <td>{{$item->statustransaksi}}</td>
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
<script>
  function tombol($faktur_rawatinap){
    $("a#tombolubah").attr("href", "/Data_Pendaftaran_Rawat_Inap/ubah"+ $faktur_rawatinap);
    $("a#tomboldetaildiagnosa").attr("href", "/Data_Pendaftaran_Rawat_Inap/detaildiagnosa"+ $faktur_rawatinap);
    $("a#tomboldetailpendaftaran").attr("href", "/Data_Pendaftaran_Rawat_Inap/detailpendaftaran"+ $faktur_rawatinap);
    $("a#tombolhapus").attr("href", "/Data_Pendaftaran_Rawat_Inap/hapus"+ $faktur_rawatinap);
    $("a#tombolubahkamar").attr("href", "/Ubah_Kamar"+ $faktur_rawatinap);
    //$("option#tombolsuratketerangansehat").attr("value", "/Data_Pendaftaran/suratketerangansehat"+ $faktur_rawatinap);
    //$("option#tombolsuratketerangansakit").attr("value", "/Data_Pendaftaran/suratketerangansakit"+ $faktur_rawatinap);
  }
</script>
@endsection