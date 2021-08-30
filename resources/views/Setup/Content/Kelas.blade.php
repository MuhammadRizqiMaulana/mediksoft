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
                    <h4>Data KELAS</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{url('Poli/#TambahPoli')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->kodekelas}}</td>
                      <td>{{$item->nama}}</td>
                      <td>
                        <a href="/Kelas/ubah{{$item->kodekelas}}#UbahFaskes" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/Kelas/hapus{{$item->kodekelas}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
                <div class="card card-success card-outline" id="TambahKelas">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Kelas/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kode">Kode kelas</label>
                        <input type="text" class="form-control" id="kodekelas" name="kodekelas" placeholder="kode kelas">
                          @if ($errors->has('kodekelas'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekelas') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Kelas</label>
                        <textarea class="form-control" id="nama"  name="nama" placeholder="nama kelas"></textarea>
                          @if ($errors->has('nama kelas'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama kelas') }}</p></span>
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
                <div class="card card-primary card-outline" id="UbahKelas">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Kelas/update'.$ubah->kodekelas)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kodekelas">Kode Kelas</label>
                        <input type="text" class="form-control" id="kodekelas" name="kodekelas" placeholder="kode kelas" value="{{$ubah->kodekelas}}" disabled>
                        @if ($errors->has('kodekelas'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('kodekelas') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Kelas</label>
                        <textarea class="form-control" id="nama"  name="nama" placeholder="nama kelas">{{$ubah->nama}}</textarea>
                        @if ($errors->has('nama kelas'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('namakelas') }}</p></span>
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