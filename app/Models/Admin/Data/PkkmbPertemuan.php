<?php

namespace App\Models\Admin\Data;

use App\Models\Model;
use Carbon\Carbon;

class PkkmbPertemuan extends Model
{
    protected $table = 'admin__pkkmb__pertemuans';
    protected $guarded = ['id'];

    public function grup()
    {
        return $this->belongsTo(PkkmbGrup::class, 'id_pkkmb_grup');
    }

    public function absen()
    {
        return $this->hasMany(PkkmbAbsen::class);
    }

    public function getTanggalPertemuanString()
    {
        return Carbon::parse($this->attributes['tanggal_pertemuan'])->translatedFormat('l, d F Y');
    }
}
