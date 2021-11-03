@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatJalan.Layout.menu')
    <!-- /.menu -->
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800"><img src="{{asset('images/application.ico')}}" width="30px"> Rekam Medis Rawat Jalan</h4>
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
            <div class="row">
              <div class="col-3">
                <div class="form-group row">
                  <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="datetime" class="form-control" id="Tanggal" placeholder="Tanggal" value="{{$rawatjalan->tglmasuk}}">
                  </div>
                </div>
              </div>
              <div class="col-3"><button class="btn btn-outline-primary">Riwayat Medis Pasien</button></div>
              <div class="col-3"><label class="col-form-label">NO RM : <span class="text-info">{{$rawatjalan->norm}} </span></label></div>
              <div class="col-3"><label class="col-form-label">NAMA : <span class="text-info">{{$rawatjalan->Pasien->namapasien}} [ {{$rawatjalan->Perusahaan->namaprsh}} ] </span></label></div>
            </div>
          </div>          
        </div>

        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
              <li class="pt-2 px-3"></li>
              <li class="nav-item">
                <a class="nav-link active" id="rujukan-unit-tab" data-toggle="pill" href="#rujukan-unit" role="tab" aria-controls="rujukan-unit" aria-selected="true">RUJUKAN & UNIT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="anamnesa-tab" data-toggle="pill" href="#anamnesa" role="tab" aria-controls="anamnesa" aria-selected="false">ANAMNESA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pemeriksaan-gt-fisik-tab" data-toggle="pill" href="#pemeriksaan-gt-fisik" role="tab" aria-controls="pemeriksaan-gt-fisik" aria-selected="false">PEMERIKSAAN GT / FISIK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pemeriksaan-penunjang-diagnostik-tab" data-toggle="pill" href="#pemeriksaan-penunjang-diagnostik" role="tab" aria-controls="pemeriksaan-penunjang-diagnostik" aria-selected="false">PEMERIKSAAN PENUNJANG / DIAGNOSTIK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tindakan-prosedur-diagnosa-tab" data-toggle="pill" href="#tindakan-prosedur-diagnosa" role="tab" aria-controls="tindakan-prosedur-diagnosa" aria-selected="false">TINDAKAN (PROSEDUR / DIAGNOSA)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="terapi-tab" data-toggle="pill" href="#terapi" role="tab" aria-controls="terapi" aria-selected="false">TERAPI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="edukasi-tab" data-toggle="pill" href="#edukasi" role="tab" aria-controls="edukasi" aria-selected="false">EDUKASI</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
              <div class="tab-pane fade show active" id="rujukan-unit" role="tabpanel" aria-labelledby="rujukan-unit-tab">
                RUJUKAN & UNIT.
              </div>
              <div class="tab-pane fade" id="anamnesa" role="tabpanel" aria-labelledby="anamnesa-tab">
                <!---ANAMNESA--->
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="keluhanutama">Keluhan Utama</label>
                      <textarea  class="form-control" id="keluhanutama" placeholder="Keluhan Utama"></textarea>
                      <label for="lokasi">Lokasi</label>
                      <textarea  class="form-control" id="lokasi" placeholder="Lokasi"></textarea>
                      <label for="kualitas">Kualitas/Keparahan</label>
                      <div class="card">
                    </div> 
                        <div class=" form-check">
                            <input class="form-check-input" type="checkbox" name="Tekanan" value=" " />
                            <label class="form-check-label">Tekanan</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Terbakar" value=" " />
                            <label class="form-check-label">Terbakar</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Tajam Tusukan" value=" " />
                            <label class="form-check-label">Tajam Tusukan</label>
                            </div>
                            <div class="form-check  ">
                            <input class="form-check-input" type="checkbox" name="Tajam Diiris" value=" " />
                            <label class="form-check-label">Tajam Diiris</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Mencengkram" value=" " />
                            <label class="form-check-label">Mencengkram</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Melilit" value=" " />
                            <label class="form-check-label">Melilit</label>
                            </div>
                 </div>
                      
                    <label for="onset">Onset</label>
                    <textarea  class="form-control" id="onset" placeholder="Onset"></textarea>
                    <label for="waktu">Waktu</label>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Intermiten" value=" " />
                            <label class="form-check-label">Intermiten</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Terus menerus" value=" " />
                            <label class="form-check-label">Terus Menerus</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="saat tertentu" value=" " />
                            <label class="form-check-label">Saat Tertentu</label>
                            </div>
                    <label for="faktor">Faktor Memperinggan</label>
                    <textarea  class="form-control" id="faktor" placeholder="Faktor Memperinggan"></textarea>
                    <label for="faktormemperberat">Faktor Memperberat</label>
                    <textarea  class="form-control" id="faktormemperberat" placeholder="Faktor Memperberat"></textarea>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="gejalayangmeyertai">A. Gejala yang meyertai</label>
                      <textarea  class="form-control" id="gejalayangmeyertai" placeholder="Gejala yang meyertai"></textarea>
                      <label for="riwayatpenyakit">B. Riwayat penyakit dahulu</label>
                      <textarea  class="form-control" id="riwayatpenyakit" placeholder="Riwayat penyakit dahulu"></textarea>
                      <label for="riwayatpenyakitkeluarga">C. Riwayat penyakit keluarga</label>
                      <textarea  class="form-control" id="riwayatpenyakitkeluarga" placeholder="Riwayat penyakit Keluarga"></textarea>
                      <label for="riwayatalergri">D. Riwayat Alergri</label>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Makanan" value=" " />
                            <label class="form-check-label">Makanan</label>
                      </div>
                      <textarea  class="form-control" id="riwayatalergi" placeholder=""></textarea>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Obat" value=" " />
                            <label class="form-check-label">Obat-obatan</label>
                      </div>
                      <textarea  class="form-control" id="riwayatalergi" placeholder=""></textarea>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Lingkungan" value=" " />
                            <label class="form-check-label">Lingkungan</label>
                      </div>
                      <textarea  class="form-control" id="riwayatalergi" placeholder=""></textarea>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Lain" value=" " />
                            <label class="form-check-label">Lain-lain</label>
                      </div>
                      <textarea  class="form-control" id="riwayatalergi" placeholder=""></textarea>
                      <label for="riwayatpengobatan">E. Riwayat Pengobatan Penyakit</label>
                      <textarea  class="form-control" id="riwayatpengobatan" placeholder="Riwayat Pengobatan"></textarea>
                      <label for="status">F. Status Merokok</label>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Akif" value=" " />
                            <label class="form-check-label">Aktif</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Pasif" value=" " />
                            <label class="form-check-label">Pasif</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Tidak Merokok" value=" " />
                            <label class="form-check-label">Tidak Merokok</label>
                            </div>
                            <label for="riwayatobat">G. Riwayat Penggunaan Obat Psikotropik</label>
                      <textarea  class="form-control" id="riwayatobat" placeholder="Riwayat Penggunaan Obat Psikotropik"></textarea>
                    </div>
                  </div>
                </div>
                
                <!---ANAMNESA--->
              </div>
              <div class="tab-pane fade" id="pemeriksaan-gt-fisik" role="tabpanel" aria-labelledby="pemeriksaan-gt-fisik-tab">
                PEMERIKSAAN GT / FISIK.
              </div>
              <div class="tab-pane fade" id="pemeriksaan-penunjang-diagnostik" role="tabpanel" aria-labelledby="pemeriksaan-penunjang-diagnostik">
                PEMERIKSAAN PENUNJANG / DIAGNOSTIK.
              </div>
              <div class="tab-pane fade" id="tindakan-prosedur-diagnosa" role="tabpanel" aria-labelledby="tindakan-prosedur-diagnosa-tab">
                <label >Diagnosa</label>

                <div class="row">
                  <div class="col">
                  <label >Diagnosa</label>
                    <table  class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Kode </th>
                      <th>Diagnosa</th>
                    </tr>
                    </thead>
                    </table>
                  </div>
                  
                  <div class="col">
                  <label>Tindakan</label>
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th rowspan="2">Tindakan Lokal </th>
                      <th colspan="2">ICD IX</th>
                    </tr>
                    <tr>
                      <th align=center>Kode</th>
                      <th>Tindakan</th>
                    </tr>
                    </thead>
                    </table>
                  </div>
                </div> 
              </div>
              
              <div class="tab-pane fade" id="terapi" role="tabpanel" aria-labelledby="terapi-tab">
                TERAPI.
              </div>
              <div class="tab-pane fade" id="edukasi" role="tabpanel" aria-labelledby="edukasi-tab">
                EDUKASI.
              </div>
              
            </div>
          </div>
          <!-- /.card -->
        </div>        
        <!-- /.row -->
        <div class="row">
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection