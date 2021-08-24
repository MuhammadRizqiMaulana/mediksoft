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
            <li>{{$error}}</li>
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
                    <h4>Data DOKTER POLI</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-success btn-sm" href="{{url('DokterPoli/#TambahDokterPoli')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama Poli</th>
                    <th>Nama Dokter</th>
                    <th>Tarif</th>
                    <th>E klaim BPJS</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $item)
                    <tr>
                      <td>{{$item->Poliklinik->nama}}</td>
                      <td>{{$item->Dokter->nama}}</td>
                      <td>{{$item->tarif}}</td>
                      <td>{{$item->Eklaimbpjs->nama}}</td>
                      <td>
                        <a href="/DokterPoli/ubah{{$item->kodepoli}}#UbahDokterPoli" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="/DokterPoli/hapus{{$item->kodepoli}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
                <div class="card card-success card-outline" id="TambahDokterPoli">
                  <div class="card-header">
                    <h4 class="text-success"><i class="fa fa-plus-circle"></i> Tambah</h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/DokterPoli/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kodepoli">kode Poli</label>
                        <input type="text" class="form-control" id="kodepoli" name="kodepoli" placeholder="kode poli">
                        <button type="button" class="btn btn-link" ><i class="fa fa-plus-circle"></i></button>
                          @if ($errors->has('kodepoli'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kodepoli') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="iddokter">nama dokter</label>
                         <input type="text" class="form-control" id="iddokter
                         " name="iddokter" placeholder="nama dokter">
                         <button type="button" class="btn btn-link" ><i class="fa fa-plus-circle"></i></button>
                          @if ($errors->has('iddokter'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('iddokter') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="tarif">tarif</label>
                        <input type="number" class="form-control" id="tarif"  name="tarif" placeholder="tarif" min="0">
                          @if ($errors->has('tarif'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('tarif') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="untukrs">untuk rumah sakit</label>
                        <input type="number" class="form-control" id="untukrs"  name="untukrs" placeholder="untukrs" min="0">
                          @if ($errors->has('untukrs'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('untukrs') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="untukdokter">untuk Dokter</label>
                        <input type="number" class="form-control" id="untukdokter"  name="untukdokter" placeholder="untukdokter" min="0">
                          @if ($errors->has('untukdokter'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('untukdokter') }}</p></span>
                          @endif
                      </div>
                      <div class="form-group">
                      <label for="idklaim">EklaimBPJS</label>
                      <select class="form-control" name="idklaim">
                          <option value="">klaim bpjs</option>
                          @foreach ($idklaim as $item)
                            <option value="{{$item->idklaim}}">{{$item->nama}}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="pemakaitarif">Pemakai Tarif</label>
                        <input type="text" class="form-control" id="pemakaitarif"  name="pemakaitarif" placeholder=>
                          @if ($errors->has('pemakaitarif'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('pemakaitarif') }}</p></span>
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
                <div class="card card-primary card-outline" id="UbahDokterPoli>
                  <div class="card-header">
                    <h5 class="text-primary"><i class="fa fa-edit"></i> UBAH</h5>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('/DokterPoli/update'.$ubah->kodepoli)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="kodepoli">Nama poli</label>
                        <input type="text" class="form-control" id="kodepoli" name="kodepoli" placeholder="kodepoli" value="{{$ubah->kodepoli}}" disabled>
                        @if ($errors->has('kodepoli'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('kodepoli') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="iddokter">Nama Dokter</label>
                        <input type="text" class="form-control" id="iddokter" name="iddokter" placeholder="iddokter" value="{{$ubah->iddokter}}">
                        @if ($errors->has('iddokter'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('iddokter') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tarif">tarif</label>
                        <input type="number" class="form-control" id="tarif" name="tarif" placeholder="tarif" value="{{$ubah->tarif}}" min="0">
                        @if ($errors->has('tarif'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('tarif') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="untukrs">untuk rs</label>
                        <input type="number" class="form-control" id="untukrs" name="untukrs" placeholder="untukrs" value="{{$ubah->untukrs}}" min="0">
                        @if ($errors->has('untukrs'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('untukrs') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="untukdokter">untuk dokter</label>
                        <input type="number" class="form-control" id="untukdokter" name="untukdokter" placeholder="untukdokter" value="{{$ubah->untukdokter}}" min="0">
                        @if ($errors->has('untukdokter'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('untukdokter') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="idklaim">Eklaim BPJS</label>
                        <input type="text" class="form-control" id="idklaim" name="idklaim" placeholder="idklaim" value="{{$ubah->idklaim}}">
                        @if ($errors->has('idklaim'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('idklaim') }}</p></span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="pemakaitarid">Pemakai Tarif</label>
                        <input type="text" class="form-control" id="pemakaitarid" name="pemakaitarid" placeholder="pemakaitarid" value="{{$ubah->pemakaitarid}}">
                        @if ($errors->has('pemakaitarid'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('pemakaitarid') }}</p></span>
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