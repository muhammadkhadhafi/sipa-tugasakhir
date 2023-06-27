<?php

namespace App\Models\Admin\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;
use Carbon\Carbon;

class WisudaHarga extends Model
{
    use HasFactory;

    protected $table = 'admin__wisuda__hargas';
    protected $guarded = ['id'];

    public function getUpdateHargaStringAttribute()
    {
        return Carbon::parse($this->attribute['updated_at'])->translatedFormat('d F Y');
    }
}
