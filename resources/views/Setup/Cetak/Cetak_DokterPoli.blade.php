<html>

<head>
    <title>Medikasoft - Detak Data Dokter POLI</title>
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
        <h4><strong>DATA DOKTER POLI </strong></h4>
    </center>
    <br>

    <div class="col">
        <table align="center" border="1" width="1000px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Poli</th>
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
                    <td>{{$no++}}</td>
                    <td>
                        @if(isset($item->Poliklinik)){{$item->Poliklinik->nama}}@endif
                    </td>
                    <td>
                        @if(isset($item->Dokter)){{$item->Dokter->nama}}@endif
                    </td>
                    <td>{{$item->tarif}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>