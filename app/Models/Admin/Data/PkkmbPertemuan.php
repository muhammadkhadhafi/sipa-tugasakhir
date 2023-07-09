<?php

namespace App\Models\Admin\Data;

use App\Models\Model;
use Carbon\Carbon;

class PkkmbPertemuan extends Model
{
    protected $table = 'admin__pkkmb__pertemuans';
    protected $guarded = ['id'];

    public function pkkmbGrup()
    {
        return $this->belongsTo(PkkmbGrup::class, 'id_pkkmb_grup');
    }

    public function pkkmbAbsen()
    {
        return $this->hasMany(PkkmbAbsen::class, 'id_pkkmb_pertemuan');
    }

    public function pkkmbIzin()
    {
        return $this->hasMany(PkkmbIzin::class, 'id_pkkmb_pertemuan');
    }

    public function getTanggalPertemuanStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_pertemuan'])->translatedFormat('l, d F Y');
    }
}
