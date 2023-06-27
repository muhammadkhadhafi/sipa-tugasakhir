<?php

namespace App\Models\Admin\Data;

use App\Models\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriPembayaran extends Model
{
    use HasFactory;

    protected $table = 'admin__pembayaran__kategori_pembayarans';
    protected $guarded = ['id'];


    public function getTanggalDitambahkanStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getWaktuDitambahkanStringAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y H:i');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_kategoripembayaran');
    }
}
