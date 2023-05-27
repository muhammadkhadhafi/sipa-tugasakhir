<?php

namespace App\Models\Admin\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'admin__pegawai';
    protected $guarded = ['id'];

    public function setPassword($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
