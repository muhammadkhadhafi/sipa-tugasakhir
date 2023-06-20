<?php

namespace App\Models\Admin\MasterData;

use App\Models\Admin\Data\Pembayaran;
use App\Models\Admin\Data\PengajuanSuratKeteranganAktif;
use Illuminate\Support\Carbon;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends ModelAuthenticate
{
    use HasFactory;

    protected $table = 'admin__ms__mahasiswa';
    protected $guarded = ['id'];

    public function getTanggalLahirStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->translatedFormat('d F Y');
    }

    public function pengajuanSuratKeteranganAktif()
    {
        return $this->hasMany(PengajuanSuratKeteranganAktif::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}
