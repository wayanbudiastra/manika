<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    //
    protected $table = 'departemen';
    protected $fillable = ['nm_departemen','created_at','update_at'];

    public function karyawan(){
        return $this->hasMany('App\model\Karyawan');
    }
}
