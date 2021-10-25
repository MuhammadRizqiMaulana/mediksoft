@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RekamMedis.Layout.menu')
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h4>Kamar Kosong</h4>
                  </div>
                  
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <th>Nama Ruang</th>
                    <th>Nama Kelas</th>
                    <th>Tempat Tidur Kosong</th>
                  </thead>
                  <tbody>
                    @foreach ($datas as $item)
                  <tr>
                    <td class="col-2">{{$item->namaruang}}</td>
                    <td class="col-2">{{$item->namakelas}}</td>
                    <td class="col-8">{{$item->sisakamar}}</td>
                  </tr>
              
          
                   
                  
                  @endforeach
                  </tbody>
                  <tbody>
                                   
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection