<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    //
    protected $table = 'faskes';
    protected $fillable = ['kode', 'nm_faskes', 'alamat', 'no_hp', 'email', 'create_at', 'update_at'];


}
