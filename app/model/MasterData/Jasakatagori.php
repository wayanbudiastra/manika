<?php

namespace App\model\MAsterData;

use Illuminate\Database\Eloquent\Model;

class Jasakatagori extends Model
{
    //
    protected $table = 'jasakatagori';

    protected $fillable = ['id',
    'nama_jasakatagori',
    'keterangan',
    'aktif'];

    // protected $with = ['jasa'];

    // public function jasa()
    // {
    //         return $this->belongsTo('App\model\MasterData\Jasa', 'jasakatagori_id');
    // }
}
