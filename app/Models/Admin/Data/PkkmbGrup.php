<?php

namespace App\Models\Admin\Data;

use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;

class PkkmbGrup extends Model
{
    protected $table = 'admin__pkkmb__grups';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_pkkmb_grup');
    }

    public function pkkmbPertemuan()
    {
        return $this->hasMany(PkkmbPertemuan::class, 'id_pkkmb_grup');
    }

    public function pkkmbSertifikat()
    {
        return $this->hasOne(PkkmbSertifikat::class, 'id_pkkmb_grup');
    }
}
