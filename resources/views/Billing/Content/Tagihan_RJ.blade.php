@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Billing.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center mb-4">
        <img src="{{asset('images/icon/tagihanrj.png')}}">
        <h4 class="mb-0 text-gray-800">Simpan</h4>
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
              <div class="col-4">
                <!-- general form elements -->
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                  <!-- form start -->
                      <div class="form-group row">
                        <label for="tanggal" class="col-sm-4 col-form-label text-right">Tanggal</label>
                        <div class="col-sm-8">
                          <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" value="{{ date('d/m/Y H.i') }}"/>
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="norm" class="col-sm-4 col-form-label text-right">No. RM</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="norm" name="norm" placeholder="NO RM" value="@isset($rawatjalansatu) {{$rawatjalansatu->norm}} @endisset" readonly>
                        </div>
                        <div class="col-sm-1">
                          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-pasien">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="namapasien" class="col-sm-4 col-form-label text-right">Pasien</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namapasien" nama="namapasien" placeholder="Pasien" value="@isset($rawatjalansatu) {{$rawatjalansatu->Pasien->namapasien}} @endisset" readonly>
                        </div>
                        @if ($errors->has('norm'))
                        <span class="text-danger">
                            <p class="text-right">* {{ $errors->first('norm') }}</p>
                        </span>
                      @endif
                      </div>
                      <div class="form-group row">
                        <label for="statuspulang" class="col-sm-4 col-form-label text-right">Status Pulang</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="statuspulang" name="statuspulang">
                              <option value="">Silahkan Pilih Status</option>
                            @foreach ($statuspulang as $item)
                              <option value="{{$item->kodepulang}}">{{$item->statuspulang}}</option>
                            @endforeach
                          </select>
                        </div>
                        @if ($errors->has('statuspulang'))
                        <span class="text-danger">
                            <p class="text-right">* {{ $errors->first('statuspulang') }}</p>
                        </span>
                      @endif
                      </div>
                      <div class="form-group row">
                        <label for="kasir" class="col-sm-4 col-form-label text-right">Kasir</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="iduserkasir" name="iduserkasir" placeholder="Kasir" hidden>
                          <input type="text" class="form-control" id="namakasir" name="namakasir" placeholder="Kasir" readonly>
                        </div>
                        <div class="col-sm-1">
                          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-karyawan">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                        @if ($errors->has('iduserkasir'))
                        <span class="text-danger">
                            <p class="text-right">* {{ $errors->first('iduserkasir') }}</p>
                        </span>
                      @endif
                      </div>
                      <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" rows="3" id="catatan" name="catatan" placeholder="Catatan">@isset($datas) {{$datas->catatan}} @endisset</textarea>
                        @if ($errors->has('catatan'))
                        <span class="text-danger">
                            <p class="text-right">* {{ $errors->first('catatan') }}</p>
                        </span>
                      @endif
                      </div>
                      <hr>
                      <div class="form-group text-center">
                        <a class="btn btn-app" href="">
                          <i class="fas fa-edit"></i> Pelayanan Poli
                        </a>
                        <button class="btn btn-default text-center">
                          <a class="users-list-name" href="">
                            <img src="{{asset('images/icon/tagihanrj.png')}}"><br>
                            Buat Tagihan</a>
                        </button>
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
                    <div class="row">
                      <div class="col">
                        <table class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th></th>
                            <th>Faktur Rawat Jalan</th>
                            <th>Tanggal</th>
                            <th>Poliklinik</th>
                            <th>Dokter</th>
                            <th>Perusahaan/Jaminan</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          @php
                            $norj=1;   
                          @endphp
                          @isset($rawatjalanbanyak)
                            @foreach ($rawatjalanbanyak as $urutanrjb => $item)
                              @php
                                  $biayatransaksi = 0;
                                  foreach ($item->Rawatjalan_transaksi as $key => $itemrjt) {
                                    $biayatransaksi = $biayatransaksi + ($itemrjt->tarif * $itemrjt->jumlah);
                                  }
                                  $biaya = $biayatransaksi + ($item->tarifdokter*1) + ($item->administrasi*1);
                              @endphp
                            
                              <tr>
                                <td>{{$norj++}}</td>
                                <td><input type="checkbox" name="chekbiaya" value="{{$biaya}}" checked onclick="hitungsubtotalbiaya('chekbiaya');"></td>
                                <td>{{$item->faktur_rawatjalan}}</td>
                                <td>{{$item->tglmasuk}}</td>
                                <td>{{$item->Poliklinik->nama}}</td>
                                <td>{{$item->Dokter->nama}}</td>
                                <td>{{$item->Perusahaan->namaprsh}}</td>
                                <td class="text-right">@rupiah($biaya)</td>
                                <td>
                                  <button class="btn btn-outline-info btn-sm"
                                  onclick="selecttransaksirj('{{$item->faktur_rawatjalan}}');"><i
                                      class="fa fa-check"></i> Lihat Transaksi</button></td>
                              </tr>
                            @endforeach
                          @endisset
                          
                          </tbody>               
                        </table>
                      </div>
                      
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-4"></div>
                      <div class="col-8">
                        <div class="form-group row">
                          <label for="subtotal" class="col-sm-4 col-form-label text-right">Sub Total</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control bg-primary text-right" id="subtotal" value="0" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="diskpersen" class="col-sm-4 col-form-label text-right">Disk. Persen</label>
                          <div class="col-sm-2">
                            <input type="number" class="form-control text-right" id="diskpersen" maxlength="3" value="0" oninput="hitungsubtotalbiaya('chekbiaya');">
                          </div>
                          <div class="col-sm-1">
                            <label class="col-form-label">%</label>
                          </div>
                          <div class="col-sm-5">
                            <input type="number" class="form-control bg-light text-right" id="diskpersenhasil" value="0" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="disknilai" class="col-sm-4 col-form-label text-right">Disk. Nilai</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control text-right" id="disknilai" value="0" oninput="hitungsubtotalbiaya('chekbiaya');">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="pembulatandiskon" class="col-sm-4 col-form-label text-right">Pembulatan Diskon</label>
                          <div class="col-sm-2">
                            <input type="number" class="form-control bg-light text-right" id="pembulatandiskon" maxlength="3" value="0" readonly>
                          </div>
                          <div class="col-sm-1">
                            <label class="col-form-label">+</label>
                          </div>
                          <div class="col-sm-5">
                            <input type="number" class="form-control bg-light text-right" id="pembulatandiskonhasil" value="0" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="totaltagihan" class="col-sm-4 col-form-label text-right">Total Tagihan</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control bg-primary text-right" id="totaltagihan" value="0" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    @php
                      $norjb=1;   
                    @endphp
                    
                    <div class="row">
                      <div class="col">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kategori</th>
                              <th>No Transaksi</th>
                              <th>Transaksi</th>
                              <th>Tarif</th>
                              <th>Jumlah</th>
                              <th>Subtotal</th>
                            </tr>
                          </thead>
                          @php
                            $noitem=1;  
                            $totaltransaksi = 0; 
                            $totaltarif = 0;
                            $totaljumlah = 0;
                          @endphp
                          @isset($rawatjalansatu)
                            <tbody>
                              <tr>
                                <td colspan="7">Kategori : ADMINISTRASI (1)</td>
                              </tr>
                              <tr>
                                <td>{{$noitem++}}</td>
                                <td>ADMINISTRASI</td>
                                <td>{{$rawatjalansatu->faktur_rawatjalan}}</td>
                                <td>Biaya Administrasi</td>
                                <td><input type="number" class="form-control bg-white form-control-border text-right" value="@rupiah($rawatjalansatu->administrasi)" readonly></td>
                                <td width="10"><input type="number" class="form-control bg-white form-control-border text-right" value="1" readonly></td>
                                <td><input type="number" class="form-control bg-white form-control-border text-right" value="@rupiah($rawatjalansatu->administrasi * 1)" readonly></td>                                  
                              </tr>
                              <tr>
                                <td colspan="7">Kategori : BIAYA DOKTER (1)</td>
                              </tr>
                              <tr>
                                <td>{{$noitem++}}</td>
                                <td>BIAYA DOKTER</td>
                                <td>{{$rawatjalansatu->faktur_rawatjalan}}</td>
                                <td>Biaya Dokter</td>
                                <td><input type="number" class="form-control bg-white form-control-border text-right" value="@rupiah($rawatjalansatu->tarifdokter)" readonly></td>
                                <td width="10"><input type="number" class="form-control bg-white form-control-border text-right" value="1" readonly></td>
                                <td><input type="number" class="form-control bg-white form-control-border text-right" value="@rupiah($rawatjalansatu->tarifdokter * 1)" readonly></td>                                  
                              </tr>
                              @php
                                $totaltarif = $totaltarif + ($rawatjalansatu->administrasi + $rawatjalansatu->tarifdokter);
                                $totaljumlah = $totaljumlah + (1+1);
                                $totaltransaksi = $totaltransaksi + (($rawatjalansatu->administrasi * 1)+($rawatjalansatu->tarifdokter * 1));
                              @endphp
                              
                              @if (count($rawatjalansatu->Rawatjalan_transaksi) > 0)
                                <tr>
                                  <td colspan="7">Kategori : TINDAKAN POLI ({{count($rawatjalansatu->Rawatjalan_transaksi)}})</td>
                                </tr>
                              @endif
                              @foreach ($rawatjalansatu->Rawatjalan_transaksi as $itemrawatjalantransaksi)
                                <tr>
                                  <td>{{$noitem++}}</td>
                                  <td>TINDAKAN POLI</td>
                                  <td>{{$itemrawatjalantransaksi->notransaksi}}</td>
                                  <td>{{$itemrawatjalantransaksi->namatransaksi}}</td>
                                  <td><input type="number" class="form-control bg-white form-control-border text-right" value="@rupiah($itemrawatjalantransaksi->tarif)" readonly></td>
                                  <td width="10"><input type="number" class="form-control bg-white form-control-border text-right" value="{{$itemrawatjalantransaksi->jumlah}}" readonly></td>
                                  <td><input type="number" class="form-control bg-white form-control-border text-right" value="@rupiah($itemrawatjalantransaksi->tarif * $itemrawatjalantransaksi->jumlah)" readonly></td>                                  
                                </tr>
                                @php
                                    $totaltarif = $totaltarif + $itemrawatjalantransaksi->tarif;
                                    $totaljumlah = $totaljumlah + $itemrawatjalantransaksi->jumlah;
                                    $totaltransaksi = $totaltransaksi + ($itemrawatjalantransaksi->tarif * $itemrawatjalantransaksi->jumlah);
                                @endphp
                              @endforeach  
                                                              
                            </tbody>
                          @endisset
                          <tfoot>
                            <tr><th colspan="7"></th></tr>
                            <tr>
                              <th>{{$noitem-1}}</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th><input type="number" class="form-control bg-default form-control-border text-right" value="@rupiah($totaltarif)" readonly></th>
                              <th><input type="number" class="form-control bg-default form-control-border text-right" value="@rupiah($totaljumlah)" readonly></th>
                              <th><input type="number" class="form-control bg-default form-control-border text-right" value="@rupiah($totaltransaksi)" readonly></th>
                            </tr>
                          </tfoot> 
                            
                        </table>
                      </div> 
                    </div>
                    <br>
                      
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-outline-danger" type="button"><i class="fa fa-times"></i> Batal</button>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      hitungsubtotalbiaya('chekbiaya');
    });

    function pasien($norm, $namapasien) {
        document.getElementById("norm").value = $norm;
        document.getElementById("namapasien").value = $namapasien;
        $(".close").click();
        window.location.href = "/Tagihan_RJ/selectnorm"+ $norm;
    }

    function karyawan($idkaryawan, $nama) {
        document.getElementById("iduserkasir").value = $idkaryawan;
        document.getElementById("namakasir").value = $nama;
        $(".close").click();
    }
    
    function selecttransaksirj($faktur_rawatjalan){
      window.location.href = "/Tagihan_RJ/selectfakturrj"+ $faktur_rawatjalan;     
    }

    function hitungsubtotalbiaya(name) {
      const checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`);
      var subtotal = 0;
      var totaltagihan = 0;
      var diskpersen = parseFloat(document.getElementById('diskpersen').value);
      var disknilai = parseFloat(document.getElementById('disknilai').value);

      checkboxes.forEach((checkbox) => {
        subtotal = subtotal + eval(checkbox.value);
      });

      var diskpersenhasil = (diskpersen / 100) * subtotal;
      var disknilai = subtotal - disknilai - diskpersenhasil;
      var totaltagihan = Math.round(disknilai / 1000) * 1000;
      var pembulatandiskon = totaltagihan - disknilai;
      var pembulatandiskonhasil = totaltagihan - pembulatandiskon;

      document.getElementById('subtotal').value = subtotal;
      document.getElementById('diskpersenhasil').value = diskpersen;
      document.getElementById('pembulatandiskon').value = pembulatandiskon;
      document.getElementById('pembulatandiskonhasil').value = pembulatandiskonhasil;
      document.getElementById('totaltagihan').value = totaltagihan;
    }

  </script>

@endsection