@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('Setup.Layout.menu')
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
                    <h4>Data Ruang</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{url('Ruang/#TambahRuang')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>kode ruang</th>
                    <th>Nama Ruang</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->koderuang}}</td>
                      <td>{{$item->namaruang}}</td>
                      
                      <td>
                        <a href="/Ruang/ubah{{$item->koderuang}}#UbahRuang" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/Ruang/hapus{{$item->koderuang}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                          <i class="fa fa-minus-circle"></i> Hapus
                        </a>

                      </td>
                    </tr>
                  @endforeach
                                   
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-4">
                @if(isset($ubah) == NULL)
                <!-- general form elements -->
                <div class="card card-success card-outline" id="TambahRuang">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Ruang/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">kode ruang</label>
                        <input type="text" class="form-control" id="koderuang" name="koderuang" placeholder="koderuang">
                          @if ($errors->has('koderuang'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('koderuang') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="namaruang">Nama Ruang</label>
                        <input type="text" class="form-control" id="namaruang" name="namaruang" placeholder="namaruang">
                          @if ($errors->has('namaruang'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('namaruang') }}</p></span>
                          @endif
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i></button>
                      <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
                  
              @else
                <!-- general form elements -->
                <div class="card card-primary card-outline" id="UbahRuang">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Ruang/update'.$ubah->koderuang)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="koderuang">kode ruang</label>
                        <input type="text" class="form-control" id="koderuang" name="koderuang" placeholder="koderuang" value="{{$ubah->koderuang}}" disabled>
                        @if ($errors->has('koderuang'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('koderuang') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="namaruang">nama ruang</label>
                        <textarea class="form-control" id="namaruang"  name="namaruang" placeholder="namaruang">{{$ubah->namaruang}}</textarea>
                        @if ($errors->has('namaruang'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namaruang') }}</p></span>
                        @endif
                      </div>
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check"></i></button>
                      <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </form>
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

@endsection