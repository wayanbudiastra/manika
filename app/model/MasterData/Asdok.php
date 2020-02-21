<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Asdok extends Model
{
    protected $table = 'asdok';

    protected $fillable = [
        'id',
        'users_id',
        'nik',
        'nama_asdok',
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
