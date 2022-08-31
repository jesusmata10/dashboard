<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Demo',
            'email' => 'demo@demo.com',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::where('name', 'Admin')->first();
        $user = User::where(['email' => 'demo@demo.com'])->first();
        $user->assignRole($role);

        User::create([
            'name' => 'Promotor',
            'email' => 'promotor@demo.com',
            'password' => bcrypt('12345678')
        ]);

        $role4 = Role::where('name', 'Promotor')->first();
        $user2 = User::where(['email' => 'promotor@demo.com'])->first();
        $user2->assignRole($role4);
    }
}
