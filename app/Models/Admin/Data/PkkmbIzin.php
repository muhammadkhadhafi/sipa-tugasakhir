<?php

namespace App\Models\Admin\Data;

use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;

class PkkmbIzin extends Model
{
    protected $table = 'admin__pkkmb__izins';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function pkkmbPertemuan()
    {
        return $this->belongsTo(PkkmbPertemuan::class, 'id_pkkmb_pertemuan');
    }
}
