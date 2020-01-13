<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ItemMedis extends Model
{
    //
    protected $table = "itemmedis";
    protected $fillable = ['kode',
        'nm_item',
        'satuanbesar',
        'satuankecil',
        'isi',
        'katagoriitemmedis_id',
        'typeitemmedis_id',
        'hargabeli',
        'feedokter',
        'feenurse',
        'feelainnya',
        'hargajual',
        'markup',
        'keterangan',
        'stok',
        'stok_max',
        'stok_min',
        'feedokter',
        'create_at',
        'update_at'];

}
