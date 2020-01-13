<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    //
    protected $table = 'asuransi';
    protected $fillable = ['kode','nm_asuransi','keterangan','create_at','update_at'];

}
