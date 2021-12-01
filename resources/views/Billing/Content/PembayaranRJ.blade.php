@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Billing.Layout.menu')
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
    @if(\Session::has('alert-danger'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fas fa-sign-out-alt"></i><b> Gagal!!</b></h6>
        {{Session::get('alert-danger')}}
    </div>
    @endif

    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row d-flex justify-content-center">
            <!-- /.col -->

                    <div class="col-5">
                    <!-- general form elements -->
                    <div class="card card-success card-outline" id="TambahDokter">

                        <div class="card-header">
                          <h4 class="text-success"></i> Pembayaran Rawat Jalan</h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/Dokter/store')}}" method="post">
                            {{csrf_field()}}

                            <div class="card-body">
                              <span>Tagihan</span>
                              <div class="row border">
                                <div class="col"><br>
                                  <div class="form-group row">
                                    <label for="nobayar_jalan" class="col-sm-4 col-form-label text-right">Nomor Tagihan</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nobayar_jalan" name="nobayar_jalan" placeholder="Nomor tagihan" value="" readonly>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-bayarrjalan">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('nobayar_jalan'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('nobayar_jalan') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="norm" class="col-sm-4 col-form-label text-right">No. RM</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="norm" name="norm" placeholder="No. RM" value="" readonly>
                                    </div>
                                    @if ($errors->has('norm'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('norm') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="namapasien" class="col-sm-4 col-form-label text-right">Nama Pasien</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="namapasien" name="namapasien" placeholder="Nama Pasien" value="" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="totaltagihan" class="col-sm-4 col-form-label text-right">Total Tagihan</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="totaltagihan" name="totaltagihan" placeholder="Total Tagihan" value="" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="pembulatan" class="col-sm-4 col-form-label text-right">Pembulatan</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="pembulatan" name="pembulatan" placeholder="Pembulatan" value="" readonly>
                                    </div>
                                    @if ($errors->has('pembulatan'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('pembulatan') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="jumlahbayar" class="col-sm-4 col-form-label text-right">Jumlah Bayar</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="jumlahbayar" name="jumlahbayar" placeholder="Jumlah Bayar" value="" readonly>
                                    </div>
                                    @if ($errors->has('jumlahbayar'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('jumlahbayar') }}</p>
                                        </span>
                                    @endif
                                  </div>

                                </div>
                              </div>
                              <br>
                              <span>Pembayaran</span>
                              <div class="row border">
                                <div class="col"><br>
                                  <div class="form-group row">
                                    <label for="tanggal" class="col-sm-4 col-form-label text-right">Tanggal</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="{{ date('Y-m-d H:i:s') }}">
                                            <div class="input-group-append">
                                              <button type="button" onclick="tanggalsekarang();" class="btn btn-outline-info">
                                                <i class="fas fa-sync"></i>
                                              </button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('tanggal'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('tanggal') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="metodebayar" class="col-sm-4 col-form-label text-right">No. RM</label>
                                    <div class="col-sm-8">
                                      <select id="metodebayar" name="metodebayar" class="form-control">
                                        <option value="">-- Pilih Metode Bayar --</option>
                                        <option value="Cash" onclick="sembunyikanbank();">Cash</option>
                                        <option value="Debit Card" onclick="tampilkanbank();">Debit Card</option>
                                        <option value="Transfer" onclick="tampilkanbank();">Transfer</option>
                                      </select>
                                    </div>
                                    @if ($errors->has('metodebayar'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('metodebayar') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="bank" class="col-sm-4 col-form-label text-right">Bank</label>
                                    <div class="col-sm-8">
                                      <select id="bank" name="idbank" class="form-control">
                                        <option value="">-- Pilih Bank --</option>
                                        @foreach ($bank as $item)
                                            <option value="{{$item->idbank}}">{{$item->namabank}}</option>
                                        @endforeach                                                    
                                      </select>
                                    </div>
                                    @if ($errors->has('idbank'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('idbank') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="noreferensi" class="col-sm-4 col-form-label text-right">No Referensi</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="noreferensi" name="noreferensi" placeholder="No Referensi" value="" >
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="namapembayar" class="col-sm-4 col-form-label text-right">Nama Pembayar</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="namapembayar" name="namapembayar" placeholder="Nama Pembayar" value="" >
                                    </div>
                                    @if ($errors->has('namapembayar'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('namapembayar') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="ambildarideposit" class="col-sm-4 col-form-label text-right">Ambil dari Deposit</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="number" class="form-control text-right" id="ambildarideposit" name="ambildarideposit" placeholder="Ambil dari Deposit" value="">
                                            <div class="input-group-append">
                                              <button type="button" onclick="" class="btn btn-outline-info">
                                                <i class="fas fa-sync"></i>
                                              </button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('ambildarideposit'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('ambildarideposit') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="uangbayar" class="col-sm-4 col-form-label text-right">Uang Bayar</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="number" class="form-control text-right" id="uangbayar" name="uangbayar" placeholder="Uang bayar" value="">
                                            <div class="input-group-append">
                                              <button type="button" onclick="" class="btn btn-outline-info">
                                                <i class="fas fa-sync"></i>
                                              </button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('uangbayar'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('uangbayar') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="kembalian" class="col-sm-4 col-form-label text-right">Kembalian</label>
                                    <div class="col-sm-8">
                                      <input type="number" class="form-control text-right" id="kembalian" name="kembalian" placeholder="Kembalian" value="" readonly>
                                    </div>
                                    @if ($errors->has('kembalian'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('kembalian') }}</p>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="form-group row">
                                    <label for="iduserkasir" class="col-sm-4 col-form-label text-right">Kasir</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="iduserkasir" name="iduserkasir" placeholder="Tanggal" value="">
                                            <div class="input-group-append">
                                              <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-karyawan">
                                                <i class="fa fa-search"></i>
                                              </button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('iduserkasir'))
                                        <span class="text-danger">
                                            <p class="text-right">* {{ $errors->first('iduserkasir') }}</p>
                                        </span>
                                    @endif
                                  </div>

                                </div>
                              </div>
                              
                        </div>


                            <!-- /.card-body -->
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check"></i> Simpan</button>
                      <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal</button>
                    </div>

                        </form>
                    </div>         

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  function tanggalsekarang() {
      var d = new Date();

      var month = d.getMonth()+1;
      var day = d.getDate();
      var hour = d.getHours();
      var minute = d.getMinutes();
      var second = d.getSeconds();

      var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day + ' ' +
          (hour<10 ? '0' : '') + hour + ':' +
          (minute<10 ? '0' : '') + minute + ':' +
          (second<10 ? '0' : '') + second;

      document.getElementById("tanggal").value = output;
    }
</script>

@endsection