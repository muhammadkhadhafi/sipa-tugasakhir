<?php

namespace App\Models\Admin\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'admin__ms__jurusan';

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
}
