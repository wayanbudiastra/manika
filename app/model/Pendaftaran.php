<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    //
    protected $table = 'pendaftaran';
    protected $fillable = ['id','nodaftar','unit','baru','kelas_id','siswa_id','status','guru_id','catatan','user_id'];

    public function getMaxnoDaftar(){

    	 return $this->max('nodaftar');

    	 
    }
}
