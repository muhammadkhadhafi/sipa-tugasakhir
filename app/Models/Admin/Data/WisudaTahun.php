<?php

namespace App\Models\Admin\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;

class WisudaTahun extends Model
{
    protected $table = 'admin__wisuda__tahuns';
    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->hasMany(WisudaPendaftaran::class, 'id_wisudatahun');
    }
}
