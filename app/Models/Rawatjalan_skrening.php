<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_skrening extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'rawatjalan_skrening'; // nama tabel 
    protected $primaryKey   = ''; // primary key tabel 
    protected $fillable     = ['faktur_rawatjalan', 'norm', 'idperawat', 'nyeri', 'trauma_ya', 'trauma_tidak', 'kualitas_tekanan', 'kualitas_terbakar', 'kualitas_tusukan', 'kualitas_diiris', 'kualitas_mencengkram', 'kualitas_melilit', 'lokasi', 'skala', 'metode_nrs', 'metode_wong_faces', 'metode_nips', 'metode_cpot', 'waktu_intermiten', 'waktu_terusmenerus', 'waktu_saattertentu', 'alatbantu_kruk', 'alatbantu_tongkat', 'alatbantu_kursiroda', 'gaya_lemah', 'gaya_sempoyongan', 'gaya_limbung', 'gangguanlihat', 'kesimpulan', 'bb', 'tb', 'gi_tidakada', 'gi_mual', 'gi_muntah', 'gi_anoreksia', 'gi_disfagia', 'gi_lain', 'namaalatbantu', 'cacattubuh', 'adl_mandiri', 'adl_dibantu', 'keadaan_baik', 'keadaan_sedang', 'keadaan_lemah', 'keadaan_gelisah', 'td', 'rr', 'nadi', 'suhu', 'gcs_e', 'gcs_m', 'gcs_v', 'airway_bebas', 'airway_bendaasing', 'airway_sputum', 'airway_darah', 'airway_lidah', 'nafas_vesikuler', 'nafas_vesikuler_minplus', 'nafas_wheezing', 'nafas_wheezing_minplus', 'nafas_rhonchi', 'nafas_rhonchi_minplus', 'nafas_keterangan', 'pupil_ukuran', 'pupil_ukuran_minplus', 'pupil_reflexcahaya', 'pupil_reflexcahaya_minplus', 'pupil_isocore', 'pupil_isocore_minplus', 'extremitas_akralhangat', 'extremitas_akraldingin', 'extremitas_pucat', 'extremitas_sianosis', 'extremitas_endema', 'extremitas_keterangan', 'crt_kurang2', 'crt_lebih2', 'muskuloskeletal_normal', 'muskuloskeletal_kerusakan', 'muskuloskeletal_luas', 'muskuloskeletal_lokasi', 'muskuloskeletal_pus', 'muskuloskeletal_keterangan', 'oksigenasi', 'lanjut_pulang', 'lanjut_aps', 'lanjut_ri', 'lanjut_rujuk', 'lanjut_meninggal', 'aps_keterangan', 'anamnesa']; //field tabel
}