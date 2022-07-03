<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'  => 'administrator',
            'permissions'  => json_encode(['create_category', 'create_company', 
            'show_company', 'edit_company', 'delete_company','list_companies']),
        ]);
        Role::create([
            'name'  => 'employee',
            'permissions'  =>json_encode(['list_companies']),
        ]);
    }
}
