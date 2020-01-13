<?php

namespace App\model\Pembayaran;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    //

    protected $table = 'kas';

        protected $fillable = [
            'id',
            'users_id',
            'tgl_open',
            'tgl_close',
            'kas_awal',
            'total_tunai',
            'total_debit',
            'total_kredit',
            'total_lain',
            'total_transaksi',
            'total_kembali',
            'kas_akhir',
            'keterangan',
            'aktif'
        ];
}
