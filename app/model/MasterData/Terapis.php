<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Terapis extends Model
{
    protected $table = 'terapis';

    protected $fillable = [
        'id',
        'users_id',
        'nik',
        'nama_terapis',
        'email',
        'no_telp',
        'alamat',
        'tgl_lahir',
        'tempat_lahir',
        'aktif'
    ];

    public function registrasi1()
    {
        return $this->hasMany('App\model\Registrasi1');
    } 
}
