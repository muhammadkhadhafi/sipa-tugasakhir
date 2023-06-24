<?php

namespace App\Models\Admin\Data;

use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;
use Carbon\Carbon;

class WisudaPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'admin__wisuda__pendaftarans';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function getTanggalPendaftaranAttribute()
    {
        return Carbon::parse($this->attribute['created_at'])->translatedFormat('d F Y');
    }
}
