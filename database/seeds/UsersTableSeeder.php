<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $superadminRole = Role::where('name', 'super_admin')->first();
        $operatoradminRole = Role::where('name', 'operator_admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $sadmin = User::create([
        	'name' => 'SuperAdmin',
        	'email' => 'super@admin.com',
        	'password' => bcrypt('super')
        ]);

        $oadmin = User::create([
        	'name' => 'OperatorAdmin',
        	'email' => 'operator@admin.com',
        	'password' => bcrypt('operator')
        ]);

        $user = User::create([
        	'name' => 'User',
        	'email' => 'user@admin.com',
        	'password' => bcrypt('user')
        ]);

        $sadmin->roles()->attach($superadminRole);
        $oadmin->roles()->attach($operatoradminRole);
        $user->roles()->attach($userRole);
    }
}
