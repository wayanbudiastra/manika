<?php

namespace App\model\Pembayaran;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //

    protected $table = 'pembayaran';

        protected $fillable = [
            'id',
            'kas_id',
            'tgl_pembayaran',
            'no_invoice',
            'registrasi1_id',
            'total_transaksi',
            'total_diskon',
            'total_kembali',
            'total_pembayaran',
            'kurang_bayar',
            'invoice',
            'closing',
            'posting',
            'users_id',
            'iscencel',
            'aktif'
        ];

    public function registrasi1()
    {
    	return $this->belongsTo('App\model\Registrasi1');
    }
}
