@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Status Pulang</h4>
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
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label >Nomor Rawat Inap</label></div>
                    <div class="col-8"><input type="text" class="form-control"></div>
                    <div class="col-1"><Button>Cari</Button></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Nomor RM</label></div>
                    <div class="col-9"><input type="text" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Pasien</label></div>
                    <div class="col-9"><input type="text" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Tgl Masuk</label></div>
                    <div class="col-9"><input type="datetime" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label >Diagnosa Awal</label></div>
                    <div class="col-9"><input type="text" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Diagnosa Akhir</label></div>
                    <div class="col-8"><input type="text" class="form-control"></div>
                    <div class="col-1"><button> Cari</button></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Penanggung Jawab</label></div>
                    <div class="col-9"><input type="text" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Kode Kamar</label></div>
                    <div class="col-9"><input type="text" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Kelas / Ruang</label></div>
                    <div class="col-9"><input type="text" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Tgl Keluar</label></div>
                    <div class="col-8"><input type="datetime" class="form-control"></div>
                    <div class="col-1"><button>Cari</button></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3"><label>Status Pulang</label></div>
                    <div class="col-5"><select class="form-control"><option>Dijinkan Pulang</option></select></div>
                    <div class="col-4">
                      <div class="row">
                        <div class="col"><label>Kondisi Pulang</label></div>
                        <div class="col"><select class="form-control"><option>...</option></select></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3">
                      <div class="row"><div class="col"><label>Instruksi Lanjutan</label></div></div>
                      <div class="row"><div class="col"><label>Tgl</label></div></div>
                      <div class="row"><div class="col"><label>Poli Tujuan</label></div></div>
                    </div>
                    <div class="col-5">
                      <div class="row"><div class="col"><select class="form-control">Diet</select></div></div>
                      <div class="row"><div class="col"><input type="datetime" class="form-control"></div></div>
                      <div class="row"><div class="col"><select class="form-control">Poli Umum</select></div></div>
                    </div>
                    <div class="col-4">
                      <div class="row"><div class="col"><label>Status Pulang</label></div></div>
                      <div class="row"><div class="col"><textarea class="form-control"></textarea></div></div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Status Pulang</label></div>
                    <div class="col-3">
                      <div class="row">
                        <div class="col"><select><option>Dijinkan Pulang</option></select></div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col">Kondisi Pulang</div>
                        <div class="col"><select><option>...</option></select></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 "><label>Instruksi Lanjutan</label></div>
                    <div class="col-3">
                      <div class="row">
                        <div class="col"><select><option>Diet</option></select></div>
                      </div>
                      <div class="row">
                        <div class="col"><input type="datetime" class="form-control"></div>
                      </div>
                      <div class="row">
                        <div class="col"><select><option>Dijinkan Pulang</option></select></div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col">Kondisi Pulang</div>
                        <div class="col"><select><option>...</option></select></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <!-- /.row -->
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col text-right">
                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" onclick="window.location.href='{{url('Data_Pendaftaran_Rawat_Inap')}}'"
                  class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal
                </button>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
  function tombol($faktur_rawatinap){
    //$("a#tombolubah").attr("href", "/Data_Pendaftaran/ubah"+ $faktur_rawatinap +"#UbahPendaftaranRawatJalan");
    $("a#tomboldetaildiagnosa").attr("href", "/Data_Pendaftaran_Rawat_Inap/detaildiagnosa"+ $faktur_rawatinap);
    //$("a#tombolhapus").attr("href", "/Data_Pendaftaran/hapus"+ $faktur_rawatinap);
    //$("a#tombolrekammedisrj").attr("href", "/Rekam_Medis_Rawat_Jalan/index"+ $faktur_rawatinap);
    //$("option#tombolsuratketerangansehat").attr("value", "/Data_Pendaftaran/suratketerangansehat"+ $faktur_rawatinap);
    //$("option#tombolsuratketerangansakit").attr("value", "/Data_Pendaftaran/suratketerangansakit"+ $faktur_rawatinap);
  }
</script>
@endsection