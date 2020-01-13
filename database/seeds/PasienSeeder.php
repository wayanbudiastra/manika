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
        
        for($x=10001; $x <= 20000; $x++){

            DB::table('pasien')->insert([
                'nocm'=> sprintf("%06s", $x),
                'nama'=> $faker->name,
                'alamat'=> $faker->address,
                'tempat_lahir'=> $faker->city,
                'tgl_lahir'=> '2000-01-01',
                'pekerjaan' => 'Investor',
                'pendidikan' => 'S1',
            ]);
        }
    }
}
