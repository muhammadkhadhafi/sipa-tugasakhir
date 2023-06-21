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

    public function getTanggalLahirStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->translatedFormat('d F Y');
    }
}
