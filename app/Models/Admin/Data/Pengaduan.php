<?php

namespace App\Models\Admin\Data;

use App\Models\Admin\MasterData\Mahasiswa;
use Carbon\Carbon;
use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends ModelsModel
{
    use HasFactory;

    protected $table = 'admin__pengaduan';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function getTanggalPengaduanStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getWaktuPengaduanStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y h:i A');
    }
}
