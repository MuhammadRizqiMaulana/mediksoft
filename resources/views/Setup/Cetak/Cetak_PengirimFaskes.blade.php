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
        <h4><strong>DATA PENGIRIM FASKES </strong></h4>
    </center>
    <br>

    <div class="col">
        <table align="center" border="1" width="1000px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pengirim</th>
                    <th>Nama Pengirim</th>
                    <th>Alamat</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($datas as $item)
                <tr>
                    <td align="right">{{$no++}}</td>
                    <td>{{$item->kodefaskes}}</td>
                    <td>{{$item->namafaskes}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->fee}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>