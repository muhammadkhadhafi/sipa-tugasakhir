<?php

namespace App\Models\Admin\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;
use Carbon\Carbon;

class WisudaPembayaran extends Model
{
    use HasFactory;

    protected $table = 'admin__wisuda__pembayarans';
    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->belongsTo(WisudaPendaftaran::class, 'id_pendaftaran');
    }

    public function getWaktuPembayaranStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y H:i');
    }

    public function getWaktuDibayarStringAttribute()
    {
        return Carbon::parse($this->attributes['waktu_dibayar'])->translatedFormat('d F Y H:i');
    }

    public function getStatusPembayaranStringAttribute()
    {
        if ($this->attributes['status'] == 1) {
            return '<span class="badge badge-primary p-1">Belum dibayar</span>';
        } elseif ($this->attributes['status'] == 2) {
            return '<span class="badge badge-success p-1">Dibayar</span>';
        }
    }
}
