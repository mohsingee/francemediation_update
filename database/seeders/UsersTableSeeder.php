<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->delete();

        User::create([
            'firstname' => "Admin",
            'lastname' => "Admin",
            'username' => "admin",
            'email' => "admin@mediation.com",
            'password' => bcrypt('Admin@123'),
            'role' => '1',
            'image' => '164025032875735.jpg'
        ]);
    }
}
