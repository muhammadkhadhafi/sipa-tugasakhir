<?php

namespace App\Models\Admin\MasterData;

use Illuminate\Support\Carbon;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends ModelAuthenticate
{
    use HasFactory;

    protected $table = 'admin__mahasiswa';
    protected $guarded = ['id'];

    public function getTanggalLahirStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->translatedFormat('d F Y');
    }
}
