<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    //
    protected $table = 'rujukan';
    protected $fillable = ['kode', 'nm_rujukan', 'alamat', 'no_hp', 'email', 'create_at', 'update_at'];
}
