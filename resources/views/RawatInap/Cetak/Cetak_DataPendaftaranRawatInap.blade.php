<html>

<head>
    <title>Medikasoft</title>
</head>

<body onload="window.print()">
    <table align="center">
        <tr>

            <td>Nama Rumah Sakit</td>
        </tr>
        <tr>
            <td>AlamatRumah Sakit - Telp</td>
        </tr>
    </table>
    <br>
    <center>
        <h4><strong>DATA PENDAFTARAN RAWAT INAP</strong></h4>
    </center>
    <br>

    <div class="col-12">
        <table align="center" border="1" width="1000px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Nama Kamar</th>
                    <th>Perusahaan</th>
                    <th>Status Bayar</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($datas as $item)
                <tr>
                    <td align="right">{{$no++}}</td>
                    <td>{{$item->faktur_rawatinap}}</td>
                    <td>{{$item->tglmasuk}}</td>
                    <td>{{$item->Pasien->namapasien}}</td>
                    <td>{{$item->Dokter->nama}}</td>
                    <td>{{$item->kodekamar}}</td>
                    <td>{{$item->Perusahaan->namaprsh}}</td>
                    <td>{{$item->statustransaksi}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>