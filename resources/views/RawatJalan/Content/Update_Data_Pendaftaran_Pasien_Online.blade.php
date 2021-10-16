@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Update Data Pendaftaran Pasien Online</h4>
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
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>No.RM</th>
                <th>Nama Pasien</th>
                <th>Nama Ibu</th>
                <th>Alamat</th>
              </tr>
              </thead>
              <tbody>
              @php
                $no=1;   
              @endphp
              @foreach ($datas as $item)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$item->norm}}</td>
                  <td>{{$item->Pasien->namapasien}}</td>
                  <td>{{$item->Pasien->namaibu}}</td>
                  <td>{{$item->Pasien->alamat}}</td>
                </tr>
              @endforeach
                               
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <center><button class="btn btn-outline-primary">Update Pendaftaran ONLINE</button></center>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection