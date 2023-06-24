<?php

namespace App\Models\Admin\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;
use Carbon\Carbon;

class SuratKeteranganAktifCatatan extends Model
{
    use HasFactory;

    protected $table = 'admin__surat_keterangan_aktif__catatans';
    protected $guarded = ['id'];

    public function getUpdateCatatanStringAttribute()
    {
        return Carbon::parse($this->attribute['updated_at'])->translatedFormat('d F Y');
    }
}
