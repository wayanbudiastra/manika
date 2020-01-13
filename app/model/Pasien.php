<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table = 'pasien';
    protected $fillable = ['id',
    'nocm',
    'nama',
    'alamat',
    'tempat_lahir',
    'tgl_lahir',
    'pekerjaan',
    'pendidikan',
    'identitas',
    'no_identitas',
    'no_telp',
    'create_at',
    'update_at'];

     public function registrasi1()
    {
        return $this->hasMany('App\model\Registrasi1');
    } 

}
