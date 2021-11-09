<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Kelas;
use App\Models\Dokter;
use App\Models\Eklaimbpjs;
use App\Models\Tarif_dokter_visite;

class DokterVisitController extends Controller
{
    public function index(){
    	
        $dokter = Dokter::all();
        $kelas = Kelas::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_visite::select('iddokter','idklaim')->distinct()->get();
    	return view('Setup.Content.DokterVisit',compact('dokter','kelas','eklaimbpjs','datas'));
    }
    public function tambah() {

        $datas = Dokter::all();         

        return view('Setup.Content.DokterVisit',compact('datas'));
        
    }
     public function store( Request $request) {

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
            'iddokter' => 'required|max:30',
            'idklaim' => 'required|max:30',
            
    	], $messages);

        try{
            $kelas = Kelas::all();

            foreach ($kelas as $key => $item) {

                $data = new Tarif_dokter_visite();
                $data->iddokter = $request->iddokter;
                $data->kodekelas = $item->kodekelas;
                $data->tarif = $request->tarif[$key];
                $data->untukrs = $request->untukrs[$key];
                $data->untukdokter = $request->untukdokter[$key];
                $data->idklaim = $request->idklaim;
                $data->pemakaitarif = 0;
                $data->save();

            }
            
            return redirect('/DokterVisit')->with('alert-success','Data berhasil ditambahkan!');
        }
        catch(\Exception $e){
            // do task when error
            return redirect('/DokterVisit')->with('alert-danger','Data gagal ditambahkan!');
            
        }
        
    }
    public function ubah($iddokter) {
        $dokter = Dokter::all();
        $ubah = Tarif_dokter_visite::where('iddokter', $iddokter)->first();
        $kelas = Tarif_dokter_visite::where('iddokter', $iddokter)->get();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_visite::select('iddokter','idklaim')->distinct()->get();

        return view('Setup.Content.DokterVisit',compact('dokter','ubah','kelas','eklaimbpjs','datas'));

    }
     public function update($iddokter, Request $request) {
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
    		'iddokter' => 'required|max:30',
            'idklaim' => 'required|max:30',
    	], $messages);

        try{
            $kelas = Kelas::all();

            foreach ($kelas as $key => $item) {
                DB::table('tarif_dokter_visite')->where('iddokter', $iddokter)->where('kodekelas', $item->kodekelas)->update([
                    'tarif' => $request->tarif[$key],
                    'untukrs' => $request->untukrs[$key],
                    'untukdokter' => $request->untukdokter[$key],
                ]);

            }
            
            return redirect('/DokterVisit')->with('alert-success','Data berhasil diubah!');
        }
        catch(\Exception $e){
            // do task when error
            return redirect('/DokterVisit')->with('alert-danger',$e);
            
        }
    }
    
    public function hapus($iddokter) {
        try{
            
            $datas = Tarif_dokter_visite::where('iddokter', $iddokter);
    	    $datas->delete();
            
            return redirect('/DokterVisit')->with('alert-success','Data berhasil dihapus!');
        }catch(\Exception $e){

            return redirect('/DokterVisit')->with('alert-danger',$e);
        }

    }

}
