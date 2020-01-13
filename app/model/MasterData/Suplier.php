<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    //
    protected $table = 'suplier';
    /**
     * @var array
     */
    protected $fillable = [
        'kode_suplier',
        'nama_suplier',
        'email',
        'no_telp',
        'pic',
        'alamat',
        'aktif',
    ];

    protected $with = ['produk_item'];

        public function produk_item()
        {
            return $this->belongsToMany('App\model\MasterData\ProdukItem','produk_suplier','produk_item_id','suplier_id');
        }
}
