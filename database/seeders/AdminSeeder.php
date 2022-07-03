<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'admin',
            'role_id'  => '1',
            'email'  => 'admin@gmail.com',
            'password'  => bcrypt('123456789'),
        ]);
        User::create([
            'name'  => 'employee',
            'role_id'  => '2',
            'email'  => 'employee@gmail.com',
            'password'  => bcrypt('123456789'),
        ]);
    }
    
}
