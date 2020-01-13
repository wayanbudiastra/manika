<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //

     protected $table = 'staff';
     protected $fillable = [
            'id',
            'users_id',
            'nik',
            'nama_staff',
            'email',
            'no_telp',
            'alamat',
            'tgl_lahir',
            'tempat_lahir',
            'aktif'
        ];
}
