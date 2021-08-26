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

<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}<li>
  @endforeach
</ul>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h4>Data BANK</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{url('Poli/#TambahBank')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama bank</th>
                    <th>Telp</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->namabank}}</td>
                      <td>{{$item->telp}}</td>
                      <td>
                        <a href="/Bank/ubah{{$item->idbank}}#UbahBank" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/Bank/hapus{{$item->idbank}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus bank ini ?')">
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
                <div class="card card-success card-outline" id="TambahBank">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Bank/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="namabank">Nama bank</label>
                        <textarea class="form-control" id="namabank"  name="namabank" placeholder="namabank"></textarea>
                          @if ($errors->has('namabank'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('namabank') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                          
                    
                          @if ($errors->has('alamat'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="telp">
                          
                    
                          @if ($errors->has('telp'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('telp') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
                          
                    
                          @if ($errors->has('keterangan'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('keterangan') }}</p></span>
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
                <div class="card card-primary card-outline" id="UbahBank">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Bank/update'.$ubah->idbank)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="namabank">Nama bank</label>
                        <textarea class="form-control" id="namabank"  name="namabank" placeholder="namabank">{{$ubah->namabank}}</textarea>
                        @if ($errors->has('namabank'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namabank') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat" placeholder="alamat">{{$ubah->alamat}}</textarea>
                        @if ($errors->has('alamat'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="telp">Telp</label>
                        <textarea class="form-control" id="telp"  name="telp" placeholder="telp">{{$ubah->telp}}</textarea>
                        @if ($errors->has('telp'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('telp') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan"  name="keterangan" placeholder="keterangan">{{$ubah->keterangan}}</textarea>
                        @if ($errors->has('keterangan'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('keterangan') }}</p></span>
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