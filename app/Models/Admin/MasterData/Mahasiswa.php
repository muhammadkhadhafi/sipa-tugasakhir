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

    public function getTanggalLahirStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->translatedFormat('d F Y');
    }

    public function getjenisKelaminStringAttribute()
    {
        if ($this->attributes['jenis_kelamin'] == 1) {
            return 'Laki-laki';
        } elseif ($this->attributes['jenis_kelamin'] == 2) {
            return 'Perempuan';
        }
    }

    public function getAgamaStringAttribute()
    {
        if ($this->attributes['agama'] == 1) {
            return 'Islam';
        } elseif ($this->attributes['agama'] == 2) {
            return 'Kristen';
        } elseif ($this->attributes['agama'] == 3) {
            return 'Katholik';
        } elseif ($this->attributes['agama'] == 4) {
            return 'Hindu';
        } elseif ($this->attributes['agama'] == 5) {
            return 'Budha';
        } elseif ($this->attributes['agama'] == 6) {
            return 'Kong Hu Chu';
        }
    }
}
