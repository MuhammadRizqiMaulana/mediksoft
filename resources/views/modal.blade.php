<!-- Modal -->

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
                <button class="btn btn-outline-info btn-sm" onclick="kelas('{{$item->kodekelas}}', '{{$item->nama}}');"><i class="fa fa-check"></i> Pilih</button>
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
                <button class="btn btn-outline-info btn-sm" onclick="ruang('{{$item->koderuang}}', '{{$item->namaruang}}');"><i class="fa fa-check"></i> Pilih</button>
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
                <button class="btn btn-outline-info btn-sm" onclick="eklaimbpjs('{{$item->idklaim}}');"><i class="fa fa-check"></i> Pilih</button>
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



<!-- /.modal -->
