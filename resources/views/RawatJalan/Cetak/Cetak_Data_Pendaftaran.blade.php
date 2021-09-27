<html>
    <head>
        <title>Medikasoft - Detak Data Pendaftaran Rawat jalan</title>
    </head>
    <body>
        <table>
            <tr>
                <td rowspan="2">LOGO Rumah Sakit</td>
                <td>Nama Rumah Sakit</td>
            </tr>
            <tr>
                <td>AlamatRumah Sakit</td>
            </tr>
        </table>
        <br>
        <center><h4><strong>DATA PENDAFTARAN RAWAT JALAN</strong></h4></center>
        <center><h6><strong>Tanggal sd Tanggal</strong></h6></center>
        <br>

        <div class="col-12">
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <th>Nama Pasien</th>
                        <th>Nama Dokter</th>
                        <th>Nama Poli</th>
                        <th>Faskes</th>
                        <th>Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($datas as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->faktur_rawatjalan}}</td>
                            <td>{{$item->tglmasuk}}</td>
                            <td>{{$item->Pasien->namapasien}}</td>
                            <td>{{$item->Dokter->nama}}</td>
                            <td>{{$item->Poliklinik->nama}}</td>
                            <td>{{$item->Faskes->namafaskes}}</td>
                            <td>{{$item->Perusahaan->namaprsh}}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
    </body>
</html>