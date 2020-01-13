<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    //
    protected $table = 'lokasi';
    protected $fillable = ['nm_lokasi', 'keterangan', 'create_at', 'update_at'];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    public function poli()
    {
        return $this->hasMany('App\model\Poli');
    }

   

}
