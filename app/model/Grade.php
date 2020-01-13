<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $table ='gradekaryawan';
    protected $fillable = ['nm_grade','created_at','update_at'];

    public function karyawan()
    {
        return $this->hasMany('App\model\Karyawan');
    }

}
