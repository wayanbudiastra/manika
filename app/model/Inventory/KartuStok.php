<?php

namespace App\model\Inventory;

use Illuminate\Database\Eloquent\Model;

class KartuStok extends Model
{
    //


    protected $table = 'kartuStok';

    protected $fillable = ['id',
    'produk_item_id',
    'stok_awal',
	'stok_masuk',
	'stok_keluar',
	'stok_akhir',
	'transaksi',
	'keterangan',
	'users_id'
	];

	public function produk_item()
    {
        return $this->belongsTo('App\model\MasterData\Produkitem', 'produk_item_id');
    }
}
