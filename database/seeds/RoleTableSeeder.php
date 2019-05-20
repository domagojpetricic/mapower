<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'operator_admin']);
        Role::create(['name' => 'user']);
    }
}
