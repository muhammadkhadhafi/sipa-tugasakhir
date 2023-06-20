<?php

namespace App\Models\Admin\Data;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatatanPengajuanSuratKeteranganAktif extends Model
{
    use HasFactory;

    protected $table = 'admin__catatan_pengajuan_surat_keterangan_aktifs';
    protected $guarded = ['id'];
}
