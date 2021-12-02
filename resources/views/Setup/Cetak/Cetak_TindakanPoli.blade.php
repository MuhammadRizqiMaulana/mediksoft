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
        <h4><strong>DATA TARIF TINDAKAN POLI </strong></h4>
    </center>
    <br>

    <div class="col">
        <table align="center" border="1" width="1000px">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Poli</th>
                    <th rowspan="2">Nama Tindakan</th>
                    <th colspan="4">Tarif</th>
                </tr>
                <tr>
                    <th align="center">RS</th>
                    <th align="center">Dokter</th>
                    <th align="center">Paramedis</th>
                    <th align="center">Tarif</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($datas as $item)
                <tr>
                    <td align="right">{{$no++}}</td>
                    <td>{{$item->Poliklinik->nama}}</td>
                    <td>{{$item->namatindakan}}</td>
                    <td align="right">{{$item->untukrs}}</td>
                    <td align="right">{{$item->untukdokter}}</td>
                    <td align="right">{{$item->untukparamedis}}</td>
                    <td align="right">{{$item->tarif}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>