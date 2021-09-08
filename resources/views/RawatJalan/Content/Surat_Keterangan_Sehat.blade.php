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
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-7">
            <div class="card ">
              <div class="card-header text-center">
                <h6><strong>SURAT KETERANGAN SEHAT</strong></h6>
                <h6><strong>Nomor : 003/0112/VIII</strong></h6>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6"><p>Tanggal Surat :</p></div>
                  <div class="col-6"><input type="date" class="form-control" value=""></div>
                </div>
                <div class="row">
                  <div class="col-6"><p>Yang bertanda tangan dibawah ini dokter : </p> </div>
                  <div class="col-5">
                    <input type="text" id="dokter" name="kodedokter" class="form-control" placeholder="Dokter" hidden>
                    <input type="text" id="namadokter" name="namadokter" class="form-control" placeholder="Dokter">
                  </div>
                  <div class="col-1">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-dokter">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
                <p>Dokter yang bertugas di Klinik Pratama Rawat Inap Griya Saras Menerangkan bahwa :</p>
                <div class="row">
                  <div class="col-2">Nama </div>
                  <div class="col-1">:</div>
                  <div class="col-9"><p>qwertyuiop</p></div>
                </div>
                <div class="row">
                  <div class="col-2">Umur </div>
                  <div class="col-1">:</div>
                  <div class="col-9"><p>qwertyuiop <span> thn</span></p></div>
                </div>
                <div class="row">
                  <div class="col-2">Pekerjaan </div>
                  <div class="col-1">:</div>
                  <div class="col-9"><p>qwertyuiop</p></div>
                </div>
                <div class="row">
                  <div class="col-2">Alamat </div>
                  <div class="col-1">:</div>
                  <div class="col-9"><p>qwertyuiop </p></div>
                </div>
                
                <div class="row">
                  <div class="col-8"><p>Berdasarkan pemeriksaan pada tanggal : </p></div>
                  <div class="col-4"><input type="date" class="form-control" value=""></div>
                </div>
                <div class="row">
                  <div class="col ml-2">
                    <div class="row ">
                      <p>Dinyatakan &nbsp;&nbsp;<p>
                      <div class="form-group border">
                        <div class="form-check form-check-inline ml-2">
                          <input class="form-check-input" type="radio" name="suratketerangansehat" id="suratketerangansehat_sehat" value="1">
                          <label class="form-check-label" for="suratketerangansehat_sehat">Sehat</label>
                        </div>
                        <div class="form-check form-check-inline ml-2">
                          <input class="form-check-input" type="radio" name="suratketerangansehat" id="suratketerangansehat_tidaksehat" value="0">
                        <label class="form-check-label" for="suratketerangansehat_tidaksehat">Tidak Sehat</label>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col">
                    <div class="row">
                      <div class="col-sm-3"><p>Untuk :</p></div>
                      <div class="col-sm-9"><input type="text" class="form-control"></div>
                      
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-3"><p>- &nbsp;&nbsp; Berat Badan</p></div>
                  <div class="col-1">: &nbsp;&nbsp;</div>
                  <div class="col-7"><input type="number" min="0" class="form-control"></div>
                  <div class="col-1">Kg</div>
                </div>
                <div class="row">
                  <div class="col-3"><p>- &nbsp;&nbsp; Tinggi Badan</p></div>
                  <div class="col-1">: &nbsp;&nbsp;</div>
                  <div class="col-7"><input type="number" min="0" class="form-control"></div>
                  <div class="col-1">cm</div>
                </div>
                <div class="row">
                  <div class="col-3"><p>- &nbsp;&nbsp; Tekanan Darah</p></div>
                  <div class="col-1">:</div>
                  <div class="col-3"><input type="number" min="0" class="form-control"></div>
                  <div class="col-1">mmHg</div>
                  <div class="col-3"><input type="number" min="0" class="form-control"></div>
                  <div class="col-1">mmHg</div>
                </div>
                <div class="row">
                  <div class="col-3"><p>- &nbsp;&nbsp; Gol. Darah</p></div>
                  <div class="col-1">: &nbsp;&nbsp;</div>
                  <div class="col-7"><input type="text" class="form-control"></div>
                </div>
                <div class="row">
                  <div class="col-3"><p>- &nbsp;&nbsp; Buta Warna</p></div>
                  <div class="col-1"> :</div>
                  <div class="col-8">
                    <div class="form-group">
                      <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input" type="radio" name="suratketerangansehat_butawarna" id="suratketerangansehat_butawarna_ya" value="1">
                        <label class="form-check-label" for="suratketerangansehat_butawarna_ya">Ya</label>
                      </div>
                      <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input" type="radio" name="suratketerangansehat_butawarna" id="suratketerangansehat_butawarna_tidak" value="0">
                        <label class="form-check-label" for="suratketerangansehat_butawarna_tidak">Tidak</label>
                      </div>
                    </div>
                  </div> 
                </div>               
              </div> 

              <div class="card-footer">
                <button class="btn btn-outline-primary">Simpan & Cetak</button>
                <button class="btn btn-outline-success">Simpan</button>
                <button class="btn btn-outline-danger">Batal</button>
              </div>          
            </div>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

@endsection