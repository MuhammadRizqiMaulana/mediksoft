<html>

<head>
    <title>Medikasoft</title>
</head>

<body onload="window.print()">
    <table>
        <tr>
            <td rowspan="2">LOGO Rumah Sakit</td>
            <td>Nama Rumah Sakit</td>

        </tr>
        <tr>
            <td>AlamatRumah Sakit</td>
            <td>No Telp Rumah Sakit</td>
        </tr>
    </table>
    <br>
    <center>
        <h4><strong>REKAM MEDIS RAWAT INAP </strong></h4>
    </center>
    <center>
        <h4><strong>Tanggal </strong></h4>
    </center>
    <br>

    <div class="col">
        <table align="center" border="1" width="1000px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Diagnosa</th>
                    <th>Diagnosa Keluar</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($datas as $item)
                <tr>
                    <td align="right">{{$no++}}</td>
                    <td>{{$item->norm}}</td>
                    <td>{{$item->Pasien->namapasien}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->Pasien->tgllahir)->diffInYears(\Carbon\Carbon::now())}}
                    </td>
                    <td>{{$item->Pasien->alamat}}</td>
                    <td>{{$item->diagnosaawal}}</td>
                    <td>{{$item->diagnosaakhir}}</td>
                    <td>{{$item->tglmasuk}}</td>
                    <td>{{$item->tglkeluar}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>