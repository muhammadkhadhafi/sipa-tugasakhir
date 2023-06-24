<?php

namespace App\Models\Admin\Data;

use Carbon\Carbon;
use App\Models\Model;
use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeteranganAktifPengajuan extends Model
{
    use HasFactory;

    protected $table = 'admin__surat_keterangan_aktif__pengajuans';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function getTanggalPengajuanStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getTanggalSuratStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
    }
}
