<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Produk_item_Suplier extends Model
{
    //
    protected $table='produk_item_suplier';

    protected $fillable = ['id',
    'produk_item_id',
    'suplier_id'];
}
