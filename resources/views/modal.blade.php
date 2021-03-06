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

<!-- Modal Tabel Kamar -->
@isset($kamar)
<div class="modal fade" id="modal-kamar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_kamar" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Kelas</th>
                            <th>Ruang</th>
                            <th>Tarif</th>
                            <th>E-Klaim BPJS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($kamar as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kodekamar}}</td>
                            <td>
                                @if(isset($item->keterangan)){{$item->keterangan}}@endif
                            </td>
                            <td>
                                @if(isset($item->Kelas)){{$item->Kelas->nama}}@endif
                            </td>
                            <td>
                                @if(isset($item->Ruang)){{$item->Ruang->namaruang}}@endif
                            </td>
                            <td>@rupiah($item->tarif)</td>
                            <td>
                                @if(isset($item->Eklaimbpjs)){{$item->Eklaimbpjs->nama}}@endif
                            </td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="kamar('{{$item->kodekamar}}', '{{$item->keterangan}}', '{{$item->Kelas->nama}}', '{{$item->Ruang->namaruang}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Kamar -->

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
                    </tbody>
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
                    </tbody>
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
                    </tbody>
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
                    </tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Dokter -->

<!-- Modal Tabel Karyawan -->
@isset($karyawan)
<div class="modal fade" id="modal-karyawan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_karyawan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($karyawan as $item)
                        <tr onclick="karyawan('{{$item->idkaryawan}}', '{{$item->nama}}');">
                            <td>{{$no++}}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="karyawan('{{$item->idkaryawan}}', '{{$item->nama}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Karyawan -->


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
                    </tbody>
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
                    </tbody>
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
                            <td>@rupiah($item->fee)</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="faskes('{{$item->kodefaskes}}', '{{$item->namafaskes}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Faskes -->
<!-- Modal Tabel ICD 9 -->
@isset($Icd9)
<div class="modal fade" id="modal-Icd9">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ICD 9</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_Icd9" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($Icd9 as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="Icd9('{{$item->kode}}', '{{$item->nama}}');"><i class="fa fa-check"></i>
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
<!-- Modal Tabel ICD 9 -->

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
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Faskes -->

<!-- Modal Tabel ICD 10 -->
@isset($icd10)
<div class="modal fade" id="modal-icd10">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data ICD 10</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_icd10" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode ICD</th>
                            <th>Nama Diagnosa</th>
                            <th>Gol Sebab Sakit</th>
                            <th>Nama STP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($icd10 as $item)
                        <tr>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{isset($item->Icd10_mordibitas) ? $item->Icd10_mordibitas->golsebabsakit : '' }}</td>
                            <td>{{isset($item->Icd10_stp) ? $item->Icd10_stp->namastp : '' }}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="icd10('{{$item->kode}}', '{{$item->nama}}');"><i class="fa fa-check"></i>
                                    Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset

<!-- Modal Tabel ICD 10 -->
@isset($icd10)
<div class="modal fade" id="modal-icd10">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data ICD 10</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_icd10" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode ICD</th>
                            <th>Nama Diagnosa</th>
                            <th>Gol Sebab Sakit</th>
                            <th>Nama STP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($icd10 as $item)
                        <tr>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{isset($item->Icd10_mordibitas) ? $item->Icd10_mordibitas->golsebabsakit : '' }}</td>
                            <td>{{isset($item->Icd10_stp) ? $item->Icd10_stp->namastp : '' }}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="icd10('{{$item->kode}}', '{{$item->nama}}');"><i class="fa fa-check"></i>
                                    Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel ICD 10 -->

<!-- Modal Tabel ICD 10 Mordabitas -->
@isset($icd10_mordibitas)
<div class="modal fade" id="modal-Icd10_mordibitas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ICD 10 Mordibitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_Icd10_mordibitas" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No DTD</th>
                            <th>No Terinci</th>
                            <th>Gol Sebab Sakit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($icd10_mordibitas as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nodtd}}</td>
                            <td>{{$item->noterinci}}</td>
                            <td>{{$item->golsebabsakit}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="Icd10_mordabitas('{{$item->idmordibitas}}', '{{$item->golsebabsakit}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel ICD 10 Mordabitas -->

<!-- Modal Tabel ICD 10 STP -->
@isset($icd10_stp)
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
                        @foreach ($icd10_stp as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kodestp}}</td>
                            <td>{{$item->namastp}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="Icd10_stp('{{$item->idstp}}', '{{$item->namastp}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
                                    <option value="Makanan" @isset($alergi)
                                        {{($alergi->jenisalergi == 'Makanan') ? 'selected' : ''}} @endisset>Makanan
                                    </option>
                                    <option value="Obat-obatan" @isset($alergi)
                                        {{($alergi->jenisalergi == 'Obat-obatan') ? 'selected' : ''}} @endisset>
                                        Obat-obatan</option>
                                    <option value="Lingkungan" @isset($alergi)
                                        {{($alergi->jenisalergi == 'Lingkungan') ? 'selected' : ''}} @endisset>
                                        Lingkungan</option>
                                    <option value="Lain-Lain" @isset($alergi)
                                        {{($alergi->jenisalergi == 'Lain-Lain') ? 'selected' : ''}} @endisset>Lain-Lain
                                    </option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" id="tempketeranganalergi"
                                    name="tempketeranganalergi" placeholder="Keterangan"
                                    value="{{isset($alergi->keterangan) ? $alergi->keterangan : '' }}"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-info" onclick="detailalergipasien();"><i class="fa fa-save"></i>
                    Simpan</button>
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal" aria-label="Close"><i
                        class="fa fa-check"></i> Batal</button>
            </div>

        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- Modal Modal Detail Alergi Pasien -->

<!-- Modal Tabel DIAGNOSA 1 -->
@isset($diagnosa)
<div class="modal fade" id="modal-diagnosa1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data ICD 10</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_diagnosa1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode ICD</th>
                            <th>Nama Diagnosa</th>
                            <th>Gol Sebab Sakit</th>
                            <th>Nama STP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diagnosa as $item)
                        <tr>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{isset($item->Icd10_mordibitas) ? $item->Icd10_mordibitas->golsebabsakit : '' }}</td>
                            <td>{{isset($item->Icd10_stp) ? $item->Icd10_stp->namastp : '' }}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="diagnosa1('{{$item->kode}}', '{{$item->nama}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Tabel DIAGNOSA1 -->

<!-- Modal Tabel DIAGNOSA 2 -->
<div class="modal fade" id="modal-diagnosa2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data ICD 10</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_diagnosa2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode ICD</th>
                            <th>Nama Diagnosa</th>
                            <th>Gol Sebab Sakit</th>
                            <th>Nama STP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diagnosa as $item)
                        <tr>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{isset($item->Icd10_mordibitas) ? $item->Icd10_mordibitas->golsebabsakit : '' }}</td>
                            <td>{{isset($item->Icd10_stp) ? $item->Icd10_stp->namastp : '' }}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="diagnosa2('{{$item->kode}}', '{{$item->nama}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Tabel DIAGNOSA2 -->

<!-- Modal Tabel DIAGNOSA 3 -->
<div class="modal fade" id="modal-diagnosa3">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data ICD 10</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_diagnosa3" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode ICD</th>
                            <th>Nama Diagnosa</th>
                            <th>Gol Sebab Sakit</th>
                            <th>Nama STP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diagnosa as $item)
                        <tr>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{isset($item->Icd10_mordibitas) ? $item->Icd10_mordibitas->golsebabsakit : '' }}</td>
                            <td>{{isset($item->Icd10_stp) ? $item->Icd10_stp->namastp : '' }}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="diagnosa3('{{$item->kode}}', '{{$item->nama}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel DIAGNOSA3 -->

<!-- Modal Tabel Lokasi -->
@isset($lokasi)
<div class="modal fade" id="modal-lokasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lokasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_lokasi" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokasi as $item)
                        <tr>
                            <td>{{$item->lokasi_propinsi}}</td>
                            <td>{{$item->lokasi_nama}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="lokasi('{{$item->idlokasi}}', '{{$item->lokasi_nama}}');"><i
                                        class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Lokasi -->

<!-- Modal Tabel Data Pendaftaran Rawat jalan -->
@isset($rawatjalan)
<div class="modal fade" id="modal-rawatjalan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pendaftaran Rawat jalan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_rawatjalan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Faktur</th>
                            <th>No RM</th>
                            <th>Pasien</th>
                            <th>Tgl Masuk</th>
                            <th>Poli</th>
                            <th>Dokter</th>
                            <th>Perusahaan</th>
                            <th>Faskes</th>
                            <th>Inap</th>
                            <th>Status</th>
                            <th>Alamat</th>
                            <th>Ayah</th>
                            <th>Penangung Jawab</th>
                            <th>Kunjungan Ke</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($rawatjalan as $item)
                        <tr
                            onclick="rawatjalan('{{$item->faktur_rawatjalan}}','{{$item->norm}}','{{$item->Pasien->namapasien}}','{{$item->tglmasuk}}');">
                            <td>{{$no++}}</td>
                            <td>{{$item->faktur_rawatjalan}}</td>
                            <td>{{$item->norm}}</td>
                            <td>{{$item->Pasien->namapasien}}</td>
                            <td>{{$item->tglmasuk}}</td>
                            <td>{{$item->Poliklinik->nama}}</td>
                            <td>{{$item->Dokter->nama}}</td>
                            <td>{{$item->Perusahaan->namaprsh}}</td>
                            <td>{{$item->Faskes->namafaskes}}</td>
                            <td><input type="checkbox" {{ ($item->inap == 1) ? 'checked' : ''}} readonly></td>
                            <td>{{$item->statustransaksi}}</td>
                            <td>{{$item->Pasien->alamat}}</td>
                            <td>{{$item->Pasien->namaayah}}</td>
                            <td>{{$item->Pasien->penanggungjawab}}</td>
                            <td>{{$item->kunjunganke}}</td>
                            <td>
                                <button class="btn btn-outline-info"
                                    onclick="rawatjalan('{{$item->faktur_rawatjalan}}','{{$item->norm}}','{{$item->Pasien->namapasien}}','{{$item->tglmasuk}}');">Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Data Pendaftaran Rawat jalan -->

<!-- Modal Tabel Data Tarif Tindakan Poli -->
@isset($tariftindakanpoli)
<div class="modal fade" id="modal-tariftindakanpoli">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Tarif Tindakan Poli</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_tariftindakanpoli" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Poli</th>
                            <th>Nama Tindakan Poli</th>
                            <th>Tarif</th>
                            <th>E-Klaim BPJS</th>
                            <th>Kode_Icd9</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tariftindakanpoli as $item)
                        <tr
                            onclick="tariftindakanpoli('{{$item->idtindakan}}', '{{$item->namatindakan}}', '{{$item->tarif}}');">
                            <td>{{$item->Poliklinik->nama}}</td>
                            <td>{{$item->namatindakan}}</td>
                            <td>@rupiah($item->tarif)</td>
                            <td>{{$item->Eklaimbpjs->nama}}</td>
                            <td></td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="tariftindakanpoli('{{$item->idtindakan}}', '{{$item->namatindakan}}', '{{$item->tarif}}');"><i
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
<!-- Modal Tabel Data Tarif Tindakan Poli -->

<!-- Modal Tabel Data Kategori Transaksi -->
@isset($kategoritransaksi)
<div class="modal fade" id="modal-kategoritransaksi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Kategori Transaksi Rawat Inap</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_kategoritransaksi" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoritransaksi as $item)
                        <tr onclick="kategoritransaksi('{{$item->kode}}', '{{$item->kategori}}');">
                            <td>{{$item->kode}}</td>
                            <td>{{$item->kategori}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="kategoritransaksi('{{$item->kode}}', '{{$item->kategori}}');"><i
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
<!-- Modal Tabel Data Kategori Transaksi -->

<!-- Modal Tabel User Level -->
@isset($user_level)
<div class="modal fade" id="modal-user_level">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data User Level</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_user_level" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($user_level as $item)
                        <tr onclick="user_level('{{$item->idlevel}}', '{{$item->namalevel}}');">
                            <td>{{$no++}}</td>
                            <td>{{$item->namalevel}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="user_level('{{$item->idlevel}}', '{{$item->namalevel}}');"><i
                                        class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel User Level -->

<!-- Modal Tabel Rawat Inap -->
@isset($rawatinap)
<div class="modal fade" id="modal-rawatinap">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Rawat Inap</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_rawatinap" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Rawat Inap</th>
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Kamar</th>
                            <th>Kelas</th>
                            <th>Ruang</th>
                            <th>Jenis Kelamin</th>
                            <th>Perusahaan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($rawatinap as $item)
                        <tr onclick="rawatinap('{{$item->faktur_rawatinap}}');">
                            <td>{{$no++}}</td>
                            <td>{{$item->faktur_rawatinap}}</td>
                            <td>{{$item->norm}}</td>
                            <td>{{$item->Pasien->namapasien}}</td>
                            <td>{{$item->Kamar->kodekamar}}</td>
                            <td>{{$item->Kelas}}</td>
                            <td>{{$item->Ruang}}</td>
                            <td>{{$item->Pasien->jeniskelamin}}</td>
                            <td>{{$item->Perusahaan->namaprsh}}</td>
                            <td>{{$item->Pasien->alamat}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="rawatinap('{{$item->faktur_rawatinap}}');"><i class="fa fa-check"></i>
                                    Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Rawat Inap -->

<!-- Modal Tabel Pembayaran Rawat jalan -->
@isset($bayarrjalan)
<div class="modal fade" id="modal-bayarrjalan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pembayaran Rawat jalan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_modal_bayarrjalan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">No. Bayar Rawat Jalan</th>
                            <th colspan="2" style="text-align:center">Tanggal</th>
                            <th rowspan="2">No. RM</th>
                            <th rowspan="2">Nama Pasien</th>
                            <th rowspan="2">Perusahaan / Jaminan</th>
                            <th rowspan="2">Disk.</th>
                            <th rowspan="2">+/- Disk.</th>
                            <th rowspan="2">Tagihan</th>
                            <th rowspan="2">Pembulatan Bayar</th>
                            <th rowspan="2">Dibayar</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>Tagihan</th>
                            <th>Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($bayarrjalan as $item)
                        <tr onclick="bayarrjalan('{{$item->nobayar_rjalan}}');">
                            <td>{{$no++}}</td>
                            <td>{{$item->nobayar_rjalan}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{$item->tanggalbayar}}</td>
                            <td>{{$item->norm}}</td>
                            <td>{{$item->Pasien->namapasien}}</td>
                            <td></td>
                            <td class="text-right">@rupiah($item->diskonnominal + $item->diskonnilai)</td>
                            <td class="text-right">@rupiah((round($item->tagihan / 1000) * 1000) - $item->tagihan)</td>
                            <td class="text-right">@rupiah($item->tagihan)</td>
                            <td class="text-right">@rupiah($item->pembulatan)</td>
                            <td class="text-right">@rupiah($item->bayar)</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm"
                                    onclick="bayarrjalan('{{$item->nobayar_rjalan}}');"><i class="fa fa-check"></i>
                                    Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endisset
<!-- Modal Tabel Pembayaran Rawat jalan -->

<!-- /.modal -->