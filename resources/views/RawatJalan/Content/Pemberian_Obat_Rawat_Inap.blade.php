@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
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

<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}<li>
  @endforeach
</ul>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No Resep</th>
                    <th>Kode Barang</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Perawat</th>
                    <th>Rute</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->noresep}}</td>
                      <td>{{$item->kodebarang}}</td>
                      <td>{{$item->kode}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>{{$item->perawat}}</td>
                      <td>{{$item->rute}}</td>
                      <td>{{$item->keterangan}}</td>
                      
                    </tr>
                  @endforeach
                                   
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
                  
                
                  
              </div>
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