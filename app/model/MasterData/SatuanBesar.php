<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class SatuanBesar extends Model
{
    //
    protected $table = "satuan_besar";

    protected $fillable = ['id',
    'nama_satuan_besar',
    'keterangan',
    'aktif'];

    

}
