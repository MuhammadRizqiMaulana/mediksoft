@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Data Deposit</h4>
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

                <div class="form-group">
                  <div class="row">
                    <div class="col"><a class="btn btn-block btn-outline-success btn-sm" href="{{url('/Data_Deposit/tambah/#TambahDeposit')}}"><i class="fa fa-plus-circle"></i> Tambah</a></div>
                    <div class="col">
                      <a href="javascript:alert('Silahkan pilih baris terlebih dahulu!');" id="tombollihatdetail" class="btn btn-block btn-outline-info btn-sm">
                        <i class="fas fa-clipboard-list"></i> Lihat Detail
                      </a> 
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <button type="button" class="btn btn-outline-info btn-block btn-sm" data-toggle="modal" data-target="#modal-datasaldodepositpasien">
                        <i class="fas fa-clipboard-list"></i> Lihat Saldo pasien
                      </button>
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
                    <th style="text-align:center">No Trans</th>
                    <th style="text-align:center">No RM</th>
                    <th style="text-align:center">Tanggal</th>
                    <th style="text-align:center">Kas Masuk</th>
                    <th style="text-align:center">Kas Keluar</th>
                    <th style="text-align:center">No Ref</th>
                    <th style="text-align:center">Keterangan</th>
                    <th style="text-align:center">Metode Bayar</th>
                    <th style="text-align:center">Pasien</th>
                    <th style="text-align:center">Transaksi</th>
                    <th style="text-align:center">Bank</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr onclick="tombol('{{$item->notrans}}')">
                      <td>{{$item->notrans}}</td>
                      <td>{{$item->norm}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td style="text-align:right">@rupiah($item->masuk)</td>
                      <td style="text-align:right">@rupiah($item->keluar)</td>
                      <td>{{$item->noref}}</td>
                      <td>{{$item->keterangan}}</td>
                      <td>{{$item->metodebayar}}</td>
                      <td>{{$item->Pasien->namapasien}}</td>
                      <td>{{$item->Transdeposit_jenis->namatransaksi}}</td>
                      <td>@isset($item->Bank){{$item->Bank->namabank}}@endisset</td>
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

  <div class="modal fade" id="modal-datasaldodepositpasien">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Saldo Deposit pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_datasaldodepositpasien" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Deposit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($datasaldodepositpasien as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->norm}}</td>
                            <td>{{$item->Pasien->namapasien}}</td>
                            <td style="text-align:center">@rupiah($item->masuk - $item->keluar)</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<script>
  function tombol($notrans){
    $("a#tombollihatdetail").attr("href", "/Data_Deposit/lihatdetail"+ $notrans);
  }
</script>
@endsection