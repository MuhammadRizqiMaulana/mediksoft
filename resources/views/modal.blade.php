<!-- Modal -->

<!-- Modal Surat keterangan Sakit -->
@isset($suratketerangansakit)
<div class="modal fade" id="modal-suratketerangansakit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">SURAT KETERANGAN SAKIT</h4>
        <h4 class="modal-title text-center">NOMOR : 0112/VIII</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Yang bertanda tangan dibawah ini dokter</h6>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Surat keterangan Sakit -->


<!-- Modal Tabel Kelas -->
@isset($kelas)
<div class="modal fade" id="modal-kelas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_kelas" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($kelas as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kodekelas}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="kelas('{{$item->kodekelas}}', '{{$item->nama}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Kelas -->

<!-- Modal Tabel Ruang -->
@isset($ruang)
<div class="modal fade" id="modal-ruang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Ruang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_ruang" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Ruang</th>
                            <th>Nama Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($ruang as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->koderuang}}</td>
                            <td>{{$item->namaruang}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="ruang('{{$item->koderuang}}', '{{$item->namaruang}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Ruang -->

<!-- Modal Tabel E-KLAIM BPJS -->
@isset($eklaimbpjs)
<div class="modal fade" id="modal-eklaimbpjs">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">E-KLAIM BPJS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_eklaimbpjs" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id E-KLAIM</th>
                            <th>nama E-KALIM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $noeklaim = 1;
                        @endphp
                        @foreach ($eklaimbpjs as $index => $item)
                        <tr>
                            <td>{{$noeklaim++}}</td>
                            <td>{{$item->idklaim}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="eklaimbpjs('{{$item->idklaim}}');"><i class="fa fa-check"></i>
                                    Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel E-KLAIM BPJS -->

<!-- Modal Tabel Poliklinik -->
@isset($poliklinik)
<div class="modal fade" id="modal-poliklinik">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Poliklinik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_poliklinik" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Poliklinik</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($poliklinik as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenispoli}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="poliklinik('{{$item->kode}}', '{{$item->nama}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Poliklinik -->

<!-- Modal Tabel Dokter -->
@isset($dokter)
<div class="modal fade" id="modal-dokter">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Dokter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_dokter" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>NIK</th>
                            <th>Nama Dokter</th>
                            <th>Jenis Dokter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($dokter as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->iddokter}}</td>
                            <td>{{$item->nikd}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenisdokter}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="dokter('{{$item->iddokter}}', '{{$item->nama}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Dokter -->

<!-- Modal Tabel Perusahaan -->
@isset($perusahaan)
<div class="modal fade" id="modal-perusahaan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Perusahaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_perusahaan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Perusahaan / Jaminan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($perusahaan as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->idprsh}}</td>
                            <td>{{$item->namaprsh}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="perusahaan('{{$item->idprsh}}', '{{$item->namaprsh}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Perusahaan -->

<!-- Modal Tabel Pasien -->
@isset($pasien)
<div class="modal fade" id="modal-pasien">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_pasien" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NO RM</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($pasien as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->norm}}</td>
                            <td>{{$item->namapasien}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="pasien('{{$item->norm}}', '{{$item->namapasien}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Pasien -->

<!-- Modal Tabel Faskes -->
@isset($faskes)
<div class="modal fade" id="modal-faskes">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pengirim / Faskes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_faskes" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Faskes</th>
                            <th>Nama Faskes</th>
                            <th>Fee</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($faskes as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kodefaskes}}</td>
                            <td>{{$item->namafaskes}}</td>
                            <td>{{$item->fee}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="faskes('{{$item->kodefaskes}}', '{{$item->namafaskes}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Faskes -->

<!-- Modal Tabel Fasilitaskesehatan -->
@isset($fasilitaskesehatan)
<div class="modal fade" id="modal-fasilitaskesehatan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fasilitas Kesehatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_fasilitaskesehatan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Fasilitas</th>
                            <th>Nama Fasilitas</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($fasilitaskesehatan as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kodefaskes}}</td>
                            <td>{{$item->namafaskes}}</td>
                            <td>{{$item->alamatfaskes}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="fasilitaskesehatan('{{$item->idfaskes}}', '{{$item->namafaskes}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Faskes -->

<!-- Modal Tabel ICD 10 Mordabitas -->
@isset($Icd10_mordabitas)
<div class="modal fade" id="modal-Icd10_mordabitas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ICD 10 Mordabitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_Icd10_mordabitas" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No DTD</th>
                            <th>No Terinci</th>
                            <th>Gol Sebab Sakit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($Icd10_mordabitas as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$nodtd}}</td>
                            <td>{{$item->noterinci}}</td>
                            <td>{{$item->golsebabsakit}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="Icd10_mordabitas('{{$item->nodtd}}', '{{$item->golsebabsakit}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel ICD 10 Mordabitas -->

<!-- Modal Tabel ICD 10 Mordabitas -->
@isset($Icd10_stp)
<div class="modal fade" id="modal-Icd10_stp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ICD 10 STP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_Icd10_stp" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode STP</th>
                            <th>Nama STP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($Icd10_stp as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$kodestp}}</td>
                            <td>{{$item->namastp}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="Icd10_stp('{{$item->kodestp}}', '{{$item->namastp}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel ICD 10 STP -->


<!-- Modal Detail Alergi Pasien -->
<div class="modal fade" id="modal-detailalergipasien">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Alergi Pasien</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Jenis</th>
            <th>Keterangan</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select id="tempjenisalergi" name="tempjenisalergi" class="form-control">
                  <option value="Makanan">Makanan</option>
                  <option value="Obat-obatan">Obat-obatan</option>
                  <option value="Lingkungan">Lingkungan</option>
                  <option value="Lain-Lain">Lain-Lain</option>
                </select>
              </td>
              <td><input type="text" class="form-control" id="tempketeranganalergi" name="tempketeranganalergi" placeholder="Keterangan"></td>
            </tr> 
          </tbody>                         
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-info" onclick="detailalergipasien();"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-outline-danger" type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-check"></i> Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Modal Modal Detail Alergi Pasien -->



<!-- /.modal -->