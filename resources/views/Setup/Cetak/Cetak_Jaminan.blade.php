<html>

<head>
    <title>Medikasoft - Cetak Data Perushaan / Jaminan</title>
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
        <h4><strong>DATA PERUSAHAAN / JAMINAN </strong></h4>
    </center>
    <br>

    <div class="col">
        <table align="center" border="1" width="1000px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perushaan</th>
                    <th>Jenis</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($datas as $item)
                <tr>
                    <td align="right">{{$no++}}</td>
                    <td>{{$item->namaprsh}}</td>
                    <td>{{$item->jenisprsh}}</td>
                    <td>{{$item->alamatprsh}}</td>
                    <td>{{$item->tlp}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>