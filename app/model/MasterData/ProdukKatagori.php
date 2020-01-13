<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class ProdukKatagori extends Model
{
    //
    protected $table = 'produk_katagori';

    protected $fillable = ['id',
    'nama_produk_katagori',
    'keterangan',
    'aktif'];

    protected $with = ['produk_item'];

    public function produk_item()
    {
            return $this->belongsTo('App\model\MasterData\produkitem', 'katagori_item_id');
    }
}
