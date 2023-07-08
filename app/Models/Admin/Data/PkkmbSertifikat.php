<?php

namespace App\Models\Admin\Data;

use App\Models\Model;

class PkkmbSertifikat extends Model
{
    protected $table = 'admin__pkkmb__sertifikats';
    protected $guarded = ['id'];

    public function pkkmbGrup()
    {
        return $this->belongsTo(PkkmbGrup::class, 'id_pkkmb_grup');
    }
}
