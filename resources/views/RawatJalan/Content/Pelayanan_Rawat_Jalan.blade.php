@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Pelayanan Rawat Jalan</h4>
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
        <h6><i class="fas fa-sign-out-alt"></i><b> gagal!!</b></h6>
        {{Session::get('alert-danger')}}
    </div>
  @endif
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <!-- Form Atas Kolom 1-->
              <div class="col ml-2 mr-2">
                <div class="row">    
                  <div class="col-3 text-right">
                    <label>Faktur Rawat Jalan</label>
                  </div>
                  <div class="col-8">
                    <input type="text" name="faktur_rawatjalan" id="faktur_rawatjalan" class="form-control" placeholder="Faktur Rawat Jalan" value="@isset($datas) {{$datas->faktur_rawatjalan}} @endisset" readonly >
                  </div>
                  <div class="col-1">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-rawatjalan">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Tanggal Masuk</label>
                  </div>
                  <div class="col-8">
                    <input type="datetime" class="form-control" placeholder="Tanggal Masuk" value="@isset($datas) {{$datas->tglmasuk}} @endisset" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>No.RM / Nama</label>
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Nomor RM" value="@isset($datas) {{$datas->norm}} @endisset" readonly >
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" placeholder="Nama" value="@isset($datas) {{$datas->Pasien->namapasien}} @endisset" readonly >
                  </div>
                </div>

              </div>
              <!-- Form Atas Kolom 2-->
              <div class="col ml-2 mr-2">
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Poliklinik</label>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Poliklinik" value="@isset($datas) {{$datas->Poliklinik->nama}} @endisset" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Dokter</label>
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" placeholder="Dokter" value="@isset($datas) {{$datas->Dokter->nama}} @endisset" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 text-right">
                    <label>Tgl Pelayanan</label>
                  </div>
                  <div class="col-8">
                    <input type="datetime" class="form-control" placeholder="Tanggal Pelayanan" value="{{$now}}" readonly >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <label>TINDAKAN POLIKLINIK</label>
            </div>
            <div class="row">
              <span class="text-danger">* khusus untuk pemeriksaan lab/rad tanpa melalui pendaftaran, pilih transaksi laboratorium / radiologi</span>
            </div>
            <br>
            <form action="{{url('/Pelayanan_Rawat_Jalan/store')}}" method="post">
              {{csrf_field()}}
              <input type="text" name="faktur_rawatjalan" id="faktur_rawatjalan" placeholder="Faktur Rawat Jalan" value="@isset($datas) {{$datas->faktur_rawatjalan}} @endisset" readonly hidden >
              <div class="row">
                <div class="col-3">
                  <h6>Transaksi</h6>
                  <select name="transaksi" class="form-control" disabled>
                    <option value="" selected>Poliklinik</option>
                  </select>
                  <div class="row">
                    <input type="number" name="tariftersembunyi" id="tariftersembunyi" hidden>
                    <div class="col-3">Jumlah </div>
                    <div class="col-9"><input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" oninput="tambahtarif()"></div>
                  </div>
                </div>
                <div class="col-3">
                  <h6>Kode</h6>
                  <div class="row">
                    <div class="col-10"><input type="text" class="form-control" name="idtindakan" id="idtindakan"></div>
                    <div class="col-2">
                      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-tariftindakanpoli">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">Tarif </div>
                    <div class="col-9"><input type="number" name="tarif" id="tarif" class="form-control" value="0" min="0"></div>
                  </div>
                </div>
                <div class="col-6">
                  <h6>Nama Tindakan</h6>
                  <input type="text" name="namatransaksi" id="namatransaksi" class="form-control">
                  <button type="submit" class="btn btn-outline-success"><i
                    class="fa fa-plus-circle"></i> Tambah
                  </button>
                </div>
              </div>
            </form>

            <br>
            <hr>

            <!-- Tabel -->
            <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Tindakan</th>
                          <th>Jumlah</th>
                          <th>Tarif</th>
                          <th>Total</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @isset($rawatjalantransaksi)
                          @foreach ($rawatjalantransaksi as $item)
                            <tr>
                              <td>{{$item->kodekategori}}</td>
                              <td>{{$item->namatransaksi}}</td>
                              <td width="10" ><input type="text" class="form-control form-control-border" value="{{$item->jumlah}}"> </td>
                              <td>{{$item->Tariftindakanpoli->tarif}}</td>
                              <td>{{$item->tarif}}</td>
                              <td width="100">
                                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-ubahtindakanpoli" onclick="ubahtindakanpoli('{{$item->notransaksi}}','{{$item->namatransaksi}}','{{$item->jumlah}}','{{$item->Tariftindakanpoli->tarif}}','{{$item->tarif}}')">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <a href="/Pelayanan_Rawat_Jalan/hapus{{$item->notransaksi}},{{$item->faktur_rawatjalan}}"
                                  class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                  <i class="fa fa-minus-circle"></i>
                              </a>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>@isset($totalharga){{$totalharga}}@endisset</th>
                          <th></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  
                </div>
                
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-header">
                    Tenaga Medis
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Nama</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col"><span class="text-danger">qwerty</span></div>
              <div class="col text-right">
                <button type="submit" class="btn btn-outline-primary"><i
                  class="fa fa-save"></i> Simpan
                </button>
                <button type="reset" class="btn btn-outline-danger"><i
                  class="fa fa-times"></i> Batal
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
  <!-- Modal Detail Alergi Pasien -->
<div class="modal fade" id="modal-ubahtindakanpoli">
  <div class="modal-dialog modal-lg">
    <form id="form-ubahtindakanpoli" method="post">
      {{csrf_field()}}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Tindakan Poli</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Tindakan</th>
            <th>Jumlah</th>
            <th>Tarif</th>
            <th>Total</th>
          </tr>
          </thead>
          <tbody>
            <form>
            <tr>
              <td><input type="text" id="ubahtindakan" name="ubahtindakan" class="form-control form-control-border" readonly></td>
              <td><input type="text" id="ubahjumlah" name="ubahjumlah" class="form-control form-control-border" oninput="ubahtambahtarif()"></td>   
              <td>
                <input type="text" id="ubahtarif" name="ubahtarif" class="form-control form-control-border" readonly>
                <input type="text" id="ubahtariftersembunyi" name="ubahtariftersembunyi" class="form-control form-control-border" hidden>
              </td>
              <td><input type="text" id="ubahtotal" name="ubahtotal" class="form-control form-control-border" readonly></td>
            </tr> 
            
          </tbody>                         
        </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-info"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-outline-danger" type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-minus-circle"></i> Batal</button>
      </div>
    </div>
    <!-- /.modal-dialog -->
    </form>
  </div>
</div>
<!-- Modal Modal Detail Alergi Pasien -->


  <script type="text/javascript">
    function rawatjalan($faktur_rawatjalan) {
      document.getElementById("faktur_rawatjalan").value = $faktur_rawatjalan;
      $(".close").click();
      window.location.href = "/Pelayanan_Rawat_Jalan/select"+ $faktur_rawatjalan;
    }

    function tariftindakanpoli($idtindakan, $namatindakan, $tarif) {
      document.getElementById("idtindakan").value = $idtindakan;
      document.getElementById("namatransaksi").value = $namatindakan;
      document.getElementById("tarif").value = $tarif;
      document.getElementById("tariftersembunyi").value = $tarif;
      $(".close").click();
    }
    
    function tambahtarif() {
      var angka1 = parseFloat(document.getElementById('tariftersembunyi').value);
      var angka2 = parseFloat(document.getElementById('jumlah').value);
      var hasil = angka1 * angka2;
      document.getElementById('tarif').value = hasil;
    }

    function ubahtindakanpoli($notransaksi, $namatransaksi, $jumlah, $tariftindakanpoli, $tarif) {
      $("#form-ubahtindakanpoli").attr("action", "/Pelayanan_Rawat_Jalan/update" + $notransaksi);
      document.getElementById("ubahtindakan").value = $namatransaksi;
      document.getElementById("ubahjumlah").value = $jumlah;
      document.getElementById("ubahtarif").value = $tariftindakanpoli;
      document.getElementById("ubahtotal").value = $tarif;
      document.getElementById("ubahtariftersembunyi").value = $tariftindakanpoli;
    }

    function ubahtambahtarif() {
      var angka1 = parseFloat(document.getElementById('ubahtariftersembunyi').value);
      var angka2 = parseFloat(document.getElementById('ubahjumlah').value);
      var hasil = angka1 * angka2;
      document.getElementById('ubahtotal').value = hasil;
    }
  </script>

@endsection