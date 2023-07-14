<?php

namespace App\Models\Admin\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;

class PengaduanBukti extends Model
{
    protected $table = 'admin__pengaduans__bukti';
    protected $guarded = ['id'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }
}
