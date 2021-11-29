<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Perusahaan;
use App\Models\Faskes;
use App\Models\Lokasi;
use App\Models\Rawatjalan;
use App\Models\Tarif_dokter_poli;

use Carbon\Carbon;

class Data_PendaftaranController extends Controller
{

    public function index()
    {

        $datas = Rawatjalan::all();

        return view('RawatJalan.Content.Data_Pendaftaran', compact('datas'));
    }

    public function tambah()
    {

        $pasien = Pasien::all();
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $faskes = Faskes::all();
        $now = Carbon::now();

        return view('RawatJalan.Content.Pendaftaran_Rawat_Jalan', compact('pasien', 'poliklinik', 'dokter', 'perusahaan', 'faskes', 'now'));
    }

    public function store(Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'between' => ':attribute diisi antara 0 sampai XXXXXXXX.XXXX digit',
        ];

        $this->validate($request, [
            'norm' => 'required|max:10',
            'tglmasuk' => 'nullable',
            'kodepoli' => 'required|max:5',
            'iddokter' => 'required|max:5',
            'idprsh' => 'required|max:11',
            'kodefaskespengirim' => 'required|max:11',
            'administrasi' => 'nullable|numeric|between:0.0000,99999999.9999|min:0',

        ], $messages);

        try {

            $invoice = Rawatjalan::selectRaw('LPAD(CONVERT((COUNT("faktur_rawatjalan") + 1) , char(13)) , 13,"0") as invoice')->first(); //membuat nomer urut
            $kunjungan = Rawatjalan::where('norm', $request->norm)->count(); //kunjungan ke berapa?

            $tarifdokter = Tarif_dokter_poli::where('kodepoli', $request->kodepoli)->where('iddokter', $request->iddokter)->first(); //mencari tarifdokterpoli

            $data = new Rawatjalan();
            $data->faktur_rawatjalan  = "RJ" . $invoice->invoice;
            $data->norm = $request->norm;
            $data->tglmasuk = $request->tglmasuk;
            $data->kodepoli = $request->kodepoli;
            $data->iddokter = $request->iddokter;
            $data->idprsh = $request->idprsh;
            $data->kodefaskespengirim = $request->kodefaskespengirim;

            $data->administrasi = $request->administrasi;
            $data->tarifdokter = $tarifdokter->tarif;
            $data->subtotal = $request->administrasi + $tarifdokter->tarif;

            $data->diagnosaawal = "";
            $data->diagnosaakhir = "";
            $data->prosedur1 = "";
            $data->diskon = 0;
            $data->inap = 0;
            $data->iduserpendaftaran = NULL;
            $data->iduserkasir = NULL;
            $data->statustransaksi = "proses";
            $data->kunjunganke = $kunjungan + 1;
            $data->nosep = "";
            $data->idklaimdokter = 0;
            $data->idklaimadministrasi = 0;
            $data->edukasiawal = "Tidak Disampaikan";
            $data->edukasiawalket = "";
            $data->edukasikepada = "Kalangan Pasien";
            $data->hubdenganpasien = "";
            $data->diagnosadengan = "";

            $data->save();

            return redirect('/Data_Pendaftaran')->with('alert-success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {

            echo $e->getMessage();   // insert query
            // do task when error
            return redirect('/Data_Pendaftaran')->with('alert-danger', 'Data gagal ditambahkan!');
        }
    }

    public function ubah($faktur_rawatjalan)
    {
        $pasien = Pasien::all();
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $faskes = Faskes::all();
        $now = Carbon::now();
        $ubah = Rawatjalan::find($faktur_rawatjalan);
        return view('RawatJalan.Content.Pendaftaran_Rawat_Jalan', compact('ubah', 'pasien', 'poliklinik', 'dokter', 'perusahaan', 'faskes', 'now'));
    }

    public function update($faktur_rawatjalan, Request $request)
    {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'between' => ':attribute diisi antara 0 sampai XXXXXXXX.XXXX digit',
        ];

        $this->validate($request, [
            'norm' => 'required|max:10',
            'tglmasuk' => 'nullable',
            'kodepoli' => 'required|max:5',
            'iddokter' => 'required|max:5',
            'idprsh' => 'required|max:11',
            'kodefaskespengirim' => 'required|max:11',
            'administrasi' => 'nullable|numeric|between:0.0000,9999999999.9999|min:0',
        ], $messages);

        $data = Rawatjalan::find($faktur_rawatjalan);
        $data->norm = $request->norm;
        $data->tglmasuk = $request->tglmasuk;
        $data->kodepoli = $request->kodepoli;
        $data->iddokter = $request->iddokter;
        $data->idprsh = $request->idprsh;
        $data->kodefaskespengirim = $request->kodefaskespengirim;
        $data->administrasi = $request->administrasi;

        $data->diagnosaawal = "";
        $data->diagnosaakhir = "";
        $data->prosedur1 = "";
        $data->tarifdokter = 0;
        $data->subtotal = 0;
        $data->diskon = 0;
        $data->inap = 0;
        $data->iduserpendaftaran = NULL;
        $data->iduserkasir = NULL;
        $data->statustransaksi = "proses";
        $data->kunjunganke = $data->kunjunganke;
        $data->nosep = "";
        $data->idklaimdokter = 0;
        $data->idklaimadministrasi = 0;
        $data->edukasiawal = "Tidak Disampaikan";
        $data->edukasiawalket = "";
        $data->edukasikepada = "Kalangan Pasien";
        $data->hubdenganpasien = "";
        $data->diagnosadengan = "";
        $data->save();

        return redirect('/Data_Pendaftaran')->with('alert-success', 'Data berhasil diubah!');
    }

    public function hapus($faktur_rawatjalan)
    {
        $datas = Rawatjalan::find($faktur_rawatjalan);
        $datas->delete();
        return redirect('/Data_Pendaftaran')->with('alert-success', 'Data berhasil dihapus!');
    }

    public function lihat($faktur_rawatjalan)
    {

        $pasien = Pasien::all();
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $faskes = Faskes::all();
        $now = Carbon::now();
        $lihat = Rawatjalan::find($faktur_rawatjalan);

        return view('RawatJalan.Content.Pendaftaran_Rawat_Jalan', compact('pasien', 'poliklinik', 'dokter', 'perusahaan', 'faskes', 'now', 'lihat'));
    }

    public function cetakdatapendaftaran()
    {

        $datas = Rawatjalan::all();

        return view('RawatJalan.Cetak.Cetak_Data_Pendaftaran', compact('datas'));
    }

    public function suratketerangansakit($faktur_rawatjalan)
    {

        $datas = Rawatjalan::find($faktur_rawatjalan);

        return view('RawatJalan.Content.Surat_Keterangan_Sakit', compact('datas'));
    }

    public function suratketerangansehat($faktur_rawatjalan)
    {

        $datas = Rawatjalan::find($faktur_rawatjalan);

        return view('RawatJalan.Content.Surat_Keterangan_Sehat', compact('datas'));
    }
}