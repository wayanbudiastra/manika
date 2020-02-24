<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Carbon\Carbon;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        
        for($x=1; $x <= 2000; $x++){

            DB::table('pasien')->insert([
                'nocm'=> sprintf("%06s", $x),
                'nama'=> $faker->name,
                'alamat'=> $faker->address,
                'tempat_lahir'=> $faker->city,
                'tgl_lahir'=> '1990-01-01',
                'pekerjaan' => 'Investor',
                'pendidikan' => 'S1',
                'identitas' => 'KTP',
                'no_telp' => '12345678',
                'no_identitas' => '12345678',
                'aktif'=>'Y'
            ]);
        }
    }
}
