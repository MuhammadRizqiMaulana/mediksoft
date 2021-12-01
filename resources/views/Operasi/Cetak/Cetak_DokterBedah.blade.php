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
        <h4><strong>DATA TARIF DOKTER BEDAH</strong></h4>
    </center>
    <br>

    <div class="col-12">
        <table align="center" border="1" width="1000px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Gol. OP</th>
                    <th>Jenis Rawat</th>
                    <th>Nama Dokter</th>
                    <th>Tarif</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($datas as $item)
                <tr>
                    <td align="right">{{$no++}}</td>
                    <td>Nama Kelas</td>
                    <td>Golongan Operasi</td>
                    <td>{{$item->jenisrawat}}</td>
                    <td>{{$item->Dokter->nama}}</td>>
                    <td>{{$item->tarif}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>