<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_asesmendokter extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_asesmendokter'; // nama tabel 
    protected $primaryKey   = ''; // primary key tabel 
    protected $fillable     = [
        'faktur_rawatjalan', 'norm', 'tanggal', 'transport_pribadi', 'transport_ambulance', 'transport_lain', 'stransport_lain', 'rujukan_rs', 'rujukan_bp', 'rujukan_puskesmas', 'rujukan_dokter', 'rujukan_bidan', 'rujukan_pesawat', 'rujukan_tempat', 'rujukan_lainlain', 'kodepoli', 'nyeri_tidak', 'nyeri_kronis', 'nyeri_akut', 'nyeri_skala', 'nyeri_lokasi', 'nyeri_durasi', 'nyeri_frekuensi', 'nyeri_minumobat', 'nyeri_mendengarmusik', 'nyeri_istirahat', 'nyeri_tidur', 'nyeri_lain', 'snyeri_lain', 'bb', 'tb', 'ku', 'tensi', 'nadi', 'suhu', 'nafas', 'airway_bersih', 'airway_slem', 'airway_partial', 'airway_total', 'airway1', 'airway2', 'breathing_normal', 'breathing_wheezing', 'breathing_ronchi', 'breathing_retraction', 'breathing_nasal', 'breathing_abnormal', 'circulation_normal', 'circulation_pallor', 'circulation_molting', 'circulation_cyanosis', 'circulation_capiler', 'circulation', 'disability_tak', 'disability_parase', 'disability_plegi', 'disability_paraperesis', 'disability1', 'disability2', 'exposure', 'prehospital_rsj', 'prehospital_intubasi', 'prehospital_oksigenasi', 'prehospital_collarneck', 'prehospital_balut', 'prehospital_obat', 'trauma_atas', 'trauma_lokasi', 'kecelakaan_lalin', 'kecelakaan_kerja', 'huruhara', 'kecelakaan_rt', 'kekerasan', 'kecelakaan_lain', 'skecelakaan_lain', 'tempatkejadian', 'tanggalkejadian', 'non', 'trauma2', 'kasuspolisi', 'bukankasuspolisi', 'gigitan', 'intoksikasi', 'bencanalam', 'kondisi_gawat', 'kondisi_darurat', 'kondisi_tidakgawat', 'kondisi_meninggal', 'labrad', 'kontrol_klinik', 'kontrol_kliniknama', 'kontrol_tanggal', 'konsul_dokter', 'konsul_dokterkode', 'konsul_jam', 'konsul_dijawab', 'rawat', 'rawat_kodekamar', 'rawat_kodedokter', 'menolak', 'meninggal', 'meninggal_tanggal', 'dibawapulang', 'dibawapulang_nama', 'dirujuk', 'dirujukke', 'dirujuk_ketempatpenuh', 'dirujuk_permintaan', 'keluarigd', 'keluarigdjam', 'keluarigd_stabil', 'keluarigd_kritis', 'keluarigd_meninggal', 'idkaryawan'
    ]; //field tabel
}