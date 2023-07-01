<?php

namespace App\Models\Admin\Data;

use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Data\WisudaPembayaran;
use App\Models\Model;
use Carbon\Carbon;

class WisudaPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'admin__wisuda__pendaftarans';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function pembayaran()
    {
        return $this->hasOne(WisudaPembayaran::class, 'id_pendaftaran');
    }

    public function tahun_wisuda()
    {
        return $this->belongsTo(WisudaTahun::class, 'id_wisudatahun');
    }

    public function getWaktuPendaftaranStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y H:i');
    }

    public function getTanggalPendaftaranStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getStatusStringAttribute()
    {
        if ($this->attributes['status'] == 1) {
            return 'Belum Terverifikasi';
        } elseif ($this->attributes['status'] == 2) {
            return 'Terverifikasi';
        } elseif ($this->attributes['status'] == 3) {
            return 'Ditolak';
        }
    }
}
