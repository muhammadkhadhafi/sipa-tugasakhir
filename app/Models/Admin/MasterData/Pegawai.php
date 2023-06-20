<?php

namespace App\Models\Admin\MasterData;

use Carbon\Carbon;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends ModelAuthenticate
{
    use HasFactory;

    protected $table = 'admin__ms__pegawai';
    protected $guarded = ['id'];

    // public function setPassword($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    public function getTanggalLahirStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->translatedFormat('d F Y');
    }
}
