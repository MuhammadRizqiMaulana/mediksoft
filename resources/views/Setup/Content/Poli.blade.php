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
                    <h4>Data POLI</h4>
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
                    <th>kode</th>
                    <th>Nama</th>
                    <th>jenispoli</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->kode}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->jenispoli}}</td>
                      <td>
                        <a href="/Poli/ubah{{$item->kode}}#UbahFaskes" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/Poli/hapus{{$item->kode}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
                <div class="card card-success card-outline" id="TambahPoli">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Poli/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="kode">
                          @if ($errors->has('kode'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kode') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama</label>
                         <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                          @if ($errors->has('nama'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="jenispoli">jenis poli</label>
                        <select class="form-control" name="jenispoli">
                          <option value="umum">umum</option>
                          <option value="spesialis">spesialis</option>
                        </select>
                          @if ($errors->has('jenispoli'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('jenispoli') }}</p></span>
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
                <div class="card card-primary card-outline" id="UbahFaskes">
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> Ubah</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/Poli/update'.$ubah->kode)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kode">kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="kode" value="{{$ubah->kode}}" disabled>
                        @if ($errors->has('kode'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('kode') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nama">nama</label>
                        <textarea class="form-control" id="nama"  name="nama" placeholder="nama">{{$ubah->nama}}</textarea>
                        @if ($errors->has('nama'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="jenispoli">jenis poli</label>
                        <select class="form-control" name="jenispoli">
                          <option value="umum">umum</option>
                          <option value="spesialis">spesialis</option>
                        </select>
                          @if ($errors->has('jenispoli'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('jenispoli') }}</p></span>
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