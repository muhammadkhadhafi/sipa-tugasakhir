<?php

namespace App\Models\Admin\Data;

use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;
use Carbon\Carbon;

class WisudaPembayaran extends Model
{
    use HasFactory;

    protected $table = 'admin__wisuda__pembayarans';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function getTanggalPembayaranStringAttribute()
    {
        return Carbon::parse($this->attribute['created_at'])->translatedFormat('d F Y');
    }

    public function getStatusPembayaranStringAttribute()
    {
        if (!$this->attribute['status']) {
            return 'Belum dibayar';
        } else {
            return 'Dibayar';
        }
    }
}
