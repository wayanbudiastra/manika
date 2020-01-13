<?php

namespace App\model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Penerimaan_detil extends Model
{
    //
     protected $table = 'penerimaan_detil';

    protected $fillable = ['id',
    'penerimaan_id',
    'nama_item',
    'produk_item_id',
	'satuan_kecil_id',
	'satuan_besar_id',
	'isi_satuan',
	'harga_beli',
	'qty',
	'subtotal',
	'aktif',
	'users_id'
	];

	 protected $with = ['produk_item','satuan_besar','satuan_kecil','users'];


	public function produk_item()
    {
        return $this->belongsTo('App\model\MasterData\Produkitem', 'produk_item_id');
    }

    public function satuan_besar()
    {
        return $this->belongsTo('App\model\MasterData\Satuanbesar', 'satuan_besar_id');
    }

    public function satuan_kecil()
    {
        return $this->belongsTo('App\model\MasterData\Satuankecil', 'satuan_kecil_id');
    }

    public function users()
    {
        return $this->belongsTo('App\user', 'users_id');
    }
}
