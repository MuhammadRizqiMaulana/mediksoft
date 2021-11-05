@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
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
                <div class="row">
                  <div class="col-1">
                    <label>NO RM</label>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-1">
                    <button class="btn btn-default"> Cari </button>
                  </div>
                  
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Tanggal Nasuk</th>
                    <th>Nama</th>
                    <th>No RM</th>
                    <th>No Faktur</th>
                    <th>Jenis Kelamin</th>
                    <th>Rujukan</th>
                    <th>Rujukan Lain</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Perawat</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->tanggalmasuk}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->norm}}</td>
                      <td>{{$item->nofaktur}}</td>
                      <td>{{$item->jeniskelamin}}</td>
                      <td>{{$item->rujukan}}</td>
                      <td>{{$item->Rujukanlain}}</td>
                      <td>{{$item->poli}}</td>
                      <td>{{$item->dokter}}</td>
                      <td>{{$item->perawat}}</td>
                      
                    </tr>
                  @endforeach
                                   
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
                  <center>
                  <button class="btn btn-default">Tutup</button>
                  </center>
                
                  
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