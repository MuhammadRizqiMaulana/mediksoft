<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Kelas;
use App\Models\Kategoritransaksi;
use App\Models\Eklaimbpjs;
use App\Models\Icd9;
use App\Models\Tarif_tindakan_inap;
use App\Models\Tarif_tindakan_inap_kelas;

class TindakanInapController extends Controller
{
    public function index()
    {
        $kategoritransaksi = Kategoritransaksi::all();
        $kategori = Kategoritransaksi::where('kode',2)->orwhere('kode',740)->orwhere('kode',9)->get();
        $kelas = Kelas::all();
        //$icd9 = Icd9::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_tindakan_inap::all();
        return view('Setup.Content.TindakanInap', compact('kategoritransaksi', 'kategori', 'kelas', 'eklaimbpjs', 'datas'));
    }
    public function tambah()
    {

        $datas = Tarif_tindakan_inap::all();

        return view('Setup.Content.TindakanInap', compact('datas'));
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
            'image' => ':attribute harus berupa gambar'
        ];

        $this->validate($request, [
            'kodekategori' => 'required|max:5',
            'namatindakan' => 'required|max:50',
            'idklaim' => 'required'
        ], $messages);

        try{
            $kelas = Kelas::all();

            $invoice = Tarif_tindakan_inap::selectRaw('LPAD(CONVERT((COUNT("idtindakan") + 1) , char(5)) , 5,"0") as invoice')->first();
            
            $data = new Tarif_tindakan_inap();
            $data->idtindakan = "TRI".$invoice->invoice;
            $data->kodekategori = $request->kodekategori;
            $data->namatindakan = $request->namatindakan;
            $data->idklaim = $request->idklaim;
            $data->save();

            foreach ($kelas as $key => $item) {

                $tarifinapkelas = new Tarif_tindakan_inap_kelas();
                $tarifinapkelas->idtindakan = "TRI".$invoice->invoice;
                $tarifinapkelas->kodekelas = $item->kodekelas;
                $tarifinapkelas->tarif = $request->tarif[$key];
                $tarifinapkelas->untukrs = $request->untukrs[$key];
                $tarifinapkelas->untukdokter = $request->untukdokter[$key];
                $tarifinapkelas->untukparamedis = $request->untukparamedis[$key];
                $tarifinapkelas->save();

            }
            
            return redirect('/TindakanInap')->with('alert-success','Data berhasil ditambahkan!');
        }
        catch(\Exception $e){
            // do task when error
            return redirect('/TindakanInap')->with('alert-danger',$e);
            
        }
    }
    public function ubah($idtindakan)
    {
        $kategoritransaksi = Kategoritransaksi::all();
        $kategori = Kategoritransaksi::where('kode',2)->orwhere('kode',740)->orwhere('kode',9)->get();
        $ubah = Tarif_tindakan_inap::find($idtindakan);
        $kelas = Tarif_tindakan_inap_kelas::where('idtindakan', $idtindakan)->get();
        //$icd9 = Icd9::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_tindakan_inap::all();

        return view('Setup.Content.TindakanInap', compact('kategoritransaksi', 'kategori', 'ubah', 'kelas', 'eklaimbpjs', 'datas'));
    }

    public function update($idtindakan, Request $request)
    {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar'
        ];

        $this->validate($request, [
            'kodekategori' => 'required|max:5',
            'namatindakan' => 'required|max:50',
            'idklaim' => 'required'
        ], $messages);

        try{
            $kelas = Kelas::all();

            $data = Tarif_tindakan_inap::find($idtindakan);
            $data->kodekategori = $request->kodekategori;
            $data->namatindakan = $request->namatindakan;
            $data->idklaim = $request->idklaim;
    	    $data->save();

            foreach ($kelas as $key => $item) {
                DB::table('tarif_tindakan_inap_kelas')->where('idtindakan', $idtindakan)->where('kodekelas', $item->kodekelas)->update([
                    'tarif' => $request->tarif[$key],
                    'untukrs' => $request->untukrs[$key],
                    'untukdokter' => $request->untukdokter[$key],
                    'untukparamedis' => $request->untukparamedis[$key],
                ]);

            }
            
            return redirect('/TindakanInap')->with('alert-success', 'Data berhasil diubah!');
        }
        catch(\Exception $e){
            // do task when error
            return redirect('/TindakanInap')->with('alert-danger',$e);
            
        }

    }
    public function hapus($idtindakan)
    {
        try{
            
            $datas = Tarif_tindakan_inap::find($idtindakan);
    	    $datas->delete();
            
            $datas = Tarif_tindakan_inap_kelas::where('idtindakan', $idtindakan);
    	    $datas->delete();
            
            return redirect('/TindakanInap')->with('alert-success','Data berhasil dihapus!');
        }catch(\Exception $e){

            return redirect('/TindakanInap')->with('alert-danger','Data gagal dihapus!');
        }

    }
}