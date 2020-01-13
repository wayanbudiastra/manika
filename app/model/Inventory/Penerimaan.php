<?php

namespace App\model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    //

    protected $table = 'penerimaan';

    protected $fillable = ['id',
    'nomor_penerimaan',
    'refensi',
	'suplier_id',
	'keterangan',
	'posting',
	'aktif',
	'tgl_add',
	'jam_add',
	'users_id'
	];

	 protected $with = ['suplier','users'];


	public function suplier()
    {
            return $this->belongsTo('App\model\MasterData\Suplier', 'suplier_id');
    }

     public function users()
    {
            return $this->belongsTo('App\User', 'users_id');
    }

}
