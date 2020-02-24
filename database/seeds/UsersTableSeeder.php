<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User;
        $user->role = 'admin';
        $user->name = 'super admin';
        $user->email = 'super.admin@gmail.com';
        $user->password = bcrypt('12345678');
        $user->remember_token = str_random(60);
        $user->save();
    
    }
}
