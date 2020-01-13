<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $table = 'karyawan';
    protected $fillable = ['nik',
     'nama',
     'grade_id',
     'tmp_lahir',
     'tgl_lahir',
     'divisi_id', 
     'no_hp', 
     'jenis_kelamin',
     'departemen_id',
     'alamat',
     'status_id',
     'create_at', 
     'update_at'];

    // public function departemen()
    // {
    //     return $this->belongsTo('App\model\Departemen');
    // }

    // public function grade()
    // {
    //     return $this->belongsTo('App\model\Grade');
    // } 

}
