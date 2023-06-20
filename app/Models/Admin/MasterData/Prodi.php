<?php

namespace App\Models\Admin\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'admin__ms__prodi';

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
