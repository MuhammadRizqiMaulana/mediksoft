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
                <div class="col-8">
                    @if(isset($lihatdetail) == NULL)
                        <!-- general form elements -->
                        <div class="card card-success card-outline" id="TambahDeposit">
                            <div class="card-header">
                                <h4 class="text-success"></i> Deposit</h4>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/Data_Deposit/store')}}" method="post">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">Data Transaksi</div>
                                    <div class="row border">
                                        <div class="col"><br>
                                            <div class="form-group row">
                                                <label for="norm" class="col-sm-4 col-form-label">No RM</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="norm" name="norm" placeholder="No RM" value="@isset($selectpasien) {{$selectpasien->norm}} @endisset" readonly>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-pasien">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($errors->has('norm'))
                                                    <span class="text-danger">
                                                        <p class="text-right">* {{ $errors->first('norm') }}</p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="{{$now}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="metodebayar" class="col-sm-4 col-form-label">Metode Bayar</label>
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
                                        </div>
                                        <div class="col"><br>
                                            <div class="form-group row">
                                                <label for="namapasien" class="col-sm-4 col-form-label">Nama Pasien</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="namapasien" placeholder="Nama Pasien" value="@isset($selectpasien) {{$selectpasien->namapasien}} @endisset" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jenistransaksi" class="col-sm-4 col-form-label">Jenis Transaksi</label>
                                                <div class="col-sm-8">
                                                    <select id="jenistransaksi" name="idjenistransaksi" class="form-control">
                                                        <option value="">-- Pilih Jenis Transaksi --</option>
                                                        @foreach ($transdeposit_jenis as $item)
                                                            <option value="{{$item->idjenistransaksi}}">{{$item->namatransaksi}}</option>
                                                        @endforeach                                                    
                                                    </select>
                                                </div>
                                                @if ($errors->has('idjenistransaksi'))
                                                    <span class="text-danger">
                                                        <p class="text-right">* {{ $errors->first('idjenistransaksi') }}</p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <label for="karyawan" class="col-sm-4 col-form-label">Karyawan</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <select id="karyawan" name="iduserkasir" class="form-control">
                                                            @foreach ($karyawan as $item)
                                                                <option value="{{$item->idkaryawan}}">{{$item->nama}}</option>
                                                            @endforeach                                                    
                                                        </select>
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
                                    <br>
                                    <div class="row" id="sembunyikanbank">
                                        <div class="col">
                                            <div class="row">Data Bank</div>
                                            <div class="row border">
                                                <div class="col"><br>
                                                    <div class="form-group row">
                                                        <label for="bank" class="col-sm-4 col-form-label">Bank</label>
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
                                                </div>
                                                <div class="col"><br>
                                                    <div class="form-group row">
                                                        <label for="noref" class="col-sm-4 col-form-label">No Referensi</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control text-right" id="noref" name="noref" placeholder="0">
                                                        </div>
                                                        @if ($errors->has('noref'))
                                                            <span class="text-danger">
                                                                <p class="text-right">* {{ $errors->first('noref') }}</p>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">Keterangan</div>
                                            <div class="row border">
                                                <div class="col">
                                                    <div class="form-group"><br>
                                                        <textarea class="form-control" rows="6" maxlength="1000" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
                                                        @if ($errors->has('keterangan'))
                                                            <span class="text-danger">
                                                                <p class="text-right">* {{ $errors->first('keterangan') }}</p>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">Saldo Terakhir</div>
                                                    <div class="row border">
                                                        <div class="col">
                                                            <div class="form-group"><br>
                                                                <input type="text" class="form-control form-control-lg bg-primary text-right"  placeholder="0" value="@isset($saldoterakhir) @rupiah($saldoterakhir) @endisset" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">Pembayaran / Penarikan</div>
                                                    <div class="row border">
                                                        <div class="col">
                                                            <div class="form-group"><br>
                                                                <input type="number" id="nominal" name="nominal" class="form-control bg-success form-control-lg text-right" placeholder="0" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-outline-success"><i class="far fa-save"></i>
                                        Simpan</button>
                                    <button type="reset" onclick="window.location.href='{{url('Data_Deposit')}}'"
                                        class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    @elseif(isset($lihatdetail) == !NULL)
                        <!-- general form elements -->
                        <div class="card card-info card-outline" id="TambahDeposit">
                            <div class="card-header">
                                <h4 class="text-info"></i> Deposit</h4>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">Data Transaksi</div>
                                <div class="row border">
                                    <div class="col"><br>
                                        <div class="form-group row">
                                            <label for="norm" class="col-sm-4 col-form-label">No RM</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="norm" name="norm" placeholder="No RM" value="{{$lihatdetail->norm}}" disabled>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-pasien" disabled>
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="{{$lihatdetail->tanggal}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="metodebayar" class="col-sm-4 col-form-label">Metode Bayar</label>
                                            <div class="col-sm-8">
                                                <select id="metodebayar" name="metodebayar" class="form-control" disabled>
                                                    <option value="Cash" {{($lihatdetail->metodebayar == "Cash") ? 'selected':''}}>Cash</option>
                                                    <option value="Debit Card" {{($lihatdetail->metodebayar == "Debit Card") ? 'selected':''}}>Debit Card</option>
                                                    <option value="Transfer" {{($lihatdetail->metodebayar == "Transfer") ? 'selected':''}}>Transfer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col"><br>
                                        <div class="form-group row">
                                            <label for="namapasien" class="col-sm-4 col-form-label">Nama Pasien</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="namapasien" placeholder="Nama Pasien" value="{{$lihatdetail->Pasien->namapasien}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenistransaksi" class="col-sm-4 col-form-label">Jenis Transaksi</label>
                                            <div class="col-sm-8">
                                                <select id="jenistransaksi" name="idjenistransaksi" class="form-control" disabled>
                                                    @foreach ($transdeposit_jenis as $item)
                                                        <option value="{{$item->idjenistransaksi}}" {{($lihatdetail->idjenistransaksi == $item->idjenistransaksi) ? 'selected':''}}>{{$item->namatransaksi}}</option>
                                                    @endforeach                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="karyawan" class="col-sm-4 col-form-label">Karyawan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select id="karyawan" name="iduserkasir" class="form-control" disabled>
                                                        @foreach ($karyawan as $item)
                                                            <option value="{{$item->idkaryawan}}" {{($lihatdetail->idkaryawan == $item->idkaryawan) ? 'selected':''}}>{{$item->nama}}</option>
                                                        @endforeach                                                    
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-karyawan" disabled>
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" id="sembunyikanbank">
                                    <div class="col">
                                        <div class="row">Data Bank</div>
                                        <div class="row border">
                                            <div class="col"><br>
                                                <div class="form-group row">
                                                    <label for="bank" class="col-sm-4 col-form-label">Bank</label>
                                                    <div class="col-sm-8">
                                                        <select id="bank" name="idbank" class="form-control" disabled>
                                                            <option value="">-- Pilih Bank --</option>
                                                            @foreach ($bank as $item)
                                                                <option value="{{$item->idbank}}" {{($lihatdetail->idbank == $item->idbank) ? 'selected':''}}>{{$item->namabank}}</option>
                                                            @endforeach                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col"><br>
                                                <div class="form-group row">
                                                    <label for="noref" class="col-sm-4 col-form-label">No Referensi</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control text-right" id="noref" name="noref" placeholder="0" value="{{$lihatdetail->noref}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">Keterangan</div>
                                        <div class="row border">
                                            <div class="col">
                                                <div class="form-group"><br>
                                                    <textarea class="form-control" rows="6" maxlength="1000" id="keterangan" name="keterangan" placeholder="Keterangan" disabled>{{$lihatdetail->keterangan}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">Saldo Terakhir</div>
                                                <div class="row border">
                                                    <div class="col">
                                                        <div class="form-group"><br>
                                                            <input type="text" class="form-control form-control-lg bg-primary text-right"  placeholder="0" value="@rupiah($saldoterakhir)" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">Pembayaran / Penarikan</div>
                                                <div class="row border">
                                                    <div class="col">
                                                        <div class="form-group"><br>
                                                            <input type="text" id="nominal" name="nominal" class="form-control bg-success form-control-lg text-right" placeholder="0" value="@rupiah($lihatdetail->masuk + $lihatdetail->keluar)" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">
                                <button type="reset" onclick="window.location.href='{{url('Data_Deposit')}}'"
                                    class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal</button>
                            </div>  
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
function pasien($norm, $namapasien) {
    document.getElementById("norm").value = $norm;
    document.getElementById("namapasien").value = $namapasien;
    $(".close").click();
    window.location.href = "/Deposit/selecttambah"+ $norm;
}

function karyawan($idkaryawan, $nama) {
    document.getElementById('karyawan').value = $idkaryawan;
    $(".close").click();
}

function sembunyikanbank() {
    document.getElementById('sembunyikanbank').style.display = "none";
}
function tampilkanbank() {
    $("#sembunyikanbank").show();
}

</script>
<!-- /.Script Modal -->

@endsection