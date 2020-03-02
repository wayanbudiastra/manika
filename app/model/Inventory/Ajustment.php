<?php

namespace App\model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Ajustment extends Model
{
    protected $table = 'ajustment';

    protected $fillable = ['id',
    'tgl_ajust',
    'produk_item_id',
	'jenis_ajust',
	'qty',
	'keterangan',
	'users_id'
	];

	protected $with = ['produk_item','users'];


	public function produk_item()
    {
        return $this->belongsTo('App\model\MasterData\Produkitem', 'produk_item_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
