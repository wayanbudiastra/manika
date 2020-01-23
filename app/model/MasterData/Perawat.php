<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    //
     protected $table = 'perawat';
     protected $fillable = [
            'id',
            'users_id',
            'nik',
            'nama_perawat',
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
