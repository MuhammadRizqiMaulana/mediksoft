@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Ubah Kamar</h4>
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
          <form action="{{url('/Ubah_Kamar/update'.$ubah->faktur_rawatinap)}}" method="post">
            {{csrf_field()}}
            <div class="card-body">
              <!-- Baris ke 1-->
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >No Pendaftaran</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="{{$ubah->faktur_rawatinap}}" readonly></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Pasien</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="{{$ubah->Pasien->namapasien}}" readonly></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Kode Kamar</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="{{$ubah->kodekamar}}" readonly></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Ruang</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="" readonly></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Tanggal Masuk Kamar</label></div>
                      <div class="col-9"><input type="datetime" class="form-control" value="{{$ubah->tglmasuk}}" readonly></div>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Kelas Kamar</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="" readonly></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Tarif Kamar</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="" readonly></div>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <br>
              <!-- /.row -->
              <!-- Baris ke 2-->
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Ubah ke kamar</label></div>
                      <div class="col-9">
                        <select name="kodekamar" class="form-control">
                          @foreach ($kamar as $item)
                              <option value="{{$item->kodekamar}}">{{$item->kodekamar}} | {{$item->Ruang->namaruang}} | {{$item->Kelas->nama}} | {{$item->tarif}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Kelas Kamar</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="" readonly></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Ruang</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="" readonly></div>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-3 text-right"><label >Tarif</label></div>
                      <div class="col-9"><input type="text" class="form-control" value="" readonly></div>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
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
          </form>
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